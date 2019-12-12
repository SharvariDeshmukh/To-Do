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
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>To-Do</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <script src="script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php echo "Hello ".$userLoggedInObj->getFirstName()." !"; 
          
            $AddTodo = new AddTodo($con,$usernameLoggedIn);
            //onclick="newElement()" 
       
        ?>
        <!-- <div class="main">
            <div class="take">
                    <form>
                        <div id="myDIV" class="header">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Add your task" aria-label="Recipient's username" id="myInput" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button onclick="newElement()" class="btn btn-outline-secondary" type="button" id="button-addon2">ADD</button>
                                </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label id="pri" for="Priority">Choose Priority</label>
                            low<input type="range" class="Priority" min="0" max="100" id="customRange2">high
                        </div>
                    </form>
            </div> -->
                        
            <div id="myDIV" class="header">
            <h2 style="margin:5px">My To Do List</h2>
            <form method="GET" action='processing.php'>
                <input type="text" id="myInput" name="task" placeholder="Your Task">
                <button type="submit" value="submit" class="addBtn" name="addBtn" onclick="newElement()">
                Add
                </button>
            </form>
            </div>
            <div class="column">
                <ul class="list-group" id="myUL">
                    <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                        Wash Dishes
                        <span class="badge badge-primary badge-pill">14 dec</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Bath
                        <span class="badge badge-primary badge-pill">2</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    Code
                        <span class="badge badge-primary badge-pill">1</span>
                    </li> -->
                    <?php
                        echo $AddTodo->ADD();
                    ?>
                </ul>
            </div>
            <script src="script.js"></script>
           
        </div>
    </body>

</html>