<?php 
require_once("config.php");

require_once("Account.php");
require_once("Constants.php");

require_once("FormSanitizer.php");

$account= new Account($con);


if(isset($_POST["submitButton"])){
    $firstName=FormSanitizer::sanitizeFormString($_POST["firstName"]);
   
    
    $username=FormSanitizer::sanitizeFormUsername($_POST["username"]);
    
    $email=FormSanitizer::sanitizeFormEmail($_POST["email"]);
    $email2=FormSanitizer::sanitizeFormEmail($_POST["email2"]);

    $password=FormSanitizer::sanitizeFormPassword($_POST["password"]);
    $password2=FormSanitizer::sanitizeFormPassword($_POST["password2"]);
    
    $wasSuccessful=$account->register($firstName,$username,$email,$email2,$password,$password2);

    if($wasSuccessful){
        //redirect user to index page
        $_SESSION["userLoggedIn"] = $username;
        header("Location: index.php");
        
    }

    else{
      
    }

}



function getInputValue($Name){
    if(isset($_POST[$Name])){
        echo $_POST[$Name];
    }
    
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="signStyle.css">
    <script src="https://kit.fontawesome.com/a67a45e4c2.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

    <div class="signInContainer">
        <div class="column">
            <div class="header">
            <i id="logo" class="fas fa-check-circle"></i>
                <h3>Sign Up</h3>
                <span> To continue to StudyTube</span>
            </div>

            <div class="logInForm">
                <form action="signUp.php" method="POST">
                    <?php   echo $account->getError(Constants::$firstNameCharacters); ?>
                    <input type="text" name="firstName" placeholder="First Name" value="<?php getInputValue('firstName')?>" autocomplete="off" required>
                    
                   
                    
                    <?php   echo $account->getError(Constants::$emailsDoNotMatch); ?>
                    <?php   echo $account->getError(Constants::$emailInvalid); ?>
                    <?php   echo $account->getError(Constants::$emailTaken); ?>
                    <input type="email" name="email" placeholder="Email" value="<?php getInputValue('email')?>" autocomplete="off" required>
                    <input type="email" name="email2" placeholder="Confirm Email" value="<?php getInputValue('email2')?>" autocomplete="off" required>
                    
                    <?php   echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php   echo $account->getError(Constants::$usernameTaken); ?>
                    <input type="text" name="username" placeholder="Username" value="<?php getInputValue('username')?>" autocomplete="off" required>

                    <?php   echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                    <?php   echo $account->getError(Constants::$passwordIsNotAlphaNumeric); ?>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                    <input type="password" name="password2" placeholder="Confirm password" autocomplete="off" required>
                    
                    <input type="submit" name="submitButton" value="Submit">
                </form>

            </div>

            <a class="signInMessage" href="signin.php">Already have an account?Sign in here!</a>
        </div>
    </div>



</body>
</html>