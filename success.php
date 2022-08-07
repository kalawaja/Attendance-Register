
<?php 
    $title='Success';
    require_once 'includes/header.php'; 
    require_once 'db/conn.php';

    if(isset($_POST['submit'])) {
        //Extract Values from the $_POST Array
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $contact=$_POST['phone'];
        $specialty=$_POST['specialty'];

        //Call Function to Insert and Track if Success or Not
        $isSuccess=$crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

        if($isSuccess) {
            include 'includes/successmessage.php';
        } else {
            include 'includes/errormessage.php';
        }
    }    
?>


<br>
<br>
<br>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>