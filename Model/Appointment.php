<?php include_once "../Config/database.php"; ?>
<?php
session_start();


class Appointment{

    static $date;
    static $mysqlConnect;
    static $displayAll;
    static $formatDate;
    function __construct(){
        self::$mysqlConnect = new database();
    }
    function addAppointment(){
       // $mysqltime = date ("Y-m-d H:i:s", $phptime);
        $id_doc= 3;
        $user = $_SESSION['id_user'];

        $data = $_POST['choose'];
       
        $sql="INSERT INTO `appointment` (`id_app`, `date`, `id_doc`, `id_type`, `id_user`) 
        VALUES (NULL, '$data', $id_doc, NULL, $user);";
        $query = self::$mysqlConnect->query($sql);

        if($query){
            header("location: ../View/my_account.php?msg=OK");
        }
        else{
            echo "Appointment not added to db.";
            die();
        }

    }
    function displayAll(){
        $_SESSION['all'] = $_POST['dr_date'];
        $date = DateTime::createFromFormat('Y-m-d', $_POST['dr_date']);
        $ud=$_SESSION['id_user'];
        self::$formatDate = $date->format('Y-m-d');
        $query = self::$mysqlConnect->query("SELECT id_doc FROM alluser WHERE id_user=$ud limit 1");
        $value = mysqli_fetch_object($query);
        $dr_id = $value->id_doc;
        $d=self::$formatDate;
        $sql ="SELECT * FROM Patients WHERE id_doc=$dr_id AND Date(vdate)='$d'";
        self::$displayAll = self::$mysqlConnect->query($sql);
    }   
    function displayMy(){
        $id = $_SESSION['id_user'];
        $query = self::$mysqlConnect->query("SELECT * FROM user_appointment where id_user=$id");
        
        while($row=mysqli_fetch_array($query)){
                
                echo '<tr><td>'.$row['date'].'</td><td colspan = "2">dr. '.$row['name'].' '.$row['surname'].'</td>
                <td>
                <form method=\"post\" action=\"../Controler/controler.php?method=cancelAppointment\">
                   <input name=\"app\" type=\"hidden\" value=\"$id\">
                   <input type=\"submit\" class=\"button2\" value=\"Odwołaj wizytę\">
                </form>
                </td></tr>';
            }
        mysqli_free_result($query);
           
    }
    function getFormat(){
        return self::$formatDate;
    }
    function getdisplayAll(){
        return self::$displayAll;
    }
    function cancelAppointment(){
        $app = $_POST['app'];
        $sql="DELETE FROM appointment WHERE id_app=$app";
        $query=self::$mysqlConnect->query($sql);
        if($query){
           // header("location: ../View/my_account.php");
        }else{
            die();
        }
    }
    function getDate(){
        return self::$date;
    }   
    function doctorSurgery($id_doctor){

        self::$date = new DateTime();
        $d = self::$date->format("N");
        if($d < 6){
               $z=($d-1);
                 self:: $date->modify("- $z day");
        }elseif($d == 6){
              self:: $date->modify("+ 2 day");
        }elseif($d == 7){
                self::$date->modify("+ 1 day");
        }
        $sql ="SELECT WEEKDAY(start), TIME(start), TIME(end)
                FROM surgery 
                WHERE id_doc=$id_doctor;";
        $query = self::$mysqlConnect->query($sql);
        $rowarray=array();
        while($row = mysqli_fetch_array($query)){
            $row['0']-=1;
            $rowarray[]=$row;
        }
        
        
        $sql ="CREATE TEMPORARY TABLE Atime(
            date Datetime   
        );";
        self::$mysqlConnect->pconnect();
        $query=self::$mysqlConnect->pquery($sql);
     
        foreach($rowarray as $row){
            for($weekday = 0; $weekday<5; $weekday++){
                if($row['0'] == $weekday){
                    $localdate= clone self::$date;
                    $localdate->modify("+ $weekday day");
                    $enddate= clone $localdate;
                    $start = DateTime::createFromFormat('H:i:s', $row['1']);
                    $end = DateTime::createFromFormat('H:i:s', $row['2']);
                    $localdate -> setTime($start->format('H'),$start->format('i'));
                    $enddate -> setTime($end->format('H'),$end->format('i'));
                    do{  
                        $localdate->modify("+ 30 minutes");  
                        $querydate=$localdate->format('Y-m-d H:i:s');
                        $query2 = self::$mysqlConnect->pquery("INSERT INTO Atime VALUES('$querydate');");  
                    }while($localdate < $enddate);
                    }
                
        } 
    }
        $trow;
        $appointment_table;
        $query3 = self::$mysqlConnect->pquery("SELECT WEEKDAY(Atime.date), Atime.date, appointment.id_app  from Atime LEFT JOIN appointment ON Atime.date = appointment.date ORDER by Atime.date ASC; ");
        $i=0;
        while($row = mysqli_fetch_array($query3)){
            $trow[0] = $row['0'];
            $trow[1] = $row['1'];
            $trow[2] = $row['2'];
            $appointment_table[$i] = $trow;
            $i++;
        }
    return $appointment_table;    
       
    }
}
?>