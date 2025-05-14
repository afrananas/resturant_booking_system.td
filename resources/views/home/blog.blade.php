<div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
    <h2 class="section-title py-5">Available Foods</h2>
    
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">

                @foreach($data as $food)  
                <div class="col-md-4">
                    <div class="card bg-transparent border my-3 my-md-0">
                       
                        <img height= "300" src="{{('food_img/'.$food->image) }}" alt="{{ $food->title }}">
                        
                        <div class="card-body">
                            
                            <h1 class="text-center mb-4">
                                <a href="#" class="badge badge-primary">
                                    ৳{{ number_format($food->price, 2) }}
                                </a>
                            </h1>
                            
                            <h4 class="pt20 pb20">{{ $food->title }}</h4>
                            <p class="text-white">{{ $food->detail }}</p>
                        </div>

                        <form action="{{url('add_cart',$data->first()->id)}}" method="post">
                            @csrf
                            <input type="number" name="qty" value="1" min="1" required>
                            <input class="btn btn-info" type="submit" value="Add to cart">
                        </form>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>              
            @endforeach
            </div>
        </div>
    </div>
</div>
