<head>
    <!-- Other head elements -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<?php
include "connect.php"; // Include the database connection code

// Retrieve disease statistics
$query = "SELECT diseases, COUNT(*) as count FROM user_profile GROUP BY diseases";
$result = mysqli_query($conn, $query);

// Initialize arrays to store labels and data for the bar graph
$labels = [];
$data = [];

// Process query results and populate labels and data arrays
while ($row = mysqli_fetch_assoc($result)) {
    $diseases = explode(",", $row['diseases']); // Split the diseases array into separate components
    $labels = array_merge($labels, $diseases); // Add the diseases to the labels array
    $data[] = $row['count'];
}

// Close the database connection
$conn->close();

// Remove duplicate diseases from the labels array
$labels = array_unique($labels);
?>















<!-- <label for="symptom-4">Symptom 4:</label>
                                <select id="symptoms-4" name="symptom[]" multiple>
                                    <option value="dischromic patches">dischromic patches</option>
                                    <option value="watering from eyes">shivering</option>
                                    <option value="vomiting">vomiting</option>
                                    <option value="cough">cough</option>
                                    <option value="nausea">nausea</option>
                                    <option value="loss of appetite">loss of appetite</option>
                                    <option value="spotting urination">spotting urination</option>
                                    <option value="burning micturition">burning micturition</option>
                                    <option value="passage of gases">passage of gases</option>
                                    <option value="abdominal pain">abdominal pain</option>
                                    <option value="extra marital contacts">extra marital contacts</option>
                                    <option value="lethargy">lethargy</option>
                                    <option value="irregular sugar level">irregular sugar level</option>
                                    <option value="diarrhoea">diarrhoea</option>
                                    <option value="breathlessness">breathlessness</option>
                                    <option value="family history">family history</option>
                                    <option value="loss of balance">loss of balance</option>
                                    <option value="lack of concentration">lack of concentration</option>
                                    <option value=" blurred and distorted vision"> blurred and distorted vision</option>
                                    <option value="dizziness">dizziness</option>
                                    <option value="altered sensorium">altered sensorium</option>
                                    <option value="excessive hunger">excessive hunger</option>
                                    <option value="weight loss">weight loss</option>
                                    <option value="high fever">high fever</option>
                                    <option value="headache">headache</option>
                                    <option value="sweating">sweating</option>
                                    <option value="fatigue">fatigue</option>
                                    <option value="dark urine">dark urine</option>
                                    <option value="yellowish skin">yellowish skin</option>
                                    <option value="yellowing of eyes">yellowing of eyes</option>
                                    <option value="swelling of stomach">swelling of stomach</option>
                                    <option value="distention of abdomen">distention of abdomen</option>
                                    <option value="bloody stool">bloody stool</option>
                                    <option value="irritation in anus">irritation in anus</option>
                                    <option value="chest pain">chest pain</option>
                                    <option value="obesity">obesity</option>
                                    <option value="swollen legs">swollen legs</option>
                                    <option value="mood swings">mood swings</option>
                                    <option value="restlessness">restlessness</option>
                                    <option value="swelling joints">swelling joints</option>
                                    <option value="hip joint pain">hip joint pen</option>
                                    <option value="movement stiffness">movement stiffness</option>
                                    <option value="painful walking">painful walking</option>
                                    <option value="spinning movements">spinning movements</option>
                                    <option value="scurring">scurring</option>
                                    <option value="continuous feel of urine">continuous feel of urine</option>
                                    <option value="silver like dusting">silver like dusting</option>
                                    <option value="small dents in nails">small dents in nails</option>
                                    <option value="red sore around nose">red sore around nose</option>
                                    <option value="yellow crust ooze">yellow crust ooze</option>

                                </select>

                                <label for="symptom-5">Symptom 5:</label>
                                <select id="symptoms-5" name="symptom[]" multiple>
                                    <option value="cough">cough</option>
                                    <option value="chest pain">chest pain</option>
                                    <option value="itching">itching</option>
                                    <option value="loss of appetite">loss of appetite</option>
                                    <option value="abdominal pain">abdominal pain</option>
                                    <option value="internal itching">internal itching</option>
                                    <option value="passage of gases">passage of gases</option>
                                    <option value="irregular sugar level">irregular sugar level</option>
                                    <option value="blurred and distorted vision">blurred and distorted vision</option>
                                    <option value="family history">family history</option>
                                    <option value="mucoid sputum">mucoid sputum</option>
                                    <option value="fatigue">fatigue</option>
                                    <option value="lack of concentration">lack of concentration</option>
                                    <option value="excessive hunger">excessive hunger</option>
                                    <option value="stiff neck">stiff neck</option>
                                    <option value="loss of balance">loss of balance</option>
                                    <option value="high fever">high fever</option>
                                    <option value="yellowish skin">yellowish skin</option>
                                    <option value="nausea">nausea</option>
                                    <option value="headache">headache</option>
                                    <option value="dark urine">dark urine</option>
                                    <option value="yellowing of eyes">yellowing of eyes</option>
                                    <option value="distention of abdomen">distention of abdomen</option>
                                    <option value="history of alcohol consumption">history of alcohol consumption</option>
                                    <option value="breathlessness">breathlessness</option>
                                    <option value="sweating">sweating</option>
                                    <option value="irritation in anus">irritation in anus</option>
                                    <option value="swollen legs">swollen legs</option>
                                    <option value="swollen blood vessels">swollen blood vessels</option>
                                    <option value="lethargy">lethargy</option>
                                    <option value="dizziness">dizziness</option>
                                    <option value="diarrhoea">diarrhoea</option>
                                    <option value="swelling joints">swelling joints</option>
                                    <option value="painful walking">painful walking</option>
                                    <option value="unsteadiness">unsteadiness</option>
                                    <option value="small dents in nails">small dents in nails</option>
                                    <option value="inflammatory nails">inflammatory nails</option>
                                    <option value="yellow crust ooze">yellow crust ooze</option>


                                </select>

                                <label for="symptom-6">Symptom 6:</label>
                                <select id="symptoms-6" name="symptom[]" multiple>
                                    <option value="chest pain">chest pain</option>
                                    <option value="abdominal pain">abdominal pain</option>
                                    <option value="yellowing of eyes">yellowing of eyes</option>
                                    <option value="internal itching">internal itching</option>
                                    <option value="blurred and distorted vision">blurred and distorted vision</option>
                                    <option value="obesity">obesity</option>
                                    <option value="mucoid sputum">mucoid sputum</option>
                                    <option value="stiff neck">stiff neck</option>
                                    <option value="depression">depression</option>
                                    <option value="yellowish skin">yellowish skin</option>
                                    <option value="dark urine">dark urine</option>
                                    <option value="diarrhoea">diarrhoea</option>
                                    <option value="headache">headache</option>
                                    <option value="loss of appetite">loss of appetite</option>
                                    <option value="constipation">constipatiom</option>
                                    <option value="family history">family history</option>
                                    <option value="nausea">nausea</option>
                                    <option value="history of alcohol consumption">history of alcohol consumption</option>
                                    <option value="fluid overload">fluid overload</option>
                                    <option value="high fever">high fever</option>
                                    <option value="breathlessness">breathlessness</option>
                                    <option value="swelled lymph nodes">swelled lymph nodes</option>
                                    <option value="sweating">sweating</option>
                                    <option value="malaise">malaise</option>
                                    <option value="swollen blood vessels">swollen blood vessels</option>
                                    <option value="prominent veins on calf">prominent veins on calf</option>
                                    <option value="dizziness">dizziness</option>
                                    <option value="puffy face and eyes">puffy face and eyes</option>
                                    <option value="fast heart rate">fast heart rate</option>
                                    <option value="painful walking">painful walking</option>
                                    <option value="inflammatory nails">inflammatory nails</option>

                                </select>

                                <label for="symptom-7">Symptom 7:</label>
                                <select id="symptoms-7" name="symptom[]" multiple>
                                    <option value="yellowing of eyes">yellowing of eyes</option>
                                    <option value="obesity">obesity</option>
                                    <option value="excessive hunger">excessive hunger</option>
                                    <option value="depression">depression</option>
                                    <option value="irritability">irritability</option>
                                    <option value="dark urine">dark urine</option>
                                    <option value="abdominal pain">abdominal pain</option>
                                    <option value="muscle pain">muscle pain</option>
                                    <option value="loss of appetite">loss of appetite</option>
                                    <option value="mild fever">mild fever</option>
                                    <option value="headache">headache</option>
                                    <option value="nausea">nausea</option>
                                    <option value="constipation">constipation</option>
                                    <option value="diarrhoea">diarrhoea</option>
                                    <option value="yellow urine">yellow urine</option>
                                    <option value="fluid overload">fluid overload</option>
                                    <option value="breathlessness">breathlessness</option>
                                    <option value="sweating">sweating</option>
                                    <option value="swelled lymph nodes">swelled lymph nodes</option>
                                    <option value="malaise">malaise</option>
                                    <option value="yellowish skin">yellowish skin</option>
                                    <option value="phlegm">phlegm</option>
                                    <option value="prominent veins on calf">prominent veins on calf</option>
                                    <option value="puffy face and eyes">puffy face and eyes</option>
                                    <option value="enlarged thyroid">enlarged thyroid</option>
                                    <option value="fast heart rate">fast heart rate</option>
                                    <option value="high fever">high fever</option>
                                    <option value="blurred and distorted vision">blurred and distorted vision</option>

                                </select> -->

                <!-- <button id="show-more-button" style="background-color: #45a049;">+</button> -->




