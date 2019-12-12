<?php
class AddTodo{
    public function  __construct($con, $usernameLoggedIn){
        $this->con=$con;
        $this->usernameLoggedIn = $usernameLoggedIn;
    }

    
    public function ADD(){
        $query = $this->con->prepare("SELECT * FROM tasks WHERE emailid=:emailid ORDER BY date ASC");
        $query ->bindParam (":emailid", $this->usernameLoggedIn);
        $query->execute();
        $tmp="";
        $tasks = array();
        $toret="";
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            array_push($tasks , $row);
           
        }
        
        if($tasks == null){
            echo "<h1 id='noTODO'>Nothing left ToDo <i style='font-size:48px;color:#787fed'class='far fa-smile-beam'></i></h1>";
        }
        // else{
        //     foreach($tasks as $task){
        //         foreach($task as $key => $val){
        //             if($key=="task"){
        //                 $toret = $toret."<li>".$val."</li>";
        //             }
        //         }

        //     }
        //     return $toret;
           
        //     }
        
        else{
            
            foreach($tasks as $task){
                $color="yellow";
                $fcolor="white";
                // class='list-group-item d-flex justify-content-between align-items-center'
                foreach($task as $key => $val){
                  
                    if($key=="task"){
                        $toret = $toret."<li class='list-group-item d-flex justify-content-between align-items-center'>$val 
                        <form method='GET' action ='delTask.php'>
                                <input type='hidden' name='taskDELETE' value='$val'>
                                <input type='hidden' name='emailDELETE' value='$this->usernameLoggedIn'>
                                <button type='submit' class='close' value='submit' onclick='delItem()' name='closebtn'>
                                    <i class='fas fa-times'></i>
                                </button>                    
                        </form>
                        ";}
                        if($key=="priority"){
                            if($val>=90 AND $val<=100){
                                $color ="red";
                            }
                            elseif($val>=70 AND $val<90){
                                $color ="lightsalmon";
                                $fcolor="black";
                            }
                            elseif($val>=40 AND $val<70){
                                $color ="yellow";
                                $fcolor="black";
                            }elseif($val>=0 AND $val<40){
                                $color ="lightgreen";
                                 $fcolor="black";
                            }
                            
                        }
                        if($key=="date"){
                            
                            $val=date("D, d M -h : i a", strtotime($val));
                            $toret = $toret."<span style='padding: 2px;color:$fcolor ;background-color : $color' class='badge badge-primary badge-pill'>$val</span>
                            </li>";
                        }
                    
                }
            }
           
        

    }
    return $toret;
}
}
?>