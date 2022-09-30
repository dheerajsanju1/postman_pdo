<?php

$servername ='localhost';
$username   ='root';
$password   ='';

$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$marks=$_REQUEST['marks'];
try{
        $id=$_REQUEST['id'];
        $name=$_REQUEST['name'];
        $marks=$_REQUEST['marks'];
        $connect=new PDO("mysql:host=$servername;dbname=mydb",$username);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $run="update stud set name='$name',marks='$marks' where id =$id";
        $res=$connect->prepare($run);
        $res->execute();
        
        $stmt=$connect->prepare("select id,name,marks from stud");
          $stmt->execute();
          $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
          echo "<table border=5 width=80% >";
        foreach($stmt->fetchall() as $key=>$v)
        {
            
            echo "<tr>";
            echo"<td>$v[id]</td>";
            echo"<td>$v[name]</td>";
            echo"<td>$v[marks]</td>";
            echo "</tr>";
        }
  
   }
   catch(PDOException $e)
      {
          echo $run ."<br/>".$e->getmessage();
      }

?>