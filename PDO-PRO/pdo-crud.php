<?php

$servername='localhost';
$username  ='root';
$password  ='';

      try{
            $connect=new PDO("mysql:host=$servername;dbname=mydb",$username);
            $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // ECHO "connected";

            if(!empty($_GET['submit']))
            {
                $name=$_GET['name'];
                $marks=$_GET['marks'];
                $sql="insert into stud(name,marks)values('$name','$marks')";
                $connect->exec($sql);
                echo "record succesfuly created<br/><br/> ";
            }

            $stmt=$connect->prepare("select id,name,marks from stud");
            $stmt->execute();
            $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
            echo "<table border=5 width=70% >";
            echo "<tr>
            <th>ID</th>
            <th>NAME</th>
            <th>MARKS</th>
            </tr>";
            foreach($stmt->fetchall() as $key=>$v)
            { 
                echo "<tr>
                <th>$v[id]</th>
                <th>$v[name]</th>
                <th>$v[marks]</th>
                </tr>";
            }
    
        }
        catch(PDOException $e)
            {
                echo $sql ."<br/>".$e->getmessage();
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
   <body>
        <form action="" method="get">
            ENTER-NAME   <input type="text" name="name"><br/><br/>
            ENTER-MARKS  <input type="text" name="marks"><br/><br/>
            <input type="submit" name="submit" value="add">
        </form>
        <h1> <U>Crud In PDO</U>(PHP DATA OBJECT)</h1>
  </body>
</html>