<?php
    if (isset($_GET['username'])) {
        if (strlen($_GET['username']) < 20) {
            $username = $_GET['username'];
        } else {
            $error = 'Woah! That username is too long!';
        }
    } else { $error = 'No username supplied'; }

    if (isset($_GET['friend'])) {
        if (strlen($_GET['friend']) < 20) {
            $friend = $_GET['friend'];
        } else {
            $error = 'Woah! That friend\'s name is too long!';
        }
    } else { $error = 'No friend\'s name supplied'; }
?>
<html lang="en">
<head><title>Compliment Giver</title></head><body>
<?php
    if (isset($error)) {
        echo '<h1>An error has occurred: ' . $error . '</h1>';
    } else {
        echo '<h1>Welcome ' . $username . '</h1>';
        echo '<p>This is a message from your friend ';
        echo $friend . '</p><p>They wanted to compliment ';
        echo 'you for being amazing!</p>';
    }
?></body></html>