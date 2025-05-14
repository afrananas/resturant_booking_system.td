<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table
        {
            border: 1px solid slategrey;
            margin: auto;
            width: 800px;
        }
        th 
        {
            background-color: skyblue;

            color: white;
            padding: 10px;
            margin:10px;
        }
        td 
        {
            color:white;
            padding:10px;

        }
    </style>
  </head>
  <body>
        @include('admin.header')

        @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>All Foods</h1>
                <div>
                    <table class="table"> 
                        <thead>
                            <tr>
                                <th>Food Title</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $food)  <!--  variable name -->
                                <tr>
                                    <td>{{ $food->title }}</td>
                                    <td>{{ $food->detail }}</td>
                                    <td>৳{{ number_format($food->price, 2) }}</td> 
                                    <td>
                                        <img src="food_img/{{($food->image) }}" width="80px" alt="{{ $food->title }}">
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" 
                                                    onclick="return confirm('Are you sure you want to delete this food item?')"
                                                    href="{{ url('delete_food',$food->id) }}">Delete</a>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" 
                                                    
                                                    href="{{ url('update_food',$food->id) }}">Update</a>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>
    </div>
    @include('admin.jss')
  </body>
</html>