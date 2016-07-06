<?php

// Script 13.10 WEBD166 | delete_quote.php | Bob Painter
// This script deletes a quote.

// Define a page title and include the header:
define('TITLE', 'Add a Quote');
include('includes/header.php');

print '<h2>Add a Quotation</h2>';

// Restrict access to administrators only:
if (!is_administrator()) {
    print '<h2>Access Denied!</h2>
           <p class="error">You do not have permission to access this page.</p>';
    include('includes/footer.html');
    exit();
}

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( !empty($_POST['quote']) && !empty($_POST['source']) ) {

        // Need the database connection:
        include('mysqli_connect.php');

        // Prepare the values for storing:
        $quote = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['quote'])) );
        $source = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['source'])) );

        // Create the "favorite" value:
        if (isset($_POST['favorite'])) {
            $favorite = 1;
        } else {
            $favorite = 0;
        }

        $query = "INSERT INTO quotes(quote, source, favorite) VALUES('$quote', '$source', '$favorite')";
        $r = mysqli_query($dbc, $query);

        if (mysqli_affected_rows($dbc) ==1) { // Print a message:
        print '<p>Your quotation has been stored.</p>';
        } else {
        print '<p class="error">Could not store the quote because:<br>' . mysqli_error($dbc) . '.</ p><p>The query being run was: ' . $query . '</p>';

         }

        // Close the connection:
         mysqli_close($dbc);

        } else { // Failed to enter a quotation.
        print '<p class="error">Please enter a quotation and a source!</p>';
        }

} // End of submitted IF.

// Leave PHP and display the form:
?>

    <form action="add_quote.php" method="post">
        <p><textarea name="quote" rows="5" cols="30" placeholder="Quote"></textarea></p>
        <p><input type="text" name="source" placeholder="Source"></p>
        <p><input type="checkbox" name="favorite" value="yes"><span class="favorite">Is this a favorite?</span></p>
        <p><input type="submit" name="submit" value="Add This Quote!"></p>
    </form>

    <?php include('includes/footer.php');
