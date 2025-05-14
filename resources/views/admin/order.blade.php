<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        table {
                border: 1px solid slategray;
                margin: auto;
                width: 1000px;
                border-collapse: collapse; 
                /* background-color: slategray;  */
            }

            th {
                padding: 10px;
                color: aliceblue;
                font-weight: bold;
                font-size: 22px;
                text-align: center;
                background-color: slategray;
                border: 1px solid slategray; 
            }

            td {
                padding: 10px;
                color: aliceblue;
                font-weight: bold;
                
                text-align: center;
                border: 1px solid slategray; 
                
            }
    </style>
  </head>
  <body>
        @include('admin.header')

        @include('admin.sidebar')

      <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Food Title</th>
                    <th>quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    
                   
                </tr>
                @foreach($data as $data)
                <tr>
                    <td>{{$data->name }}</td>
                    <td>{{$data->email }}</td>
                    <td>{{$data->phone }}</td>
                    <td>{{$data->addess }}</td>
                    <td>{{$data->title }}</td>
                    <td>{{$data->quantity }}</td>
                    <td>{{$data->price}}</td>
                    <td>
                        <img width="100px" src="food_img/{{ $data->imgae}}" alt="">
                    </td>
                    <td>{{$data->delivery_status }}</td>
                    <td>
                        <a  onclick="return  confirm('are you sure to change the status?')"
                        class="btn btn-info"
                         href="{{ url('pending',$data->id) }}">pending</a>
                        <a onclick="return  confirm('are you sure to change the status?')"
                        class="btn btn-warning" href="{{ url('delivered',$data->id) }}">Delivered</a>
                        <a onclick="return  confirm('are you sure to change the status?')"
                        class="btn btn-danger" href="{{ url('canceled',$data->id) }}">cancel</a>
                    </td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
    </div>
    @include('admin.jss')
  </body>
</html>