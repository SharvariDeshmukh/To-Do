<?php 
require_once("config.php");
require_once("User.php");
require_once("AddTodo.php");
$usernameLoggedIn= User::isLoggedIn()? $_SESSION["userLoggedIn"] :"" ;
$userLoggedInObj = new User($con, $usernameLoggedIn);
if ($usernameLoggedIn==""){
  header("Location: signin.php");
  exit();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>To-Do</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <script src="script.js"></script>
        <script src="https://kit.fontawesome.com/a67a45e4c2.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</head>
<body>
  
  <div class="greet">
        <?php echo "Hello ".$userLoggedInObj->getFirstName()." !"; 
            $AddTodo = new AddTodo($con,$usernameLoggedIn);
            //onclick="newElement()" 
        ?>
        <a href="logout.php">
          <i id="logout" class="fas fa-power-off"></i>
        </a>
  </div>

<div id="myDIV" class="take">
  
<div class="input-group mb-3">
  <form method="GET" action='processing.php'>
    <input class="form-control" type="text" id="myInput" name="task" autocompelete="off" placeholder="Your Task">
    Choose Priority<br>
    <!--position : absolute-->
    <h5 style="padding-top : 15px; display : inline-flex; position : absolute ;left :20px; " >low</h3>
    <div class="form-group" style =" padding-left : 30px;display : inline-fex; position : relative">
      <input type="range"  name = "priorityIn" style="display : inline" class="Priority" min="0" max="100" id="customRange2" >
    </div>
    <!-- style="offset: 10%;display : inline-flex; position : absolute ;" -->
    <h5 style=" display : inline">high</h3>
    
    <button style="display :inline; position :absolute;" type="submit" value="submit" class="addBtn" name="addBtn" onclick="newElement()" >
    <i id="add" class="fas fa-plus-circle" data-toggle="tooltip" data-placement="left" title="Click to add a todo"></i>
    </button>
  </form>
</div>
</div>


<div class="column">
<ul id="myUL" class="list-group">
    <?php
      echo $AddTodo->ADD();
      
    ?>    
</ul> 
</div>

<script src="script.js"></script>
</body>
</html>