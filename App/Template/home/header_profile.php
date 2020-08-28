<?

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="public/styles.css">
</head>

<header>

    <nav>
        <ul>
            <li >
                <a href="create_offer.php">Create New Shoe</a>
            </li>
            <li class="site-logo">Shoe
            </li>
            <li >
                <a href="index.php">
                    <img src="public/sneakers.png" alt="snimka" />
                </a>
            </li>
            <li class="site-logo">Shelf
            </li>
            <li>
                <p>Welcome, <?= $_SESSION['fullName'] ;?></p>
            <li>
        </ul>

    </nav>
</header>
