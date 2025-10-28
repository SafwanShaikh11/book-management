session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == '$_GET') {
    $_SESSION['loggedin'] = true;
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php include('header.php'); ?>
<main>
    <h2>Login</h2>
    <form method="POST">
        <input type="submit" value="Log in">
    </form>
</main>
<?php include('footer.php'); ?>
</body>
</html>
