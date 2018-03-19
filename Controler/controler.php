<?php include_once "../Model/User.php"; ?>
<?php include_once "../Model/Appointment.php"; ?>
<?php include_once "../Config/database.php"; ?>

    
<?php
$user = new User();
$app = new Appointment();
    if(isset($_GET['method'])){
        if($_GET['method'] == "logIn"){
            $user -> trylogIn();
        }elseif ($_GET['method'] =="insertUser"){
            $user ->insertUser();
        }elseif ($_GET['method'] =="appointment"){
            if(isset($_SESSION['logged'])) {   
                if($user -> checkIfPatient()){
                 $app ->addAppointment();
                 }else{
                 echo"   
                <script language=\"javascript\" type=\"text/javascript\">
                alert('Z tego konta nie można umówić wizyty');
                window.location.href = \"../View/my_account.php\";
                </script>";
                 }
            
            }else {
                header("Location: ../View/login.php"); 
            }
        }elseif ($_GET['method'] =="cancelAppointment"){
            
        }  
    }else {
        echo "Zła metoda";
        die();
    }   
 

?>