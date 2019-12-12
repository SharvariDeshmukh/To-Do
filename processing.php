<?php
require_once("index.php");
require_once("User.php");
require_once("AddTodo.php");

$task = $_GET["task"];
$priority = $_GET["priorityIn"];
if ($task==""){
}
else{
//$task = $_POST[""];

$usernameLoggedIn= User::isLoggedIn()? $_SESSION["userLoggedIn"] :"" ;

$query=$con->prepare("INSERT INTO tasks(emailid,task,priority)
     VALUES(:emailid,:task,:priority)");
    
$query->bindParam(":emailid", $usernameLoggedIn);
$query->bindParam(":task", $task);
$query->bindParam(":priority", $priority);

$query->execute();
header("Location: index.php");
// add($con,$usernameLoggedIn);
// function add($con,$usernameLoggedIn){
//      $AddTodo = new AddTodo($con,$usernameLoggedIn);
//      return "<ul id='myUL'>
//                <?php $AddTodo->ADD();  </ul>";

// }
}
?>