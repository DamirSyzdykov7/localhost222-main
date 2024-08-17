<?php

namespace App\Http\Controllers;

use App\Models\_dop_dannye;
use App\Models\cartdish;
use App\Models\Cart;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Models\SignIn;
use Illuminate\Support\Facades\Auth;
use App\Models\organization;
use Psy\Command\WhereamiCommand;





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
        $cart = Cart::where('sign_in_id', $userId)->first();
        if (!$cart) {
            $cart = new cart();
            $cart->sign_in_id = $userId;
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
    
    
    $cartItems = $request->session()->get('cartdish');

    if ($cartItems) {
        // Создание нового заказа в базе данных
        $order = new cartdish();
        $order->items = json_encode($cartItems);
        $order->save();
    }
    

    return redirect()->route('ShowMainCart')->with('success', 'Блюдо добавлено в корзину.');
}

    public function ShowMainCart(Request $request) {

    // Получаем текущего пользователя
    $user = Auth::user();

    // Если пользователь авторизован и у него есть корзина
    if ($user && $user->cart) {
        // Получаем блюда из корзины текущего пользователя
        $cartItems = $user->cart->Dishes;
    } else {
        $cartItems = [];
    }

    return view('cart', ['cartItems' => $cartItems]);

    }

    public function ShowProfile() {
        return view('profile');
    }
    
    public function Profile(Request $request) {
        $user = Auth::user();
        $user1 = Auth::user()->id;
        $cart = Auth::user()->cart->id;
        $table = _dop_dannye::where('login_id' , $user1)->first();
        if(!$table) {
            $table = new _dop_dannye();
            $table->login_id = $user1;
            $table->cart_id = $cart;
            $table->имя = $request->input('name', 'Defoult');
            $table->Фамилия = $request->input('lastname','Defoult');
            $table->номер_телефона = $request->input('phone','Defoult');
            $table->адресс = $request->input('adress' , 'Defoult');
            $table->дата_рождения = $request->input('birth_day', '00.00.00');
            $table->save();
        }


        return view('profile', ['user' => $user , 'user1' => $user1 , 'table'=> $table , 'cart'=>$cart]);
        
    }

    public function ShowSmenaForm() {
        return view('Smena'); 
    }
    
    public function Smena(Request $request) {
        $user = Auth::user();
    
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
    
        $user->update([
            'login' => $request->input('login'),
            'password' => bcrypt($request->input('password')),
        ]);
        return view("smena", ['user' => $user,'login' => $user->login,]);
    }

}