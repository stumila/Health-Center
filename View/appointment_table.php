<?php include_once "../Model/Appointment.php"; ?>
<?php include_once "../Model/User.php"; ?>

<!DOCTYPE html>
<html lang='pl'>
    <?php include_once "header.php"; ?>
<body>
    <div id="container">
        <?php include_once "logo.php"; ?>
        <?php if(isset($_SESSION['logged'])  && ($_SESSION['logged']==true)){
            include_once "nav_log.php";
        }
        else include_once "nav.php"; ?>
        <?php include_once "aside.php"; ?>
        <div id="maincontent">
            <h1>Umów wizytę</h1>
            <div id ="buttons">
                <button class="button1">Rezygnuj</button>
                <button class="button1">Wybierz innego lekarza</button>
                
            </div>
            <?php $app_class = new Appointment();
            $id_doc=3;
            $app_table = $app_class -> doctorSurgery($id_doc);
            $tdate = new DateTime();
            $tdate = $app_class -> getdate();
            
           // <form action "../Controler/controler.php?method=appointment" method="POST" id="app_form"></form>
            
            echo "<table id=\"app\">";
                    
                    $user = new User();
                    $row = $user -> getDoctorDetails($id_doc);
                     echo "<caption>lek. med.". $row['name']." ".$row['surname']." - ". $row['spec']."</caption>";
                    ?>
                        <thead>
                            <tr>
                                <th>Poniedziałek</th>
                                <th>Wtorek</th>
                                <th>Środa</th>
                                <th>Czwartek</th>
                                <th>Piątek</th>
                            </tr>
                            <tr>
                                <?php
                                for($i=0; $i<5; $i++){
                                    $tdate->modify("+ 1 day");
                                    $string = $tdate->format('d.m.y');
                                   echo "<td>$string</td>";
                                }
                                ?>                                                                                                
                            </tr>
                          
                        </thead>
                        <tbody>  
                        <?php 
                              
                        $now = new DateTime();
                         echo "<tr><td>";
                         $day=0;
                         foreach($app_table as $key => $row){
                             if($row[0] == $day){
                                 $data = DateTime::createFromFormat('Y-m-d H:i:s', $row[1]);
                                if(!empty($row[2]) || $data<$now){
                                 $hour=$data->format('H:i');
                                 echo "<div><button type=\"button\" class=\"button3\" disabled > ".$hour." </button></div>";
                                }else{
                                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $row[1]);
                                        $hour=$date->format('H:i');
                                        $value = $date->format('Y-m-d H:i:s');
                                        echo "<div><form  method=\"post\" action=\"../Controler/controler.php?method=appointment\">
                                        <input name=\"choose\" type=\"hidden\" value=\"$value\">
                                        <input name=\"submit\" class=\"button2\" type=\"submit\" value=\"$hour\">
                                        </form></div>";   
                                
                                }}
                            elseif($row[0]==$day+1){
                                echo"</td><td>";
                                if($day < 4 ) $day++;
                                prev($app_table);
                            }else{
                                echo"</td>";
                                if($day < 4 ) {
                                    $day++;
                                     echo"<td>";
                                     prev($app_table);
                                }
                                }
                                 } 
            
                            echo "</td></tr>";
                        
                        ?>
                       </tbody>
            </table>
        </div>
        <?php include_once "footer.php"; ?>
    </div>
   
    <script src="..\resources\js\jquery-3.2.1.min.js"></script>
	
	<script src="..\resources\js\sticky.js"></script>


</body>
</html>