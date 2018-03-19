<?php include_once "../Model/User.php"; ?>
<?php include_once "../Model/Appointment.php"; ?>
<?php include_once "../Config/database.php"; ?>

<?php
class Controler{
    static $user;
    static $app;
    static $result;
    static $format;

function __construct(){
    self::$user = new User();
    self::$app = new Appointment();
}

function sendResult() {
   return self::$result;  
 }
 function getmyApointments() {
    self::$app ->displayMy();
  }
function sendFormat() {
    return self::$format= self::$app->getFormat();  
  }
function display(){
    self::$app ->displayAll();
    self::$result=self::$app->getdisplayAll();
}

}
 ?>