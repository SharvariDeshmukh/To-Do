<?php
require_once("index.php");

if(!isset($_GET["closebtn"])){
    echo "No file sent to page.";
    
}
else{
        $task = $_GET['taskDELETE'];
        $emailid = $_GET['emailDELETE'];


        $query = $con->prepare("DELETE  FROM tasks WHERE emailid=:emailid AND task=:task ;");
                $query ->bindParam (":emailid", $emailid);
                $query ->bindParam (":task", $task);
        if($task==""){}
        else{
           $query->execute(); 
           header("Location: index.php");
           return;     
            }
    }
?>