<?php

    require_once("includes/config.php");
    require_once("includes/classes/FormSanitizer.php");
    require_once("includes/classes/Constants.php");
    require_once("includes/classes/Account.php");

    $account = new Account($con);

    if(isset($_POST["submitButton"])) {
        // $firstName = sanitizeFormString($_POST["firstName"]); -> as function
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);

    }

// function as class
    // function sanitizeFormString($inputText) {
    //     $inputText = strip_tags($inputText);
    //     $inputText = str_replace(" ","", $inputText);
    //     $inputText = strtolower($inputText);
    //     $inputText = ucfirst($inputText);
    //     return $inputText;
    // }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Zephflix</title>
        <link rel="stylesheet" href="assets/style/style.css">
    </head>
    <body>
        
        <div class="signInContainer">
            <div class="column">
                <div class="header">
                    <img src="assets/images/logo.png" title="Logo" alt="Site Logo" width="100px" height="50px">
                    <h3>Sign Up</h3>
                    <span>to continue to Zephflix</span>                    
                </div>
                <form method="POST">

                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameCharacters); ?>
                    <?php echo $account->getError(Constants::$usernameTaken); ?>
                    <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                    <?php echo $account->getError(Constants::$emailInvalid); ?>
                    <?php echo $account->getError(Constants::$emailTaken); ?>
                    <?php echo $account->getError(Constants::$passwordsDontMatch); ?>
                    <?php echo $account->getError(Constants::$passwordLength); ?>

                    <input type="text" name="firstName" placeholder="First Name" required>
                    <input type="text" name="lastName" placeholder="Last Name" required>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="email" name="email2" placeholder="Confirm Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password2" placeholder="Confirm Password" required>
                    <input type="submit" name="submitButton" value="SUBMIT">
                </form>
                <a href="login.php" class="signInMessage">Already have an account? Sign In Here!</a>
            </div>
        </div>
    </body>
</html>