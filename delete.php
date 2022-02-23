<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thebarber";
$Hname = $_GET['Hname'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM service WHERE s_name='$Hname'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  echo '<script type="text/javascript">';
    echo 'setTimeout(function () { 
    window.location.href = "/thebarber/priceH.php";';
    echo '}, 1000 );</script>';
   

} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
<script>
function myFunction() {
  location.href = "/thebarber/priceH.php";
}
</script>