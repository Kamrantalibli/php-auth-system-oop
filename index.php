<?php
    require_once 'core/init.php';

    if(Session::exists('home')) {
        echo '<p>' . Session::flash('home') . '</p>';
    }

    $user = new User();
    if($user->isLoggedIn()) {
    ?>
    <p>Hello <a href="#"><?php echo escape($user->data()->username); ?></a>!</p>

    <ul>
        <li><a href="logout.php">Log out</a></li>
        <li><a href="update.php">Update Details</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
    </ul>

<?php 

    if($user->hasPermission('admin')) {
        echo '<p>You are an administrator!</p>';
    }

    } else {
        echo '<p>You need to <a href="login.php">Log in</a> or <a href="register.php">Register</a></p>';
    }
?>
