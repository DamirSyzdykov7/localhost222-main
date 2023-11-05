<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\SignIn;
use Illuminate\Support\Facades\Auth;
use App\Models\organization;



class MainController extends Controller
{
     public function ShowMainView() {
      $organization = organization::all();

      return view('main', ['organization' => $organization]);
     }

     public function OrganizationView() {
      return view('organization');
     }

     public function Organization(Request $request) {  
      $dishes = Dish::where('restoraunt_id', $request->id)->get();

        return view('organization', ['dishes' => $dishes]);
     }

     public function addToCart(Request $request)
    {
        $dishId = $request->input('dish_id');
        $dish = Dish::find($dishId);
        //$quantity = 1;
        

        $dishName = $dish->блюдо;
        $price = $dish->цена;

        if (!$dish) {
            return redirect()->route('Organization')->with('error', 'Блюдо не найдено.');
        }

        // Предположим, что у вас есть текущий авторизованный пользователь
        if (auth()->check()) {
            $userId = auth()->user()->id;
        } else {
            // Обработка случая, когда пользователь не авторизован
        }

        // Получаем корзину пользователя из базы данных или создаем новую, если ее нет
        $cart = Cart::where('user_id', $userId)->first();
        if (!$cart) {
            $cart = new cart();
            $cart->user_id = $userId;
            $cart->dish_id = $dishId;
            $cart->quantity = 1;
            $cart->save();
        }

        // Добавляем выбранное блюдо в корзину (предполагается, что у вас есть связь "многие ко многим" между Dish и Cart)
        //$cart->Dishes()->attach($dishId);
        $cart->Dishes()->attach($dishId, ['цена' => $price, 'блюдо' => $dishName]);


        return redirect()->route('makeOrder')->with('success', 'Блюдо добавлено в корзину.');
    }


    public function makeOrder(Request $request)
{
    $cartItems = $request->session()->get('cart_dish');

    if ($cartItems) {
        // Создание нового заказа в базе данных
        $order = new cart_dish();
        $order->items = json_encode($cartItems);
        $order->save();
    }

    return view('cart', ['cartItems' => $cartItems, 'dishId => $dishId']);
}


}