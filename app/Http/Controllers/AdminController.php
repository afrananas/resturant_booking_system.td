<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food;
use Dflydev\DotAccessData\Data;

use App\Models\Order;

use App\Models\BookTable;

class AdminController extends Controller
{
    public function add_food()
    {
        return view('admin.add_food');
    }
    public function upload_food(Request $request)
    {
        $data = new Food;

        $data->title = $request->title;
        $data->detail = $request->details;
        $data->price = $request->price;
        $image = $request->file('img');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file('img')->move('food_img',$imageName);

        $data->image = $imageName;

        $data->save();

        return redirect()->back();

    }
    public function view_food()
    {
        $data = Food::all();
        return view('admin.show_food',compact('data'));
    }
    public function delete_food($id)
    {
        $data = Food::findOrFail($id); 
        $data->delete();

        return redirect()->back()->with('success', 'Food item deleted successfully');
    }
    public function update_food($id)
    {
        $food = Food::findorfail($id);
        return view('admin.update_food',compact('food'));
    }
    public function edit_food(Request $request,$id)
    {
        $data = Food::findorfail($id);

        $data->title = $request-> title;
        $data->detail = $request-> details;
        $data->price = $request-> price;

        $image = $request->image;
        if ($image)
        {
            $imageName = time().'.'.$image->getCLientOriginalExtension();
            $request->image->move('food_img',$imageName);
            $data->image = $imageName;
        }


        $data->save();
        return redirect('view_food');
    }
    public function orders()
    {
        $data =Order::all();
        return view('admin.order',compact('data'));
    }

    public function pending($id)
    {
        $data = Order::find($id);
        $data->delivery_status = 'pending';
        $data-> save();
        return redirect()->back();
    }
    public function delivered($id)
    {
        $data = Order::find($id);
        $data->delivery_status = 'delivered';
        $data-> save();
        return redirect()->back();
    }
    public function canceled($id)
    {
        $data = Order::find($id);
        $data->delivery_status = 'canceled';
        $data-> save();
        return redirect()->back();
    }
    public function reservations()
    {
        $book = BookTable::all();
        return view('admin.reservation',compact('book'));
    }
}
