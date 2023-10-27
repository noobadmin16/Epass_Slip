<?php
session_start();
require_once 'dbh.php';
if (isset($_POST['approve_req'])) {
    $data_id = mysqli_real_escape_string($conn, $_POST['data_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $confirmed_by = mysqli_real_escape_string($conn, $_POST['confirmed_by']);
    $esttime = mysqli_real_escape_string($conn, $_POST['esttime']);

    $query = "UPDATE request SET esttime = '$esttime', Status = '$status', `status1` = 'Pass-Slip', confirmed_by = '$confirmed_by' WHERE id = '$data_id'";
    
    // Execute the query and check for errors
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Request Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Request Not Updated. Error: " . mysqli_error($conn); // Capture and display the error message
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['decline_req'])) {
     $data_id = mysqli_real_escape_string($conn, $_POST['data_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $confirmed_by = mysqli_real_escape_string($conn, $_POST['confirmed_by']);
    $reason = mysqli_real_escape_string($conn, $_POST['decline_reason']);

    $query = "UPDATE request SET Status = '$status', `status1` = 'Declined', confirmed_by = '$confirmed_by', `reason` = '$reason' WHERE id = '$data_id'";
    
    // Execute the query and check for errors
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Request Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Request Not Updated. Error: " . mysqli_error($conn); // Capture and display the error message
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['returned_emp']))
{
    $data_id = mysqli_real_escape_string($conn, $_POST['data_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $time_ret = mysqli_real_escape_string($conn, $_POST['time_ret']);
    $location = mysqli_real_escape_string($conn, $_POST['designation']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $query = "UPDATE request SET `destination` = '$location', time_returned = '$time_ret', Status = '$status', `status1` = 'Present', remarks = '$remarks' WHERE id = '$data_id'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run)
    {
        
        header("Location: approved.php");
        exit(0);
    }
    else
    {
        
        header("Location: approved.php");
        exit(0);
    }


}
if(isset($_POST['delete']))
{
   $id = $_POST['id'];

   $query = "DELETE FROM logindb WHERE Id='$id'";
    $query_run = mysqli_query($conn,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Successfully Deleted";
        header("Location: register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Delete";
        header("Location: register.php");
        exit(0);
    }

}


if(isset($_POST['returned_emp_desk']))
{
    $data_id = mysqli_real_escape_string($conn, $_POST['data_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $time_ret = mysqli_real_escape_string($conn, $_POST['time_ret']);
    $location = mysqli_real_escape_string($conn, $_POST['designation']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $query = "UPDATE request SET `destination` = '$location', time_returned = '$time_ret', Status = '$status', `status1` = 'Present', remarks = '$remarks' WHERE id = '$data_id'";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run)
    {
        
        header("Location: approved_desk.php");
        exit(0);
    }
    else
    {
        
        header("Location: approved_desk.php");
        exit(0);
    }


}
?>