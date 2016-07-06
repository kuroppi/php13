<?php

// Script 13.8 WEBD166 | view_quotes.php | Bob Painter

// This script lists every quote.

// Include the header
define('TITLE', 'View All Quotes');
include('includes/header.php');

print '<h2>All Quotes</h2>';

// Restrict access to administrators only:
if (!is_administrator()) {
    print '<h2>Access Denied!</h2>
           <p class="error">You do not have permission to access this page.</p>';
    include('includes/footer.php');
    exit();
}

// Need the database connection:
include('mysqli_connect.php');

// Define the query:
$query = 'SELECT quote_id, quote, source, favorite FROM quotes ORDER BY date_entered DESC';

// Run the query:
if ($r = mysqli_query($dbc, $query)) {
    
    // Retrieve the returne records:
    while ($row = mysqli_fetch_array($r)) {
        
        // Print record:
        print "<div><blockquote>{$row['quote']}</blockquote>-<span class='source-quote'> {$row['source']}</span>\n";
        
        // Is this a favorite?
        if ($row['favorite'] == 1) {
            print ' <span class="favorite-quote"><strong>Favorite!</strong></span>';
        }
        
        // Add administrative links:
        print "<p><b style='padding-right: 10px;'>Quote Admin:</b> <a href=\"edit_quote.php?id={$row['quote_id']}\"> Edit </a>|<a href=\"delete_quote.php?id={$row['quote_id']}\"> Delete </a></p></div>\n";
    } // End of while loop
} else { // Query didn't run
    print '<p class="error">Could not retrieve the data because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
} // End of query IF.

// Close the connection:
mysqli_close($dbc);

include('includes/footer.php'); ?>




