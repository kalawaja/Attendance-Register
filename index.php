
<?php 

    $title='Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php'; 

    $results=$crud->getSpecialties();

?>

    <!--    
        - First Name
        - Last Name
        - Date of Birth
        - Specialty (Database Admin, Software Developer, Web Administrator, Other)
        - Email Address
        - Contact Number
    -->

    <h4 class="text-center">Registration for PHP Backend Project Presentations</h4>
    
    <form method="post" action="success.php">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="lastname">Date Of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="specialty">Area of Expertise</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while ($r=$results->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['specialty_id'] ?>"> <?php echo $r['name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email"
            aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input required type="text" class="form-control" id="phone" name="phone"
            aria-describedby="phoneHelp">
            <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </form>
<br>
<br>

<?php require_once 'includes/footer.php'; ?>