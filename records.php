<!DOCTYPE html>
<html>
<head>
    <title>record</title>
    <style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 10px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 10px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 10px;
  border-radius: 4px;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}


  
}
</style>
<style>
 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
 td,  th {
  border: 1px solid #ddd;
  padding: 8px;
}

 tr:{background-color: #f2f2f2;}

 tr:hover {background-color: #f2f2f2;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #f2f2f2;
 
}

.footer {
   position: fixed;
   width: 100%;
   bottom: 0;
   background-color: #f1f1f1;
   color: #808080;
   text-align: center;
}

</style>
</head>
<body>

<div class="header">
  <a href="index.php"><img src="iiitlogo.png" style="width:50px;height:50px;border:0;"></a>
  <h3> &nbsp; &nbsp;Indian Institue of Information Technology Tiruchirappalli, Library</h3>
</div>

<center>
    <a href="recordsasc.php">ascending</a> &nbsp; &nbsp; <a href="booksout.php">books issued</a> &nbsp; &nbsp; <a href="booksreturned.php">books returned</a>
</center>



<center>
<?php

include('finevariable.php');

include('connect.php');

$fine;

$sql = "SELECT * FROM `reg` order by id desc";

$result = mysqli_query($conn, $sql);




echo "<table><tr> <th>sno.</th> <th>bookid</th><th>bookname</th><th>author</th><th>roll no</th> <th>student name</th><th>issued date</th><th>returned date</th><th>days</th><th>fine ₹</th></tr>";

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        if($row["ret"]==0)
        {
        // code to find difference between REG date & current date.
        // books in circulation
        
        $datetime1=date_create($row["reg_date"]);
        $datetime2=date_create(date("Y-m-d"));
        
        $interval = date_diff($datetime1, $datetime2);
        
        if($interval->format('%R%a')>$mday)
        {
          $fine=$interval->format('%R%a')*$rate-$mday*$rate;
        }
        
        else 
         $fine=0;
        }
        
        if($row["ret"]==1){
         // code to find difference between REG date & RET date.
        // books in circulation
        
        $datetime1=date_create($row["reg_date"]);
        $datetime2=date_create($row["ret_date"]);
        
        $interval = date_diff($datetime1, $datetime2);
        
          if($interval->format('%R%a')>$mday)
        {
          $fine=$interval->format('%R%a')*$rate-$mday*$rate;
        }
        
        else 
         $fine=0;
        }
        
        
        
        
        echo "<tr><td>". $row["id"] ."</td><td>".$row["bookid"]."</td><td>". $row["bookname"]. "</td><td>".$row["author"]."</td><td>".$row["studroll"]."</td><td>".$row["studname"]."</td><td>".$row["reg_date"]."</td><td>".$row["ret_date"]."</td><td>".$interval->format('%R%a')."</td><td>₹ ".$fine."</td></tr>";
    
        
    }



mysqli_close($conn);

?>
</center>

<div class="footer">
    <p>Mayukh Pankaj © <?php echo date("Y"); ?>  </p>
</div>

</body>
</html>