
<?php    
    require_once 'db/conn.php'; 
    //Get Values from POST Operation
    if(isset($_POST['submit'])) {
        //Extract Values from the $_POST Array
        $id=$_POST['id'];
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $contact=$_POST['phone'];
        $specialty=$_POST['specialty'];

        //Call Crud Function
        $result=$crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);
        //Redirect to viewrecords.php
        if($result) {
            header("Location: viewrecords.php");
        } else {
            include 'include/errormessage.php';
        }
    } else {
        include 'include/errormessage.php';
    }
?>
