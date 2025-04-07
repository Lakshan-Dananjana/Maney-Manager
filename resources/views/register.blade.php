<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | Maney Manager | K-MECH</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container_auth">
        <p class="error1">{{session('error')}}</p>
        <form action="/register" method="post">
            @csrf
            <h1>Registration</h1>
            <div class="user">
                <input type="text" name="username" id="" placeholder="Enter Your Username">
                @if($errors->has('username'))
                <p class="error">{{$errors->first('username')}}</p>
                @endif
            </div>
            <div class="user">
                <input type="text" name="email" id="" placeholder="Enter Your Email">
                @if($errors->has('email'))
                <p class="error">{{$errors->first('email')}}</p>
                @endif
            </div>
            <div class="pwd">
                <input type="password" name="password" id="" placeholder="Enter Your Password">
                @if($errors->has('password'))
                <p class="error">{{$errors->first('password')}}</p>
                @endif
            </div>
            <div class="pwd">
                <input type="password" name="cpassword" id="" placeholder="Enter Your Confirm Password">
                @if($errors->has('cpassword'))
                <p class="error">{{$errors->first('cpassword')}}</p>
                @endif
            </div>
            <button type="submit">Register</button>
            <p>Already have an account? <a href="/">Login</a></p>
        </form>
    </div>
</body>
</html>