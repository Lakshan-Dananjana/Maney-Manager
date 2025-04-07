<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance | Maney Manager | K-MECH</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container_dashboard">
        <div class="navbar">
            <h1>Balance</h1>
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
            <div class="contentHistory">
                <h2>Balance</h2>
                <div class="table">
                    
                    <div class="revenue">
                        <p class="total">Balance</p>
                        <p class="amount">Rs.{{ $balance->balance }}</p>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>