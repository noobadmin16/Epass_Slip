
<?php
 require_once 'dbh.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `request` ORDER BY `id` DESC";
$result = $conn->query($sql);
?>
 <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Position</th>
                      <th scope="col">Location</th>
                      <th scope="col">Status</th>
                      <th scope = "col">Confirmed By</th>
                      <th scope="col">Remarks</th>
                      <th scope="col">Action</th>
                      
                  </tr>
<?php
while($row = mysqli_fetch_assoc($result))
{
  ?>
  
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["position"]; ?></td>
                  <td><?php echo $row["destination"]; ?></td>
                  <td><?php echo $row["status1"]; ?></td>
                  <td><?php echo $row["confirmed_by"]; ?></td>
                  <td><?php echo $row["remarks"]; ?></td>
                  
                  <td> <a href="view_track_emp.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a></td>
</tr>

  <?php
}
//echo $result->num_rows;
/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Notification: " . $row["description"];
    }
} else {
    echo "0 results";
}
*/
$conn->close();
?>