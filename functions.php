<?php
   
    require_once 'dbh.php';
    
    function display_data(){
        global $conn;
        $query = "SELECT * FROM `request` WHERE `Status` LIKE 'Pending' ORDER BY `id` DESC";
        $result = mysqli_query($conn,$query);
        
        
        return $result;

    }

    function display_data_approved(){
        global $conn;
        $query = "SELECT * FROM `request` WHERE `Status` LIKE 'Approved' ORDER BY `id` DESC";
        $result = mysqli_query($conn,$query);
        return $result;
    }
    
    function display_data_declined(){
        global $conn;
        $query = "SELECT * FROM `request` WHERE `Status` LIKE 'Declined' ORDER BY `id` DESC";
        $result = mysqli_query($conn,$query);
        return $result;
    }
    
    function display_emp_status(){
        global $conn;
        $query = "SELECT * FROM `request` ORDER BY `request`.`status1` DESC";
        $result = mysqli_query($conn,$query);
        return $result;
    }
    function display_users(){
        global $conn;
        $query = "SELECT * FROM `logindb`";
        $result = mysqli_query($conn,$query);
        return $result;
    }
?>
