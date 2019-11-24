<?php 

    ob_start();

    session_start(); 
?>
<html>
    <head>
        <title>login</title>
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
    
    <?php 
    include('logindata.php');

if(isset($_POST['login']) && !empty($_POST['username']) && !empty('password'))
{
 if($_POST['username']==$usr && $_POST['password']==$pswd)
 {
     $_SESSION["status"]=1;
     
      echo "<script type='text/javascript'>alert('Logged in successfully')</script>";
      
      echo "<script type='text/javascript'>location.href = 'index.php';</script>";
 }
 else echo "<script type='text/javascript'>alert('incorrect credentials !')</script>";

}


?>
    
<div class="header">
  <a href="index.php"><img src="iiitlogo.png" style="width:50px;height:50px;border:0;"></a>
  <h3> &nbsp; &nbsp;Indian Institue of Information Technology Tiruchirappalli, Library</h3>
</div><form action="login.php" method="post">
<br><center><h3>
<?php 
if(isset($_SESSION["status"])) 
{ echo "Logged in, click here to logout ";
  echo "<button type=\"submit\" name=\"logout\"> LOGOUT </button>";
  
  if(isset($_POST["logout"]))
  {
      session_unset();
      session_destroy();
      echo "<script type='text/javascript'>alert('logged out successfully')</script>";
      echo "<script type='text/javascript'>location.href= 'login.php';</script>";
  }
  
}
else echo " Login ";
?>

</h3></center></form>
<br>
<div>
    <form action="login.php" method="post">
    <center>
        <label>username</label> &nbsp; &nbsp;
    <input type="password" name="username" autofocus required >
    <br>
      <label>password</label> &nbsp; &nbsp;
    <input type="password" name="password" required>
    <br><br>
    <button type="submit"  name="login">LOGIN</button>
    </center>
    <br><br>
</form>
</div>


<div class="footer">
    <p>Mayukh Pankaj © <?php echo date("Y"); ?>  </p>
</div>    

</body>
</html>