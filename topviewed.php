
<h2>Your Last 5 viewed</h2>

                
<?php
    if(isset($_COOKIE["lastids"])){
        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Description</th>";
        echo "</tr>"; 
        $hits = explode(",",$_COOKIE["lastids"]);
        $viewed = array();
        for($i=0; $i<5 and $i<sizeof($hits); $i++){
            $result = $conn->query("SELECT * FROM services where id = ".$hits[$i].";");
            $row = $result->fetch_assoc();
            echo "<tr>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["description"]."</td>";
            echo "</tr>";
            array_push($viewed,$hits[$i]);
        }
        echo "</table>";
    }
    else{
        echo "You have not viewed any services";
    }
?>