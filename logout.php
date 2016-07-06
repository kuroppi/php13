<?php

// Script 13.6 WEBD166 | Script 13.6 | Bob Painter

// This is the logout page. It destroys the cookie.
if (isset($_COOKIE['Samuel'])) {
    setcookie('Samuel', FALSE, time()-300);
}

// Define a page title and include the header:
define('TITLE', 'Logout');
include('includes/header.php');

// Print a message:
print "<p>You are now logged out.</p>";

// Include the footer:
include('includes/footer.php');

?>