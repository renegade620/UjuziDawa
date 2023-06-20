<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css\admin.css" />
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><img class="logo" src="" alt="Admin"><span>Admin Panel</span></h2>
        </div>
    </div>

    <!-- MENU -->
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="" class="active"><span>Dashboard</span></a>
            </li>
            <li>
                <a href="" class="active"><span>Users</span></a>
            </li>
            <li>
                <a href="" class="active"><span>Diseases</span></a>
            </li>
        </ul>
    </div>

    <!-- MAIN -->
    <div class="main-content">
        <header>
            <h2>
                <!-- TOP -->
                <label for="nav-toggle">
                    <span></span>
                </label>
            </h2>
            <div class="search-wrapper">
                <input type="search" placeholder="Search...">
            </div>
            <div class="user-wrapper">
                <div>
                    <img src="" width="60" height="50" alt="User">
                    <h4>Admin Strator</h4>
                    <small>admin</small>
                </div>
            </div>
        </header>

        <!-- CARDS -->
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Users</span>
                    </div>
                    <div>
                        <span></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Diseases</span>
                    </div>
                    <div>
                        <span></span>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>