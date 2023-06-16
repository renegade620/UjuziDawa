<!DOCTYPE html>
<html lang="en">

<?php
require "connect.php";
?>

<?php
// fetch data from database
$query = "SELECT symp_id, symptom_1, symptom_2, symptom_3, symptom_4, symptom_5, symptom_6, symptom_7 FROM symptoms";
$result = $conn->query($query);

// format data into HTML options
// Step 3: Create arrays to store symptoms
$symptoms1 = array();
$symptoms2 = array();
$symptoms3 = array();
$symptoms4 = array();
$symptoms5 = array();
$symptoms6 = array();
$symptoms7 = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $symptom1 = $row["symptom_1"];
        $symptom2 = $row["symptom_2"];
        $symptom3 = $row["symptom_3"];
        $symptom4 = $row["symptom_4"];
        $symptom5 = $row["symptom_5"];
        $symptom6 = $row["symptom_6"];
        $symptom7 = $row["symptom_7"];

        // Add to $symptoms1 if not already present
        if (!in_array($symptom1, $symptoms1)) {
            $symptoms1[] = $symptom1;
        }

        // Add to $symptoms2 if not already present
        if (!in_array($symptom2, $symptoms2)) {
            $symptoms2[] = $symptom2;
        }

        // Add to $symptoms3 if not already present
        if (!in_array($symptom3, $symptoms3)) {
            $symptoms3[] = $symptom3;
        }

        // Add to $symptoms4 if not already present
        if (!in_array($symptom4, $symptoms4)) {
            $symptoms4[] = $symptom4;
        }

        // Add to $symptoms5 if not already present
        if (!in_array($symptom5, $symptoms5)) {
            $symptoms5[] = $symptom5;
        }

        // Add to $symptoms6 if not already present
        if (!in_array($symptom6, $symptoms6)) {
            $symptoms6[] = $symptom6;
        }

        // Add to $symptoms7 if not already present
        if (!in_array($symptom7, $symptoms7)) {
            $symptoms7[] = $symptom7;
        }
    }
}

// Step 4: Format data into HTML options
$options = '';
foreach ($symptoms1 as $symptom1) {
    $options .= "<option value='" . $symptom1 . "'>" . $symptom1 . "</option>";
}

$optionz = '';
foreach ($symptoms2 as $symptom2) {
    $optionz .= "<option value='" . $symptom2 . "'>" . $symptom2 . "</option>";
}

$optiona = '';
foreach ($symptoms3 as $symptom3) {
    $optiona .= "<option value='" . $symptom3 . "'>" . $symptom3 . "</option>";
}

$optionb = '';
foreach ($symptoms4 as $symptom4) {
    $optionb .= "<option value='" . $symptom4 . "'>" . $symptom4 . "</option>";
}

$optionc = '';
foreach ($symptoms5 as $symptom5) {
    $optionc .= "<option value='" . $symptom5 . "'>" . $symptom5 . "</option>";
}

$optiond = '';
foreach ($symptoms6 as $symptom6) {
    $optiond .= "<option value='" . $symptom6 . "'>" . $symptom6 . "</option>";
}

$optione = '';
foreach ($symptoms7 as $symptom7) {
    $optione .= "<option value='" . $symptom7 . "'>" . $symptom7 . "</option>";
}



