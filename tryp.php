<!DOCTYPE html>
<html>
<head>
  <title>Receptionist Interface</title>
  <style>
    /* CSS styles here */
  </style>
</head>
<body>
  <header>
    <div class="container">
      <div class="logo">
        <img src="logo.png" alt="Logo">
      </div>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Patients</a></li>
          <li><a href="#">Appointments</a></li>
        </ul>
      </nav>
    </div>
  </header>
  
  <div class="sidebar">
    <h2>Menu</h2>
    <ul>
      <li><a href="#">Dashboard</a></li>
      <li><a href="#">Patient Registration</a></li>
      <li><a href="#">Patient List</a></li>
      <li><a href="#">Appointment Scheduler</a></li>
    </ul>
  </div>
  
  <div class="main-content">
    <h1>Symptom Checker</h1>
    <div class="patient-info">
      <label for="patient-name">Patient Name:</label>
      <input type="text" id="patient-name">
    </div>
    <div class="symptom-checker">
      <h3>Enter Symptoms:</h3>
      <textarea id="symptoms" rows="4"></textarea>
      <button id="check-symptoms-btn">Check Symptoms</button>
    </div>
    <div id="disease-results"></div>
    <div id="booking-form" style="display: none;">
      <h3>Book Appointment</h3>
      <label for="department">Select Department:</label>
      <select id="department">
        <option value="Cardiology">Cardiology</option>
        <option value="Dermatology">Dermatology</option>
        <option value="Orthopedics">Orthopedics</option>
        <!-- Add more options for other departments -->
      </select>
      <button id="book-appointment-btn">Book Appointment</button>
    </div>
  </div>
  
  <footer>
    <p>&copy; 2023 Receptionist Interface. All rights reserved.</p>
  </footer>
  
  <script>
    // JavaScript code here
    
    // Get necessary elements
    const checkSymptomsBtn = document.getElementById('check-symptoms-btn');
    const diseaseResults = document.getElementById('disease-results');
    const bookingForm = document.getElementById('booking-form');
    const bookAppointmentBtn = document.getElementById('book-appointment-btn');
    
    // Event listener for checking symptoms
    checkSymptomsBtn.addEventListener('click', function() {
      const patientName = document.getElementById('patient-name').value;
      const symptoms = document.getElementById('symptoms').value;
      
      // Call API or perform symptom checking logic here
      
      // Assume diseases are returned as an array
      const diseases = ['Disease 1', 'Disease 2', 'Disease 3'];
      
      // Display disease results
      diseaseResults.innerHTML = '<h3>Disease Results:</h3>';
      diseases.forEach(function(disease) {
        diseaseResults.innerHTML += `<p>${disease}</p>`;
      });
      
      // Show booking form
      bookingForm.style.display = 'block';
    });
    
    // Event listener for booking appointment
    bookAppointmentBtn.addEventListener('click', function() {
      const department = document.getElementById('department').value;
      
      // Call API or perform booking logic here
      
      // Display success message
      bookingForm.innerHTML = '<h3>Appointment Booked</h3>';
      bookingForm.innerHTML += `<p>Department: ${department}</p>`;
    });
  </script>
</body>
</html>
