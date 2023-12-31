<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/admindashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Panel</title>
    <style>
        body{
        
            padding: 10px;
            color: black;
        }
        .nav-menu{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .nav-menu li{
            list-style: none;
            background-color: aliceblue;
            padding: 10px;
        }
        .nav-menu li a{
            text-decoration: none;
            color: black;
        }
        .logo h1{
            display: flex;
            flex-direction: row;
           justify-content: center;
            gap: 10px;
        }
        .logo a{
            text-decoration: none;
            font-size: 15px;
            position: absolute;
            right: 20px;
            top: 50px;
        }
        .sidebar h2{
        text-align: center;
        }
        .sidebar-menu{
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 5px;
        }
        .sidebar-menu li{
            background-color: aliceblue;
            padding: 10px;
             list-style: none;
             cursor: pointer;
        }
        .sidebar-menu a{
            text-decoration: none;
            color: black;
            margin-left: 20px;   
        }
        .dashboard-container{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .dashboard-overview{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h2{
            text-align: center;
        }
       
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>Admin Panel <a href="adminlogout.php"><i class="fa fa-sign-out"></i> Logout</a></h1>                
    </div> 
        <nav class="navigation">
            <ul class="nav-menu">
                <li><a href="adminviewjourneys.php">View all Journeys</a></li>
                <li><a href="adminviewusers.php">View Users</a></li>
                <li><a href="adminusers.php">View Admins</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="sidebar">
         
            <h2 >Welcome, <?php echo $_SESSION['AdminLoginId'];?></h2>
            <ul class="sidebar-menu">
                <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa fa-edit"></i> Content Management</a></li>
                <li><a href="#"><i class="fa fa-users"></i> User Management</a></li>
                <li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
                <li><a href="adminviewjourneys.php"><i class="fa fa-pencil"></i> Update Journeys</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
            </ul>
        </div>

        <div class="content">
            <div class="dashboard-overview">
                <h2>Dashboard Overview</h2>
                <p>Welcome to Admin Dashboard. Here, you can manage journeys, users, and settings of the website.</p>
            </div>

            <br>
            <div class="dashboard-container">
                <div class="dashboard-widget pie-chart-container">
                    <h2>User Distribution</h2>
                    <canvas id="userPieChart" class="pie-chart" width="250" height="250"></canvas>
                </div>

                <div class="dashboard-widget userGrowth-chart">
                    <h2>User Growth</h2>
                    <canvas id="userLineChart" width="250" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2023 Admin Panel</p>
    </footer>

    <script>
        var userPieData = {
            labels: ['Admins', 'Regular Users', 'Guests'],
            datasets: [{
                data: [30, 60, 10],
                backgroundColor: ['#36a2eb', '#ffcd56', '#ff6384']
            }]
        };

        var userLineData = {
            labels: ['2019', '2020', '2021', '2022', '2023'],
            datasets: [{
                label: 'Number of Users',
                data: [200, 400, 600, 800, 1000],
                borderColor: '#ff6384',
                fill: false
            }]
        };

        var userPieChart = new Chart(document.getElementById('userPieChart'), {
            type: 'pie',
            data: userPieData
        });

        var userLineChart = new Chart(document.getElementById('userLineChart'), {
            type: 'line',
            data: userLineData
        });
    </script>
</body>
</html>
