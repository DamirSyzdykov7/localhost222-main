<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\SignIn;
use Illuminate\Support\Facades\Auth;
use App\Models\organization;
use App\Models\Cart;


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

        if (!$dish) {
            return redirect()->route('organization')->with('error', 'Блюдо не найдено.');
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
            $cart = new Cart();
            $cart->user_id = $userId;
            $cart->dish_id = $dishId;
            $cart->quantity = 1;
        }

        // Добавляем выбранное блюдо в корзину (предполагается, что у вас есть связь "многие ко многим" между Dish и Cart)
        $cart->Dishes()->attach($dishId);

        return redirect()->route('organization')->with('success', 'Блюдо добавлено в корзину.');
    }

}