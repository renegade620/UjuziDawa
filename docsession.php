<?php
session_start();

require "connect.php";

$sql = "SELECT * FROM doctor";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $_SESSION['userid'] = $row['doctor_id'];

  // echo $_SESSION['userid'];
}