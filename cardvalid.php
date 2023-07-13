<?php
session_start();
?>
<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UjuziDawa || Medical Diagnosis System</title>
        <link rel="stylesheet" href="css\home.css">
        <style>
            body {
                font-size: 1rem;
                font-weight: normal;
                color: #60698d;
                line-height: 1.5;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                overflow: auto;

            }

            header h1 {
                color: white;
                font-size: xx-large;
            }

            .container {
                width: 100%;
                margin: 0 auto;
                padding: 0 1.5rem;
                display: flex;
                align-items: center;
            }

            header {
                height: 120px;
                top: 0;
                right: 0;
                width: 100%;
                background-color: #487cff;
            }

            .logo img {
                width: 50px;
                height: 50px;
                margin-right: 10px;
                margin-top: 20px;
                opacity: 1;
            }

            #title {
                text-align: center;
                align-content: center;
            }

            .form-container {
                max-width: 500px;
                margin: 0 auto;
                padding: 20px;
                background-color: #487cff;
                border-radius: 5px;
            }

            h2,
            h3 {
                color: #333;
                margin-bottom: 10px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                color: #555;
            }

            input[type="text"],
            input[type="tel"],
            input[type="email"],
            select,
            textarea {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 14px;
                margin-bottom: 10px;
            }

            input[type="submit"],
            input[type="reset"],
            #book-appointment-btn {
                background-color: #4CAF50;
                color: #fff;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
            }

            input[type="submit"]:hover,
            input[type="reset"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>

    <body>
        <div>
        <div class="back">
            <a href="receptionist.php" class="back-button">Back to Dashboard</a>
        </div>
            <h1>Card Validation</h1>
            <form method="POST" id="card-form" class="form-container">
                <input type="hidden" name="form-submitted" value="1">

                <label for="health-number">Health Number:</label>
                <input type="text" id="health-number" name="health-number" required><br><br>

                <input type="submit" value="Check">
            </form>
        </div>
        <script>
            const form = document.getElementById('card-form');

            form.addEventListener('submit', (event) => {
                event.preventDefault();

                const healthNumber = document.getElementById('health-number').value;

                if (healthNumber.includes('NH')) {
                    alert('Health number is valid');
                    window.location.href = 'receptionist.php';
                } else {
                    alert('Invalid health number');
                }
            });
        </script>

    </body>
    <html>