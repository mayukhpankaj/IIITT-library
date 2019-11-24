<?php session_start(); ?>
<html>
    <head>
        <title>about</title>
    </head>
    
<style>

* {box-sizing: border-box;}

body { 
  margin: 0;

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


hr { 
  margin-top: 0px;
  margin-bottom: 0px;
     }
     
     p.monospace {margin-left: 1em;
  font-family: "courier new";
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

<br>

<form action="backup.php" method="POST">
    <button tupe="submit" name="bkp" >backup</button>
    
</form>

<?php 

if($_SESSION['status'])
{
include('connect.php');
}
else
{ echo "<script type='text/javascript'>alert('you need to login first')</script>";

echo "<script type='text/javascript'>location.href = 'login.php';</script>";
}


if(isset($_POST['bkp']))
{
  $table_name = "reg";
   $backup_file  = "/tmp/records.sql";
   $sql = "SELECT * INTO OUTFILE".$backup_file."FROM".$table_name;
   
   
   mysqli_select_db($conn,"id11243761_lib");
   $retval = mysqli_query($conn,$sql);
   
   if(! $retval ) {
      die('Could not take data backup: ' .  mysqli_connect_error());
   }
   
   echo "Backedup  data successfully\n";
   
   mysql_close($conn);
}





    
?>    
    
    
<div class="footer">
    <p>Mayukh Pankaj © <?php echo date("Y"); ?>  </p>
</div>    
    
    
    
</body>
</html>