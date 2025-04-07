<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification | Maney Manager | K-MECH</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container_verif">
        <p class="error1">{{session('messege')}}</p>
        <form action="/forgetVerification" method="post">
            @csrf
            <h1>Verification</h1>
            <div class="user">
                <input type="text" name="otp" id="" placeholder="Enter Your Verification Code">
                @if($errors->has('otp'))
                <p class="error">{{$errors->first('otp')}}</p>
                @endif
            </div>
            <button type="submit">Verify</button>
        </form>
    </div>
</body>
</html>