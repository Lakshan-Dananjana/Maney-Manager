<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password | Maney Manager | K-MECH</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container_auth">
        <p class="error1">eeeeee</p>
        <form action="/forgetPassword" method="post">
            @csrf
            <h1>Forget Password</h1>
            <div class="user">
                <input type="text" name="email" id="" placeholder="Enter Your Email">
                @if ($errors->has('email'))
                    <p class="error">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="pwd">
                <input type="password" name="newPassword" id="" placeholder="Enter New Password">
                @if ($errors->has('newPassword'))
                    <p class="error">{{ $errors->first('newPassword') }}</p>
                @endif
            </div>
            <div class="pwd">
                <input type="password" name="confirmPassword" id="" placeholder="Confirm New Password">
                @if ($errors->has('confirmPassword'))
                    <p class="error">{{ $errors->first('confirmPassword') }}</p>
                @endif
            </div>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>