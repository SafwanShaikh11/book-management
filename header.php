//some login stuff as I have no idea what the fuck this  is all bout 
//muhehehehe
<header>
    <h1>My Product Store</h1>
    <nav>
        <a href="index.php">Products</a>
        <a href="wishlist.php">Wishlist</a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
            <a href="login.php?action=logout">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </nav>
</header>
