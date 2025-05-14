
 <!DOCTYPE html>
<html lang="en">
<head>
	@include('home.css')
    <style>
        table
        {
            margin: 40px;
            border: 1px solid rgb(95, 70, 119);
            padding: 40px;
        }
        th{
            padding: 10px;
            text-align: center;
            background-color: slategray;
            color: aliceblue;
            font-weight: bold;
        }
        td{
            padding: 10px;
            color: aliceblue;
        }
        .div_center
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;

        }
        label
        {
            display: inline-block;
            width: 200px;


        }
        .div_deg
        {
            padding:20px;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    
   <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#gallary">Gallary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#book-table">Book-Table</a>
            </li>
        </ul>
        <a class="navbar-brand m-auto" href="{{ url('/') }}">
            <img src="assets/imgs/logo.svg" class="brand-img" alt="">
            <span class="brand-txt">Food Hut</span>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#blog">Blog<span class="sr-only">(current)</span></a>
            </li>
            @if (Route::has('login'))
                @auth
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('my_cart')}}">Cart</a>
                    </li>

                    <!-- Logout Form -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary ml-xl-4">Logout</button>
                    </form>
                @else
                    <!-- Login/Register Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            @endif
            
            </ul>
        </div>
    </nav>
    <br><br><br><br><br><br>
    <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
        <table>
            <tr>
                <th>Image</th>
                <th>Food</th>
                <th>Details</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>
            <?php

            $total_price =0;
            ?>
            @foreach($data as $item)
            <tr>
                <td><img src="food_img/{{$item->image }}" width="150"></td>
                <td>
                    {{ $item->title }} 
                    
                    
                </td>
                <td> {{ $item->details }}</td> 
                <td>{{ $item->quantity }}</td>
                <td>৳{{ number_format($item->price, 2) }}</td>
                <td>
                    <a onclick="return  confirm('Are you sure to delete the item?')"
                    class="btn btn-danger" href="{{ url('remove_cart',$item->id) }}">Remove</a>
                </td>
            </tr>
            <?php 
            $total_price = $total_price + $item->price;
            ?>
            @endforeach
        </table>
        <h2>Total Price: ৳{{ number_format($total_price, 2) }}</h2>
    </div>
    <div class="div_center">
        <form action="{{ url('confirm_order') }}" method="POST">
            @csrf
            <div class="div_deg">
                <label for="">Name</label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div class="div_deg">
                <label for="">Email</label>
                <input type="email" name="email" value="{{Auth::user()->email}}">
            </div>

            <div class="div_deg">
                <label for="">Phone</label>
                <input type="number" name="phone" value="{{Auth::user()->phone}}">
            </div>

            <div class="div_deg">
                <label for="">Address</label>
                 <textarea name="address" id="address">{{ Auth::user()->address }}</textarea>
            </div>
             <div class="div_deg">
                
                <input class="btn btn-info" type="submit" value="Confirm Order">
            </div>

            
        </form>
    </div>
</body>
</html> 