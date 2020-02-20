<?php
session_start();
include_once('header.php');
include_once('functions.php');
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Microblogging Application</title>
</head>
<body>
 
<?php
if (isset($_SESSION['message'])){
    echo "<b>". $_SESSION['message']."</b>";
    unset($_SESSION['message']);
}
?>
<form method='post' action='add.php'>
<p>Your status:</p>
<textarea name='content' rows='5' cols='40' wrap=VIRTUAL></textarea>
<p><input type='submit' value='submit'/></p>
</form>
 <?php
$posts = show_posts($_SESSION['userid']);
 
if (count($posts)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php
foreach ($posts as $key => $list){
    echo "<tr valign='top'>\n";
    echo "<td>".$list['id_user'] ."</td>\n";
    echo "<td>".$list['content'] ."<br/>\n";
    echo "<small>".$list['created_date'] ."</small></td>\n";
    echo "</tr>\n";
}
?>
</table>
<?php
}else{
?>
<p><b>You haven't posted anything yet!</b></p>
<?php
}
?>
</body>
</html>