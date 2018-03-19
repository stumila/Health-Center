<?php session_start();?>
<?php include_once "../Controler/newcontroler.php"; ?>



<!DOCTYPE html>
<html lang='pl'>
    <?php include_once "header.php"; ?>
<body>
    <div id="container">
        <?php include_once "logo.php"; ?>
        <?php include_once "nav_log.php"; ?>
        <?php include_once "aside.php"; ?>
        <div id="maincontent">
            <h1>Moje konto</h1>
                 <?php echo 'Witaj '.$_SESSION['name'];?> </br>
                 <?php if(isset($_SESSION['pesel_error']))  echo $_SESSION['pesel_error']; ?>
                <?php
                  $con = new Controler();
                    if($_SESSION['role']==1){
                        //user wyświetl dane + moje wizyty
                        $id =$row['id_app'];
                        echo "<table> 
                        <caption>Moje wizyty</caption>
                        <thead>
                             <tr><td>Data</td><td colspan = \"2\">Lekarz</td></tr>
                        </thead> 
                        <tbody>";
                        $con ->getmyApointments();
                        
                       echo "</tbody></table>";
                    }elseif($_SESSION['role']==2){
                        //wyświetla liste pacjentów w danym dniu form data 
                        
                        echo  "<div class=\"log\">
                        <form action=\"my_account.php?method=getPatients\" method=\"post\">
                            Sprawdź listę pacjentów w dniu: </br>
                            <input type=\"date\"  class=\"login\" name=\"dr_date\" required/>
                            <input type=\"submit\" class=\"login\" value=\"Lista pacjentów\">
                        </form>
                        "  ;
                        if(isset($_GET['method'])){
                            if ($_GET['method'] =="getPatients"){
                                $con-> display();
                                $q = $con -> sendResult();
                                $f = $con -> sendFormat();
                                
                                if($q!=NULL){
                                                            
                                  echo "<table>    
                                 <caption>Lista pacjentów zapisanych w dniu $f</caption>
                                 <thead>
                                 <tr><td>Godzina</td><td colspan = \"2\">Imię i nazwisko pacjenta</td></tr>
                                 </thead> <tbody>";
                                while($row=mysqli_fetch_array($q)){
                                $vdate = DateTime::createFromFormat('Y-m-d H:i:s',$row['vdate']);
                                 $format = $vdate->format('H:i');
    
                                 echo "<tr><td>".$format."</td><td colspan = \"2\">".$row['name']." ".$row['surname']."</td></tr>";
                                              
                                
                                }
                                echo "</tbody></table>";
                                     }  
                                    }                       
                            }
                        }
                ?>
                </div>
                <div style="clear: both;"></div >
        </div>
        <?php include_once "footer.php"; ?>
    </div>
    <script src="..\resources\js\jquery-3.2.1.min.js"></script>
	<script src="..\resources\js\sticky.js"></script>
</body>
</html>