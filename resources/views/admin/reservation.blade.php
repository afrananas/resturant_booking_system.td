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
                    <th>Phone</th>
                    <th>No. of Guest</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                @foreach($book as $book)
                    
                
                <tr>
                    <td>{{ $book->phone }}</td>
                    <td>{{ $book->guest }}</td>
                    <td>{{ $book->date }}</td>
                    <td>{{ $book->time }}</td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
    </div>
    @include('admin.jss')
  </body>
</html>