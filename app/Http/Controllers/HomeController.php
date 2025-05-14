<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Food;
use App\Models\Cart;
use App\Models\Order;
use App\Models\BookTable;


use Illuminate\Support\Facades\Auth;
use Termwind\Components\Ol;

class HomeController extends Controller
{
    public function my_home()
{
    $data= Food::all(); // Gets all food items
    
    return view('home.index', compact('data')); 
}
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
        
            if ($usertype== 'user')
            {
                $data= Food::all();
                return view('home.index',compact('data'));
            }
            else
            {
                $total_user = User::where('usertype','=','user')->count();
                $total_food = Food::count();
                $total_order = Order::count();
                $total_delivered = Order::where('delivery_status','=','delivered')->count();
                return view('admin.index',compact('total_user','total_food','total_order','total_delivered'));
            }
            return redirect()->route('login');
        }
    }
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $food = Food::findOrFail($id);      
            $cart_data = new Cart;
            
            $cart_data->title = $food->title;
            $cart_data->details = $food->detail;
            $cart_data->price = $food->price * $request->qty;
            $cart_data->image = $food->image;
            $cart_data->quantity = $request->qty;
            $cart_data->userid = Auth::user()->id;
            $cart_data->foodid = $id;
            $cart_data->save();
            

            return redirect()->back();
        } else {
            return redirect("login");
        }
    }
    public function my_cart()
    {
        $userid = Auth::user()->id;
        $data = Cart:: where('userid','=',$userid)->get();
                   
        return view('home.my_cart',compact('data'));
    
        
    }
    public function remove_cart($id)
    {
        $item = Cart::findOrfail($id);
        $item->delete();
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('userid','=',$user_id)->get();
        foreach($cart as $cart){
            $order = new Order;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->addess = $request->address;

            $order->title = $cart->title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->imgae = $cart->image;

            $order->save();
            
            $data = Cart::find($cart->id);
            $data->delete();
        }
        return redirect()->back();
    }
    public function book_table(Request $request)
    {
        $data = new BookTable();
        $data->phone = $request->phone;
        $data->guest = $request->n_guests;
        $data->time = $request->time;
        $data->date = $request->date;

        $data->save();

        return redirect()->back();


    }
}