<script>
    document.addEventListener("DOMContentLoaded", function() {
  // Hide select elements starting from index 4 (3rd element)
  for (let i = 4; i <= 7; i++) {
    document.getElementById("symptoms-" + i).style.display = "none";
  }

  // Counter to keep track of the visible select elements
  let visibleCount = 3;

  // Event listener for the "More symptoms" button
  document.getElementById("more-symptoms-btn").addEventListener("click", function() {
    // Increment the counter and get the next select element to display
    visibleCount++;
    const nextSymptomSelect = document.getElementById("symptoms-" + visibleCount);

    // Display the next select element if available
    if (nextSymptomSelect) {
      nextSymptomSelect.style.display = "block";
    }

    // Hide the "More symptoms" button if all select elements are visible
    if (visibleCount === 7) {
      this.style.display = "none";
    }
  });
});
</script>


<div style="width: 500px; height: 300px;">
    <canvas id="diseaseChart"></canvas>
</div>


<script>

    var ctx = document.getElementById('diseaseChart').getContext('2d');

    // Define an array of colors for each bar
    var barColors = [
        'rgba(75, 192, 192, 0.6)',
        'rgba(255, 99, 132, 0.6)',
        'rgba(54, 162, 235, 0.6)',
        // Add more colors as needed
    ];

    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Disease Statistics',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: barColors, // Assign the array of colors to the backgroundColor property
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });

