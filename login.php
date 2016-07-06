<?php

// Script 13.5 WEBD166 | login.php | Bob Painter

// Set two variables with default values:
$loggedin = false;
$error = false;

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Handle the form:
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        if ( (strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'testpass') ) {
            
            // Correct - create the cookie:
            setcookie('Samuel', 'Clemens', time()+3600);
            
            // Indicate they are logged in:
            $loggedin = true;
        } else {
            $error = 'The submitted email address and password do not match those on file!';
        }
        
    } else {
        
        $error = 'Please make sure you enter both an email address and a password!';
    }
}

// Set the page title and include the header file:
define('TITLE', 'Login');
include('includes/header.php');

// Print an error if one exists:
if ($error) {
    print '<p class="error">' . $error . '</p>';
}

// Indicate the user is logged in, or show the form:
if ($loggedin) {
    print '<p>You are now logged in!</p>';
} else {
    print '<h2>Login Form</h2>
           <form action="login.php" method="post">
           <p><label>Email Address <input type="email" name="email"></label></p>
           <p><label>Password <input type="password" name="password"></label></p>
           <p><input type="submit" name="submit" value="Log in!"></p>
           </form>';
}

// Include the footer:
include ('includes/footer.php');

?>
