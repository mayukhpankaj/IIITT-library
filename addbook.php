<?php session_start(); ?>
<html>
<head>
    <title>addbook</title>
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
   
   
   hr { 
  margin-top: 0px;
  margin-bottom: 0px;
}
 .footer {
  
   bottom: 0;
   width: 100%;
   background-color: #909090;
   color: #000000;
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
    
<form action="addbook.php" method="post"> 
<div1><label >book id *</label></div1></div1><center>
<div1><input type="text" name="bookid" ></div1><br/></center>

<div1><label >bookname</label></div1><center>
<input type="text" name="bookname" ><br/></center>

<div1><label >author name</label></div1><center>
<input type="text" name="author" ><br/></center>

<div1><label>student roll *</label></div1>

<form action="addbook.php" method="post" >
<button type="submit" name="check" >check</button>
<center><input type="text" name="studroll" maxlength="9" required></center> 
</form>

<br>
<div1><label >student name</label></div1><center>
<input type="text" name="studname" required ></center><br>


<br>
<center><button type="submit" name="save">ISSUE</button></center>

</form>
* fields mandatory.<br>

<?php 
 include('finevariable.php');
 echo "books are issued for ".$mday."days. Late fine Rs".$rate." per day";
?>

<?php


if($_SESSION['status'])
{
include('connect.php');
}
else
{ echo "<script type='text/javascript'>alert('you need to login first')</script>";

echo "<script type='text/javascript'>location.href = 'login.php';</script>";
}

 if(isset($_POST['save']))
{
    $roll = $_POST['studroll'];
    $min_length=9;
    
    if(strlen($roll) == $min_length)
    {
    $sql = "INSERT INTO reg (bookid, bookname, studroll, studname, author, ret)
    VALUES ('".$_POST["bookid"]."','".$_POST["bookname"]."','".strtoupper($_POST["studroll"])."','".strtolower($_POST["studname"])."','".$_POST["author"]."',0)";

    $result = mysqli_query($conn,$sql);
    
     echo "<script type='text/javascript'>alert('".$_POST["bookname"]." issued to ".$_POST["studname"]."')</script>";
    }
    
    else echo "<script type='text/javascript'>alert('minimum length for student roll is ".$min_length." example ECE19U015')</script>";
}



 if(isset($_POST['check']))
 {
 $sql1 = "SELECT   studroll, ret FROM reg  WHERE (`studroll` LIKE '%".$_POST["studroll"]."%')";
$result1 = mysqli_query($conn, $sql1);

$ctr=0;

 
    
    
    while($row = mysqli_fetch_assoc($result1)) 
      { 
          if($row["ret"]==0)
          { 
              $ctr++;
          }
      }
    
     echo "<script type='text/javascript'>alert('$ctr')</script>";
 }
?>


</div>

<div class="footer">
    <p>Mayukh Pankaj © <?php echo date("Y"); ?>  </p>
    
</div>


</body>
</html>