<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/all.css')}}">
    <link rel="stylesheet" href="{{url('css/home.css')}}">
</head>
<body>
    

    @auth
        
        <div class="authcontiner">
            <form class="logout" action="/logout" method="post">
                @csrf
                <button>Log out</button>
            </form>
            <h1>Welcome !! You're logged in</h1>
            <div class="btncontainer">
                <form class="allbtn" action="/product" method="get">
                    @csrf
                    <button>All products</button>
                </form>
                <form class="newbtn" action="/product/create" method="get">
                    @csrf
                    <button>Create new</button>
                </form>
            </div>
        </div>
        
    @else
    <h1>Welcome</h1>
    <div class="wrapper">
        
        <div class="formcontainer double">
            <h1>register</h1>
            <form action="/register" method="post">
            @csrf
            <div class="content">
                <div class="input">
                    <label>Username</label>
                    <input type="text" name="name"  />
                </div>
                <div class="input">
                    <label>E-mail</label>
                    <input type="email" name="email"  />
                </div>
                <div class="input">
                    <label>Password</label>
                    <input type="password" name="password" />
                </div>
                <div class="submitcontainer">
                    <input type="submit" value="Register" />
                </div>
            </div>
            </form>
        </div>
        <div class="formcontainer double">
            <h1>Login</h1>
            <form action="/login" method="post">
            @csrf
            <div class="content">
                <div class="input">
                    <label>Username</label>
                    <input type="text" name="loginname"  />
                </div>
                <div class="input">
                    <label>Password</label>
                    <input type="password" name="loginpassword" />
                </div>
                <div class="submitcontainer log">
                    <input  type="submit" value="Log In" />
                </div>
            </div>
            </form>
        </div>
    </div>
    @endauth
</body>
</html>