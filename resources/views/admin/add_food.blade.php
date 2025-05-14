<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        label {
            display: inline-block;
            width: 200px;
            color: white;
        }
        .div_deg {
            padding: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <form action="{{ url('upload_food') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="div_deg">
                        <label>Food title</label>
                        <input type="text" name="title" required>
                    </div>
                    
                    <div class="div_deg">
                        <label>Food Details</label>
                        <textarea name="details" cols="50" rows="5" required></textarea>
                    </div>
                    
                    <div class="div_deg">
                        <label>Price (BDT)</label>
                        <div class="input-group">
                            <span class="input-group-text" style="font-family: Arial, sans-serif;">৳</span>
                            <input type="number" 
                                name="price" 
                                step="0.01" 
                                class="form-control" 
                                placeholder="0.00"
                                required>
                        </div>
                    </div>
                    
                    <div class="div_deg">
                        <label>Image</label>
                        <input type="file" name="img" required>
                    </div>
                    
                    <div class="div_deg">
                        <input type="submit" value="Add Food" class="btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    @include('admin.jss')
  </body>
</html>