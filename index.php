<html>
    <head>
        <title>home</title>
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


hr { 
  margin-top: 0px;
  margin-bottom: 0px;
     }
     
.container {
  position: relative;
  text-align: center;
  color: white;
}

.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

.footer {
   position: fixed;
   bottom: 0;
   width: 100%;
   background-color: #f1f1f1;
   color: #5c5c3d;
   text-align: center;
}


</style>
<body>
    
    
     <div class="header">
  <a href="index.php"><img src="iiitlogo.png" style="width:50px;height:50px;border:0;"></a>
  <h3> &nbsp; &nbsp;Indian Institue of Information Technology Tiruchirappalli, Library</h3>
</div>


<div class="container">
    <center>
<div style="height:500px;border:0;">
  <img class="mySlides" src="/images/1.jpg" style="width:100%">
  <img class="mySlides" src="/images/2.jpg" style="width:100%">
  <img class="mySlides" src="/images/5.jpg" style="width:100%">
  
  <div class="top-left"><br><center>
  <a href="addbook.php" alt="Issue book" target="_blank"><img src="/images/issue.png" alt="Issue book" style="width:100px;height:100px;"></a>
  &nbsp; &nbsp;
  <a href="return.php" target="_blank"><img src="/images/return.png" alt="Return book" style="width:100px;height:120px;"></a>
    &nbsp; &nbsp;
  <a href="renew.php" target="_blank"><img src="/images/renew.png" alt="Return book" style="width:100px;height:100px;"></a>
    &nbsp; &nbsp;
  <a href="search.php" target="_blank"><img src="/images/search.png" alt="Search" style="width:100px;height:110px;"></a>
    &nbsp; &nbsp;
  <a href="records.php" target="_blank"><img src="/images/record.png" alt="records" style="width:100px;height:100px;"></a>
    &nbsp; &nbsp;
  <a href="login.php" alt="login" ><img src="/images/login.png" alt="login" style="width:100px;height:100px;"></a>
    &nbsp; &nbsp;
  <a href="about.php" target="_blank" ><img src="/images/about.png" alt="about" style="width:100px; height:100px;">
  </center>
  </div>

  
</div>
</center>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000); // Change image every 2 seconds
}
</script>
    
    
<div class="footer">
  <p>Mayukh Pankaj © <?php echo date("Y"); ?> </p>
</div>
    
</body>