</script>














<!DOCTYPE html>
<html>
    <head>
        <title>Live Search </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <style>
            #patientList p:hover{
                cursor: pointer;
                background-color: #f9f9f9;
            }
        </style>
    </head>
    
<body>
    <input type="text" id="patientNameInput" onkeyup="fetchPatients()" placeholder="Search Patient..." autocomplete="off" />
    <div id="patientList"></div>

    <script>
        function fetchPatients() {
            var query = $('#patientNameInput').val();
            if (query !== '') {
                $.ajax({
                    url: '#',
                    method: 'POST',
                    data: { query: query },
                    success: function(data) {
                        $('#patientList').html("");
                        var names = JSON.parse(data);
                        names.forEach(function(name) {
                            $('#patientList').append("<p>"+name+"</p>");
                        });
                    }
                });
            }
            else {
                $('#patientList').html('');
            }
        }
    </script>
</body>

</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
        $conn = new mysqli('localhost', 'username', 'password', 'database');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->real_escape_string($_POST['query']);
        $sql = "SELECT name FROM patient WHERE name LIKE '%$query%'";
        $result = $conn->query($sql);

        $names = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($names, $row['name']);
            }
        }

        echo json_encode($names);

        $conn->close();
    }
?>






 <!-- START ABOUT -->
 <section class="about" id="about">
    <div class="container">
      <div class="section-heading">
        <h2>Who we are</h2>
        <p class="lead">Welcome to the Medical Diagnosis System, an online tool designed to help you identify potential
          health issues and determine the best course of action. Our system is easy to use, with a simple interface that
          allows you to input your symptoms and quickly receive potential diagnoses and remedies.</p>

        <p class="lead">Our system relies on a repository approach, where stored data is used to generate the output.
          The application logic of our system includes algorithms and rules that process the user input and generate
          potential diagnoses. It analyzes the symptoms entered by the user and compares them to a database of medical
          knowledge to identify potential medical conditions. Our database includes information on common medical
          conditions, their symptoms, and recommended treatments.</p>

        <p class="lead">Our system is designed to be user-friendly, with a simple interface that allows users to input
          their symptoms and quickly receive potential diagnoses and remedies. The system is fast and accurate, with the
          ability to process large amounts of data quickly and provide users with accurate results.</p>

        <p class="lead">At the Medical Diagnosis System, we believe that access to accurate health information is a
          fundamental right for all individuals. Our system is designed to be a reliable resource for anyone who is
          looking to better understand their health and identify potential health issues.</p>

        <p class="lead">Thank you for choosing the Medical Diagnosis System. We hope that our system can help you make
          informed decisions about your health and well-being.</p>
      </div>
    </div>
  </section>
  <!-- END ABOUT -->
  <!-- START FEATURES -->
  <section class="features" id="features">
    <div class="container">
      <div class="section-heading">
        <h2>Why Us</h2>
        <p class="lead">
          You can do whatever you want with this system as if you are inside the
          hospital.
        </p>
      </div>
      <div class="features-items flex">
        <div class="item">
          <div class="feature-icon">
          </div>
          <div class="feature-body">
            <h3 class="feature-title">Easy To Use</h3>
            <p class="lead">
              Simple and straightforward design.
            </p>
          </div>
        </div>
        <div class="item">
          <div class="feature-icon">
          </div>
          <div class="feature-body">
            <h3 class="feature-title">Saves you money and time</h3>
            <p class="lead">No more long journeys to the doctor.<br> No more long wait hours to see the doctor.</p>
          </div>
        </div>
        <div class="item">
          <div class="feature-icon">
          </div>
          <div class="feature-body">
            <h3 class="feature-title">24hr Operation</h3>
            <p class="lead">
              The system is available for use on a daily for every hour.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END FEATURES -->
  <!-- MAIN JS  -->