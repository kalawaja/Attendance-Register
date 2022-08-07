
<?php
    class crud {
        //Private Database Object
        private $db;

        //Constructor to Initialize Private Variable to the Database Connection
        function __construct($conn) {
            $this->db=$conn;
        }

        //Function to Insert a New Record into the "attendee" Database
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty) {
            try {
                //Define SQL Statement to be Executed
                $sql="INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty_id) VALUES (:fname, :lname, :dob, :email, :contact, :specialty)";
                //Prepare the SQL Statement for Executed
                $stmt=$this->db->prepare($sql);
                //Bind all Placeholders to the Actual Values
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                //Execute Statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty) {
            try {
                //Define SQL Statement to be Executed (2)
                $sql= "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id=:id";
                $stmt=$this->db->prepare($sql);
                //Bind all Placeholders to the Actual Values (2)
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                //Execute Statement (2)
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendees() {
            try {
                $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id=s.specialty_id;";
                $result=$this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }   
        }

        public function getAttendeeDetails($id) {
            try {
            $sql="select * from attendee a inner join specialties s on a.specialty_id=s.specialty_id 
            where attendee_id= :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
            } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            }
        }

        public function deleteAttendees($id) {
            try {
                $sql="delete from attendee where attendee_id= :id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialties() {
            $sql = "SELECT * FROM `specialties`;";
            $result=$this->db->query($sql);
            return $result;
        }


    }
?>