<?php
    require_once 'connection.php';

    $sql_field = "SELECT params FROM demo_view";
    $result_field = mysqli_query($connect, $sql_field);

    $array = array();
    while($row1 = $result_field->fetch_assoc()) {
        $array = $row1['params'];
    }
    $array = str_replace("[","",$array);
    $array = str_replace("]","",$array);

    $array1= explode(",",$array);

    echo count($array1);
    
    $sql = "SELECT * FROM turbin1";
    $result1 = mysqli_query($connect, $sql);

    $sql_f = "SHOW COLUMNS FROM turbin1";
    $result_f = mysqli_query($connect,$sql_f);
    
    echo "<table border=1>";
    if ($result1->num_rows > 0) {  
        echo "<tr>"; 
        $index = 0;
        while($row1 = $result1->fetch_assoc()) {
            while($row_f = mysqli_fetch_array($result_f)){
                $temp = $row_f['Field'];

                if($row1[$temp] == null){
                    //do nothing
                } else{
                    // echo "<th>".$temp."</th>";
                    echo "<th>".$array1[$index]."</th>";
                    
                    $index++;
                }
            }
            // echo $row1['id'].' '. $row1['sektor'].' '. $row1['params'].' '. $row1['test']. "<br>";
        }
        echo "</tr>";
    }


    $sql = "SELECT * FROM turbin1";
    $result1 = mysqli_query($connect, $sql);

    $sql_f = "SHOW COLUMNS FROM turbin1";
    $result_f = mysqli_query($connect,$sql_f);
    
    if ($result1->num_rows > 0) {  
         echo "<tr>"; 
        while($row1 = $result1->fetch_assoc()) {
            while($row_f = mysqli_fetch_array($result_f)){
                $temp = $row_f['Field'];
                if($row1[$temp] == null){
                    //do nothing
                } else{
                    echo "<td>".$row1[$temp]."</td>";
                }
            }
            // echo $row1['id'].' '. $row1['sektor'].' '. $row1['params'].' '. $row1['test']. "<br>";
        }
        echo "</tr>";

    }

    echo "</table>";
