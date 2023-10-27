<?php
// Include your database connection file (dbh.php) here
include('dbh.php');

// Perform a query to retrieve the original data
$sql = "SELECT * FROM `request` WHERE `Status` LIKE 'Approved' ORDER BY `id` DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Initialize an empty string to store the table rows
$tableRows = '';

// Loop through the query results and format them as table rows
while ($row = mysqli_fetch_assoc($result)) {
    $tableRows .= '<tr>';
    $tableRows .= '<td>' . $row['name'] . '</td>';
    $tableRows .= '<td>' . $row['position'] . '</td>';
    $tableRows .= '<td>' . $row['destination'] . '</td>';
    $tableRows .= '<td>' . $row['typeofbusiness'] . '</td>';
    $tableRows .= '<td>' . $row['Status'] . '</td>';
    $tableRows .= '<td>' . $row['confirmed_by'] . '</td>';
    $tableRows .= '<td><a href="view_approve_data_emp.php?id=' . $row['id'] . '" class="btn btn-info btn-sm">View</a></td>';
    $tableRows .= '</tr>';
}

// Output the table rows (for debugging purposes)

echo $tableRows;


// Close the database connection
mysqli_close($conn);
?>
