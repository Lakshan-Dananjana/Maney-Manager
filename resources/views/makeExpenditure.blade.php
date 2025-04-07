<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Expenditure | Maney Manager | K-MECH</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container_dashboard">
        <div class="navbar">
            <h1>Make Expenditure</h1>
            <div class="nav">
                <a href="/make-revenue">Make Revenue</a>
                <a href="/revenue-history">Ravenue History</a>
                <a href="/make-expenditure">Make Expenditure</a>
                <a href="/expenditure-history">Expenditure History</a>
                <a href="/balance">Balance</a>
                <a href="/Dashboard">Dashboard</a>
                
            </div>
        </div>
        <div class="dashboard_content">
            <div class="rightnav">
                <a href="#">{{session('name')}}</a>
                <a href="/logout">Logout</a>
            </div>
            <div class="content">
                <p class="error1">{{session('messege')}}</p>
                <form action="/make-expenditure" method="post">
                    @csrf
                    <h2>Meke Expenditure</h2>
                    <input type="hidden" name="email" value="{{session('email')}}">
                    <div class="user">
                        <input type="date" name="date" id="">
                        @if($errors->has('date'))
                        <p class="error">{{$errors->first('date')}}</p>
                        @endif
                    </div>
                    <div class="user">
                        <input type="text" name="description" id="" placeholder="Enter Your Description">
                        @if($errors->has('description'))
                        <p class="error">{{$errors->first('description')}}</p>
                        @endif
                    </div>
                    <div class="user">
                        <input type="number" name="amount" id="" min="0" placeholder="Enter Your Amount">
                        @if($errors->has('amount'))
                        <p class="error">{{$errors->first('amount')}}</p>
                        @endif
                    </div>
                    <button type="submit">Make Expenditure</button>
                </form>
            </div>
    </div>
</body>
</html>