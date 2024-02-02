<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit product</title>
    <link rel="stylesheet" href="{{ url('css/all.css') }}">
    <link rel="stylesheet" href="{{ url('css/home.css') }}">
</head>

<body>

    @auth
        <h1>Edit a Product</h1>
        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="formcontainer">
            <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
                @csrf
                @method('put')

                <div class="content">
                    <div class="input">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" value="{{ $product->name }}" />
                    </div>
                    <div class="input">
                        <label>Qty</label>
                        <input type="text" name="qty" placeholder="Qty" value="{{ $product->qty }}" />
                    </div>
                    <div class="input">
                        <label>Price</label>
                        <input type="text" name="price" placeholder="Price" value="{{ $product->price }}" />
                    </div>
                    <div class="input">
                        <label>Description</label>
                        <input type="text" name="description" placeholder="Description"
                            value="{{ $product->description }}" />
                    </div>
                    <div class="submitcontainer">
                        <input type="submit" value="Update" />
                    </div>
                </div>
            </form>
        </div>
    @else
        <h1>Please login first</p>

            <form method="get" action="/" class="submitcontainer log">
                @csrf
                <input action="/" type="submit" value="Log In/Register" />
            </form>

        @endauth
</body>

</html>
