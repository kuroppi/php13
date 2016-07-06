<?php
// include the functaions script:
require_once('includes/functions.php');
?>

<!DOCTYPE html>
<html>

<head>
   
<!-- Script 13.3 WEBD166 | header.php | Bob Painter -->
      
    <meta charset="UTF-8">
    <title>

        <?php // Output the page title in the browser.
        if (defined('TITLE')) {
            echo TITLE;
            } else {
            echo 'My Site of Quotes';
        } ?>

    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <div id="container">
            <h1><a href="index.php" style="border-bottom: 0;">My Site of Quotes</a></h1>
            <br>
            <hr>
        
<!-- BEGIN CHANGABLE CONTENT -->
