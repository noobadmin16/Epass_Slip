
<?php
 require_once 'dbh.php';


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `request` WHERE `Status` LIKE 'Approved' ORDER BY `id` DESC";
$result = $conn->query($sql);
?>
 <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Position</th>
                      <th scope="col">Destination</th>
                      <th scope="col">Type of Request</th>
                      <th scope="col">Status</th>
                      <th scope = "col">Confirmed By</th>
                      <th scope="col">Action</th>
                      
                  </tr>
<?php
while($row = mysqli_fetch_assoc($result))
{
  ?>
  
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["position"]; ?></td>
                  <td><?php echo $row["destination"]; ?></td>
                  <td><?php echo $row["typeofbusiness"]; ?></td>
                  <td><?php echo $row["Status"]; ?></td>
                  <td><?php echo $row["confirmed_by"]; ?></td>
                  <td><a href="view_approve_data_emp.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a></td>
</tr>

  <?php
}

$conn->close();
?>