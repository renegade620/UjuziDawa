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

        .notification-icon {
            position: relative;
            cursor: pointer;
        }

        .notification-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: red;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .notification-dropdown {
            position: absolute;
            top: 30px;
            right: 0;
            width: 200px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: none;
            padding: 10px;
            z-index: 1;
        }

        .notification-dropdown ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .notification-dropdown li {
            padding: 5px;
            border-bottom: 1px solid #eee;
        }

        .notification-dropdown li:last-child {
            border-bottom: none;
        }
    </style>
    <script>
        // Example data (you can replace these with actual data)
        const registeredPatients = 52;
        const todaysAppointments = 10;
        const notifications = [{
                id: 1,
                message: "New appointment scheduled",
                timestamp: "2023-06-28 10:00 AM"
            },
            {
                id: 2,
                message: "Patient test results available",
                timestamp: "2023-06-27 03:15 PM"
            }
        ];

        // Update the dashboard overview with the data
        document.getElementById('registered-patients').textContent = registeredPatients;
        document.getElementById('todays-appointments').textContent = todaysAppointments;
        document.getElementById('notifications').textContent = notifications.length;

        // Display notifications in the dropdown
        const notificationIcon = document.getElementById('notification-icon');
        const notificationDropdown = document.getElementById('notification-dropdown');
        const notificationList = document.getElementById('notification-list');

        // Show notification dropdown on icon click
        notificationIcon.addEventListener('click', () => {
            notificationDropdown.style.display = 'block';
        });

        // Hide notification dropdown on outside click
        document.addEventListener('click', (event) => {
            if (!notificationIcon.contains(event.target) && !notificationDropdown.contains(event.target)) {
                notificationDropdown.style.display = 'none';
            }
        });

        // Generate notification list items
        notifications.forEach(notification => {
            const listItem = document.createElement('li');
            listItem.textContent = `${notification.message} - ${notification.timestamp}`;
            notificationList.appendChild(listItem);
        });
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
                <li class="notification-icon" id="notification-icon">
                    <span class="notification-count" id="notifications">0</span>
                    <img src="notification-icon.png" alt="Notification Icon">
                    <div class="notification-dropdown" id="notification-dropdown">
                        <ul id="notification-list"></ul>
                    </div>
                </li>
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
        </div>
    </div>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Doctor Profile</title>
        <!-- Include your CSS stylesheets and JavaScript files here -->
        <style>
            /* Add your custom styles here */
        </style>
        <script>
            // Add your JavaScript code here
        </script>
    </head>

    <body>
        <header>
            <!-- Add your header code here -->
        </header>

        <div class="container">
            <h1>Doctor Profile</h1>

            <form action="update-profile.php" method="POST">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first_name" value="John" required><br><br>

                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last_name" value="Doe" required><br><br>

                <label for="department">Department:</label>
                <select id="department" name="department">
                    <option value="1">Department 1</option>
                    <option value="2">Department 2</option>
                    <!-- Add more department options as needed -->
                </select><br><br>

                <label for="availability">Availability:</label>
                <textarea id="availability" name="availability">Monday: 9 AM - 5 PM
Tuesday: 9 AM - 5 PM
Wednesday: 9 AM - 1 PM</textarea><br><br>

                <input type="submit" value="Update Profile">
            </form>
        </div>

        <footer>
            <!-- Add your footer code here -->
        </footer>
    </body>

    </html>

</body>

</html>