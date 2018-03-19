<?php
session_start();
class user{
    
    static $mysqlConnect;
    function __construct(){
        self::$mysqlConnect = new database();
    }

    function trylogIn(){ // pobierana dane z farmularza logowania i sprawdza j
            $login = $_POST['login'];
            $password = $_POST['password'];

            $sql="SELECT * FROM user WHERE login='$login'AND password ='$password'";
            $query = self::$mysqlConnect->query($sql);
            $result = $query->num_rows;
            if($result > 0){
                $_SESSION['logged']=true;
                $row = mysqli_fetch_array($query);
                $_SESSION['id_user']=$row['id_user'];
                $_SESSION['role']=$row['id_role'];
                $user_d=$row['id_userd'];
                $sql2="SELECT name FROM user_details WHERE id_userd = '$user_d'";
                $query = self::$mysqlConnect->query($sql2);
                $row=mysqli_fetch_array($query);
                $_SESSION['name'] = $row['name'];
                header("Location: ../View/my_account.php");
                
            } 
            else{
                echo"
                <script language=\"javascript\" type=\"text/javascript\">
                alert('Nieporawny login lub hasło');
                window.location.href = \"../View/login.php\";
                </script>";
            }
    }
    function getUsers(){ //wyświetla dane wszytskich userów
        $query = self::$mysqlConnect->query("SELECT * FROM user");
        
        while($user=mysqli_fetch_array($query)){

                echo '<tr><td>'.$user['id_user'].'</td><td>'.$user['email'].'</td><td>'.$user['password'].'</td></tr>';
            }
            mysqli_free_result($query);
        }   
    function getDoctorDetails($id_doc){
        $sql ="SELECT * FROM doctordata WHERE id_doc = $id_doc";
        $query = self::$mysqlConnect->query($sql);
        $row=mysqli_fetch_array($query);
        return $row;
    }   
    function getUsersDetails(){
        $sql="SELECT * FROM user U INNER JOIN user_details UD on U.id_userd=UD.id_userd";
        $query = self::$mysqlConnect->query($sql);
        
        while($row=mysqli_fetch_array($query)){
                echo '<tr><td>'.$row['id_user'].'</td><td>'.$row['email'].'</td><td>'.$row['name'].'</td><td>'.$row['surname'].'</td></tr>';
        }
        mysqli_free_result($query);
    }
    function checkIfPatient(){
        $id = $_SESSION['id_user'];
        $sql="SELECT id_doc FROM alluser WHERE id_user=$id";
        $query = self::$mysqlConnect->query($sql);
        $row = mysqli_fetch_array($query);
        if($row['id_doc']== NULL){
            return true;
        }
        else {
            return false;
        }

    }
    function checkPESEL($str){
        if (!preg_match('/^[0-9]{11}$/',$str)) //czy ma 11 cyfr
        {
            return false;
        }
     
        $arrSteps = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3); // tablica z odpowiednimi wagami
        $intSum = 0;
        for ($i = 0; $i < 10; $i++)
        {
            $intSum += $arrSteps[$i] * $str[$i]; 
        }
        $int = 10 - $intSum % 10; //obliczamy sume kontrolną
        $intControlNr = ($int == 10)?0:$int;
        if ($intControlNr == $str[10]) //sprawdzamy czy taka sama suma kontrolna jest w ciągu
        {
            return true;
        }
        return false;
    }
    function insertUser(){
        $temp_name =$_POST['name'];
        $temp_surname =$_POST['surname'];
        $temp_email = $_POST['email'];
        $temp_login = $_POST['login'];
        $temp_pesel = $_POST['pesel'];
        $temp_password = $_POST['password'];
        $temp_password2 = $_POST['password'];
    
        $bool=self::checkPESEL($temp_pesel);
        if($bool==false){
           $_SESSION['pesel_error']='<span style="color:red">Niepoprawny numer PESEL!</span>';
    
        }
        if($temp_password==$temp_password2){

            $sql= "INSERT INTO `user_details` (`id_userd`, `name`, `surname`, `pesel`, `datebirth`, `id_add`, `id_doc`, `id_card`) 
            VALUES (NULL, '$temp_name', '$temp_surname', '$temp_pesel', '1995-12-03', '1', NULL, NULL);";
            $query = self::$mysqlConnect->query($sql);


            $sql = "SELECT id_userd FROM user_details  WHERE $temp_pesel = pesel limit 1";
            $query = self::$mysqlConnect->query($sql);
            $row=mysqli_fetch_array($query);
            $id = $row['id_userd'];
             
            $sql2 ="INSERT INTO `user` (`id_user`, `email`, `login`, `password`, `enabled`, `salt`, `id_userd`, `id_role`) 
            VALUES (NULL, '$temp_email', '$temp_login', '$temp_password', '1', '999', '$id', '1');";
             
           $query = self::$mysqlConnect->query($sql2);
           if($query){
            header("Location: ../View/login.php?msg=User");
             }
            else{
            echo "Nie udało się dodać użytkownika";
            die();
            }

        }
            else{
                echo "hasla nie są takie same";
                die();
            }
        
    }
    function logOut(){
        session_unset();
        header("Location: ../View/index.php");

    }
    function __destruct(){
        self::$mysqlConnect->disconnect();
    }
}
?>