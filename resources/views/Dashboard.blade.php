<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Maney Manager | K-MECH</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container_dashboard">
        <div class="navbar">
            <h1>DashBoard</h1>
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
                <h2>Welcome to DashBoard !</h2>
                <p>Here you can manage your revenue and expenditure.</p>
                <p>Use the navigation bar to access different sections.</p>
            </div>
    </div>
</body>
</html>