?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css\home.css" />
    <title>UjuziDawa || Medical Diagnosis System</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script>
         $(document).ready(function() {
            $("form").on("submit", function(event) {
                event.preventDefault(); // Prevent form submission

                var selectedSymptoms = $(this).serialize(); // Serialize form data

                $.ajax({
                    url: "process.php", // URL to the PHP script that will process the request
                    type: "POST",
                    data: selectedSymptoms,
                    success: function(response) {
                        // Handle the response from the PHP script
                        $("#diagnosis-results").html(response);
                    }
                });
            });
        }); -->
    </script> -->
    <script defer>
        // document.addEventListener("DOMContentLoaded", function() {
        //     var form = document.querySelector("form");

        //     form.addEventListener("submit", function(event) {
        //         event.preventDefault(); // Prevent form submission

        //         var selectedSymptoms = new FormData(form);

        //          fetch("process.php", {
        //             method: "POST",
        //             body: selectedSymptoms
        //         })
        //         .then(function(response) {
        //             return response.json();
        //         })
        //         .then(function(data) {
        //             document.getElementById("diagnosis-results").innerHTML = data;
        //         })
        //         .catch(function(error) {
        //             console.error(error);
        //         });
        //     });
        // });
// document.addEventListener("DOMContentLoaded", function() {
  var form = document.querySelector("form");
  form.addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    var selectedSymptoms = [];
    var symptomSelects = document.querySelectorAll('select[name="symptom[]"]');
    symptomSelects.forEach(function(select) {
      var selectedOptions = Array.from(select.selectedOptions).map(function(option) {
        return option.value;
      });
      selectedSymptoms.push.apply(selectedSymptoms, selectedOptions);
    });

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "process.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Handle the response from the PHP script
        document.getElementById("diagnosis-results").innerHTML = xhr.responseText;
      }
    };
    xhr.send("selectedSymptoms=" + encodeURIComponent(JSON.stringify(selectedSymptoms)));
  });
// });
</script>

</head>

<body>
    <div class="loader-overlay">
        <div class="spinner"></div>
    </div>

    <header class="header flex">
        <div class="container flex">
            <div class="logo">
                <img src=".\img\logo\ujuzi-dawa-logo.png" alt="" class="logo-img" />
            </div>
            <form>
                <div class="search">
                    <input type="text" placeholder="Search Diseases..." />
                    <button type="submit">&#x1F50D;</button>
                </div>
            </form>

        </div>
    </header>

    <section class="banner" id="home">
        <div class="container flex">
            <div class="banner-text">
                <h1 class="banner-heading">A Medical Diagnosis System</h1>
                <p class="lead">
                    Using the application will make you feel like you are with your doctor
                </p>
            </div>
            <div class="banner-img">
                <img src="img\hero\medcare.jpg" alt="Banner" />
            </div>
        </div>
    </section>
    <main>
        <form method="post" action="process.php">
            <h1>Select symptoms<br><br</h1>
                    <label for="symptom-1">Symptom 1:</label>
                    <select id="symptoms-1" name="symptom[]" multiple>
                        <option value="<?php echo $options; ?>"><?php echo $options; ?></option>
                    </select>
                    <!-- <label for="symptom-2">Symptom 2:</label>
                    <select id="symptoms-2" name="symptom[]" multiple>
                        <?php //echo $optionz; ?>
                    </select>
                    <label for="symptom-3">Symptom 3:</label>
                    <select id="symptoms-3" name="symptom[]" multiple>
                        <?php //echo $optiona; ?>
                    
                    </select>
                    <label for="symptom-4">Symptom 4:</label>
                    <select id="symptoms-4" name="symptom[]" multiple>
                        <?php //echo $optionb; ?>
                    </select>
                    <label for="symptom-5">Symptom 5:</label>
                    <select id="symptoms-5" name="symptom[]" multiple>
                        <?php //echo $optionc; ?>
                    </select>
                    <label for="symptom-6">Symptom 6:</label>
                    <select id="symptoms-6" name="symptom[]">
                        <?php //echo $optiond; ?>
                    </select>
                    <label for="symptom-7">Symptom 7:</label>
                    <select id="symptoms-7" name="symptom[]" multiple>
                        <?php //echo $optione; ?>
                    </select> -->


                    <input type="submit" value="Check" onclick="event.preventDefault()">
                    <input type="reset" value="Reset">

                    <div id="diagnosis-results"></div>


        </form>
        
    </main>
    <script src="js/home.js" defer></script>
</body>

</html>