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
