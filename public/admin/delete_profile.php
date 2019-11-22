<?php require_once('../../includes/initialize.php'); ?>
<?php

$user = new User();
$user = $user->find_by_id($_SESSION['user_id']);
$user = $user->delete();

if ($user) {
    $_SESSION['messages'] = "Your profile has been deleted. Come back soon!";
    redirect_to('logout.php');
} else {
    $_SESSION['login_errors'] = "Whoops, looks like we couldn't delete you";
}

?>