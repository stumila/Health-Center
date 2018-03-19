<?php include_once "../Model/User.php"; ?>
<?php include_once "../Model/Appointment.php"; ?>
<?php include_once "../Config/database.php"; ?>
 
<?php 
        $app = new Appointment();
        $app_table =  $app ->doctorSurgery(3);
        

    echo "<table>";
        
        while(!empty($app_table)){
            $day=0;
            echo "<tr>";
         foreach($app_table as $key => $row){
             if($row[0] == $day){
                if(empty($row[2])){
                    $data = DateTime::createFromFormat('Y-m-d H:i:s', $row[1]);
                    $hour=$data->format('H:i');
                    echo "<td><button class='button2' type='submit' form='app_form' value='$row[1]' > ".$hour." </button></td>";
                }else{
                    $data = DateTime::createFromFormat('Y-m-d H:i:s', $row[1]);
                    $hour=$data->format('H:i');
                     echo "<td><button class='button3' disabled > ".$hour." </button></td>";
                }

                
                unset($app_table[$key]);
               if($day<4){$day++;}
                else break;
             }
            else{
                $array = [];
                for($i=0; $i < 5 ; $i++){
                    foreach($app_table as $row){
                        if($row[0]==$i){
                            array_push($array,$i);
                            break;
                        }
                     }
                }
                if(!(in_array($day,$array))){
                 echo "<td></td>";
               if($day<4) $day++; 
              }
              } 
      }
    echo "</tr>";
      }
      echo "</table>";
?>