<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/all.css')}}">
</head>
<body>
    
    <h1>Create New product</h1>

    
    <div class="formcontainer">

        <div class="errorcontainer">
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
    
    
            @endif
        </div>


        <form action="{{route('product.store')}}" method="post">
            @csrf
            @method('post')
            
            <div class="content">
                <div class="input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id= "name" placeholder="name">
                </div>
        
                <div class="input">
                    <label for="qty">Quantity</label>
                    <input type="text" name="qty" id= "qty" placeholder="quantity">
                </div>
        
                <div class="input">
                    <label for="price">Price</label>
                    <input type="text" name="price" id= "price" placeholder="price">
                </div>
        
                <div class="input">
                    <label for="des">Description</label>
                    <input type="text" name="des" id= "des" placeholder="description">
                </div>
        
                <div class="submitcontainer">
                    <input type="Submit" value="Create">
                </div>
            </div>
        </form>
    </div>
</body>
</html>