<?php

$servername='localhost';
$username  ='root';
$password  ='';

$id=$_REQUEST['id'];
    try{
        
            $connect=new PDO("mysql:host=$servername;dbname=mydb",$username);
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $stmt=$connect->prepare("select id,name,marks from stud");
            $stmt->execute();
            $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
            echo "<table border=5 width=80%>";
            
            foreach($stmt->fetchall() as $key=>$v)
            {
                
                echo "<tr>";
                echo"<td>$v[id]</td>";
                echo"<td>$v[name]</td>";
                echo"<td>$v[marks]</td>";
                echo "</tr>";
            }
            $result="delete from stud where ID='$id'";
            $connect->exec($result);

            echo "record deleted";
       }
       catch(PDOException $e)
            {
                echo $sql ."<br/>".$e->getmessage();
            }
?>