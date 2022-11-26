<?php
    if(isset($_POST["submitButton"])) {
        echo "Form was submitted";
    }
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
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="submitButton" value="SUBMIT">
                </form>
                <a href="register.php" class="signInMessage">Don't you have an account? Sign Up Here!</a>
            </div>
        </div>
        
    </body>
</html>