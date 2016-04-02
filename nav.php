   <ul id="nav">
        <?php
       
        if ($path_parts['filename'] == "index") {
            print '<li class="activePage">Home</li>';
        } else {
            print '<li><a href="index.php">Home</a></li>';
        }
        
        if ($path_parts['filename'] == "matches") {
            print '<li class="activePage">Matches</li>';
        } else {
            print '<li><a href="history.php">Matches</a></li>';
        }

        if ($path_parts['filename'] == "account") {
            print '<li class="activePage">Account</li>';
        } else {
            print '<li><a href="author.php">Account</a></li>';
        }       
        
            
        ?>
    </ul>