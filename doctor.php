<!DOCTYPE html>
<html>

<head>
    <style>
        .dashboard-overview {
            background-color: #f2f2f2;
            padding: 20px;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .stat {
            text-align: center;
        }

        .stat-label {
            font-weight: bold;
        }

        .stat-value {
            font-size: 24px;
        }
    </style>
    <script>
        // Example data (you can replace these with actual data)
        const registeredPatients = 52;
        const todaysAppointments = 10;
        const notifications = 3;

        // Update the dashboard overview with the data
        document.getElementById('registered-patients').textContent = registeredPatients;
        document.getElementById('todays-appointments').textContent = todaysAppointments;
        document.getElementById('notifications').textContent = notifications;
    </script>
</head>

<body>
    <header>
        <div class="logo">
            <img src="logo.png" alt="Medical Facility Logo">
            <h1>Medical Diagnosis System</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Patients</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="dashboard-overview">
        <h2>Dashboard Overview</h2>
        <div class="stats">
            <div class="stat">
                <span class="stat-label">Registered Patients</span>
                <span class="stat-value" id="registered-patients">0</span>
            </div>
            <div class="stat">
                <span class="stat-label">Today's Appointments</span>
                <span class="stat-value" id="todays-appointments">0</span>
            </div>
            <div class="stat">
                <span class="stat-label">Notifications</span>
                <span class="stat-value" id="notifications">0</span>
            </div>
        </div>
    </div>
</body>

</html>