<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All products</title>
    <link rel="stylesheet" href="{{ url('css/products.css') }}">
    <link rel="stylesheet" href="{{ url('css/home.css') }}">
</head>

<body>
    @auth

        <form class="logout" action="/logout" method="post">
            @csrf
            <button>Log out</button>
        </form>

        <h1>All Products</h1>

        <div class="tablecontainer">
            <div class="createbutton">
                <a href="{{ route('product.create') }}">Create a Product</a>
            </div>

            <div>
                @if (session()->has('success'))
                    <div class="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td class="edit">
                                <a href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                                    @csrf
                                    @method('delete')
                                    <div class="delete">
                                        <input type="submit" value="Delete" />
                                    </div>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
