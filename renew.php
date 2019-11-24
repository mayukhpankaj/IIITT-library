<?php session_start(); ?>
<html>
    <head>
        <title>
            Renew
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
   
div2 {
    
    margin: 0px 300px 0px;
    
    
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

.footer {
   position: fixed;
   width: 100%;
   bottom: 0;
   background-color: #f1f1f1;
   color: #808080;
   text-align: center;
}


</style>    

<body>
    
    <div class="header">
  <a href="index.php"><img src="iiitlogo.png" style="width:50px;height:50px;border:0;"></a>
  <h3> &nbsp; &nbsp;Indian Institue of Information Technology Tiruchirappalli, Library</h3>
</div>
 
   <hr>
    
   <div>
      
   <form action="renew.php" method="POST">
       <div1>
        <label>Roll no</label>   
        <input type="text" name="query" maxlength="9">
       <input type="submit" value="Search" name="search" ></div1><br>
    <div1><label>bookID </label><input type="text" name="bookno" />
    <input type="submit" value="Renew" name="ren"></div1>
    </form>
   </div>

<div2>
<table><tr><th>sl</th><th>bookid</th><th>bookname</th><th>studroll</th><th>stdname</th><th>regdate</th><th>return date</th><th>days</th><th>fine</th></tr>

 <?php
 
 include('finevariable.php');
 $fine;
 
 if($_SESSION['status'])
{
include('connect.php');
}
else
{ echo "<script type='text/javascript'>alert('you need to login first')</script>";

echo "<script type='text/javascript'>location.href = 'login.php';</script>";
}
 
 

$min_length=9;

if(isset($_POST['search']))
{
   $query = $_POST['query'];

 if(strlen($query) == $min_length)
 {
     $sql = "SELECT bookid, bookname, studname, studroll, reg_date, ret_date, ret FROM reg  WHERE (`studroll` LIKE '%".$query."%') AND ret=0 ";
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
        
      
        
        
         
        echo "<tr><td>".$n."</td><td>".$row["bookid"]."</td><td>". $row["bookname"]. "</td><td>".$row["studroll"]."</td><td>" .$row["studname"]."</td><td>".$row["reg_date"]."</td><td>".$row["ret_date"]."</td><td>".$interval->format('%R%a')."</td><td>".$fine."</td></tr>";
        
        if($row["ret"]==0)
         {
             $ctr++;
             
         }        
       }
       echo "Showing results for".$query."<br>";
       echo "<h4>".$n." books record found <br>".$ctr." books issued not returned !</h4><br>";
    }
   else
     {
    echo "0 results";
     }
}
 
} 
 
 
 
 
if(isset($_POST['ren']))
{
    $book =$_POST['bookno'];
    
    $sql = "UPDATE reg SET reg_date=now() WHERE bookid=$book";

    $result = mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>alert('book renewed!')</script>";

}
 
 
 
?>
</table>
</div2>  


<div class="footer">
    <p>Mayukh Pankaj © <?php echo date("Y"); ?>  </p>
</div>


</body>    
</html>