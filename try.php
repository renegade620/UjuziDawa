<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Medical Diagnosis System</title>
    <style>
        /* CSS styles for the dashboard */
        body {
            font-family: Arial, sans-serif;
        }
        
        .dashboard {
            display: flex;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .sidebar {
            flex-basis: 200px;
            background-color: #f1f1f1;
            padding: 10px;
            margin-right: 20px;
        }
        
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar li {
            margin-bottom: 10px;
        }
        
        .sidebar li a {
            display: block;
            padding: 10px;
            background-color: #ddd;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .sidebar li a:hover {
            background-color: #ccc;
        }
        
        .main-content {
            flex-basis: 80%;
            padding: 10px;
        }
        
        h1 {
            text-align: center;
        }
        
        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .summary-card {
            flex-basis: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .activities {
            margin-bottom: 20px;
        }
        
        .activity-item {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        
        .activity-item:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="process.php">Users</a></li>
                <li><a href="#">Diseases</a></li>
            </ul>
        </div>
        
        <div class="main-content">
            <h1>Admin Dashboard</h1>
            
            <div class="summary">
                <div class="summary-card">
                    <h3>Total Diagnoses</h3>
                    <p>123</p>
                </div>
                <div class="summary-card">
                    <h3>Total Patients</h3>
                    <p>456</p>
                </div>
                <div class="summary-card">
                    <h3>Total Doctors</h3>
                    <p>78</p>
                </div>
            </div>
            
            <div class="activities">
                <h2>Recent Activities</h2>
                <div class="activity-item">
                    <p>John Doe's diagnosis added</p>
                    <p>Date: 2023-06-15</p>
                </div>
                <div class="activity-item">
                    <p>Sarah Smith's diagnosis updated</p>
                    <p>Date: 2023-06-14</p>
                </div>
                <div class="activity-item">
                    <p>New patient registration: Jane Johnson</p>
                    <p>Date: 2023-06-13</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
