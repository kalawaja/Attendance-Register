
<?php
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php'; 
    if(!isset($_GET['id'])) {
        include 'includes/errormessage.php';
        header ("Location: viewrecords.php");
    } else {
        //Get ID Values
        $id=$_GET['id'];

        //Call Delete Function
        $result=$crud->deleteAttendees($id);

        //Redirect to List
        if($result) {
            header("Location: viewrecords.php");
        } else {
            include 'includes/errormessage.php';
        }
    }

?>