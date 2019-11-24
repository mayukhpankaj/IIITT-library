<?php session_start(); ?>
<html>
    <head>
        <title>
            search
        </title>
    </head>

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
input[type=text], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}



div {
  border-radius: 10px;
  background-color: #f2f2f2;
  padding: 20px;
}

div1 {
 
  margin: 0px 120px 0px;
  
   }
   
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
  
     hr { 
  margin-top: 0px;
  margin-bottom: 0px;
}
 

</style>    

<body>
    
 
 <div class="header">
  <a href="index.php"><img src="iiitlogo.png" style="width:50px;height:50px;border:0;"></a>
  <h3> &nbsp; &nbsp;Indian Institue of Information Technology Tiruchirappalli, Library</h3>
</div>

  <hr>
    
    
   <div>
      
   <form action="searchbook.php" method="POST">
       <div1>
        <label>book name</label>
        <input type="text" name="query"  required />
        <input type="submit" value="Search" name="srch"></div1>
    </form>
    
      <br> 
    <div1>
    search by: <a href="searchstudname.php">student name</a> &nbsp; <a href="search.php">student roll</a> &nbsp; <a href="searchbookid.php">book id</a>
    </div1>
    
    
   </div>

<div1>
<table><tr><th>sl</th><th>bookid</th><th>bookname</th><th>studroll</th><th>stdname</th><th>issued date</th><th>return date</th><th>days</th><th>fine</th></tr>
</div1>
<div1>
<?php
 
if($_SESSION['status'])
{
include('connect.php');
}
else
{ echo "<script type='text/javascript'>alert('you need to login first')</script>";

echo "<script type='text/javascript'>location.href = 'login.php';</script>";
}

include('finevariable.php');
 $fine;
 
 
 
 
 if(isset($_POST['srch']))
 {
 $query = $_POST['query'];
 
 
 {
     $sql = "SELECT bookid, bookname, studname, studroll, reg_date, ret_date, ret FROM reg  WHERE (`bookname` LIKE '%".$query."%')";
$result = mysqli_query($conn, $sql);

$ctr=0;
$n=0;

  if (mysqli_num_rows($result) > 0)
    {
    
    while($row = mysqli_fetch_assoc($result)) 
      {
        $n++;  
        
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
        
        
        
        
        
        
         
        echo "<tr><td>".$n."</td><td>".$row["bookid"]."</td><td>". $row["bookname"]. "</td><td>".$row["studroll"]."</td><td>" .$row["studname"]."</td><td>".$row["reg_date"]."</td><td>".$row["ret_date"]."</td><td>".$interval->format('%R%a')."</td><td>".$fine."</td></tr>";
          
         if($row["ret"]==0)
         {
             $ctr++;
             
         }    
          
      }
       $nr=$n-$ctr;
       echo "<br><h4>  &nbsp; &nbsp;".$n." records found for".$query."</h4><br>";
    }
   else
     {
    echo "<br><h4>&nbsp; 0 results found for ".$query." </h4>";
     }
}
 
 
 }
 
  mysqli_close($conn);
?>

</table>
</div1>    
</body>    
</html>