<!-- END CHANGABLE CONTENT -->

<!-- Script 13.4 WEBD166 | footer_inc.php | Bob Painter -->

<?php
   
// Display general admin links
// - if the user is an administrator and it's not the logout.php page
// - or if the $loggedin variable is true (ie, the user just logged in)
    
if ( (is_administrator() && (basename($_SERVER['PHP_SELF']) != 'logout.php') ) OR (isset($loggedin) && $loggedin) ) {
    
    // Create the links
    print '
          <hr>
          <nav class="nav">
            <h3>Site Admin</h3>
            <p>
                <span><a href="add_quote.php">Add Quote</a></span>|
                <span><a href="view_quotes.php">View All Quotes</a></span>|
                <span><a href="logout.php">Logout</a></span>
            </p>
          </nav>';
}

?>
       
        <div id="footer">
            <p>&copy;
            <?php
                $startYear = 2014;
                $thisYear = date('Y');
                if ($startYear == $thisYear) {
                    print $startYear . ' ';
                } else {
                    print "$startYear &#8211; $thisYear";
                }
            ?>
                    &#124; Bob Painter</p>
        </div> <!-- footer -->
    </div> <!-- container -->
    
    </main>
</body>
</html>