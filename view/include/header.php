<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="../assets/global_styles.css">
</head>
<body>
    <div id="header">
        <nav id="nav">
            <ul>
                <li><a href="../view/about.php">About</a></li>
                <li>Artists</li>
                <ul>
                    <li><a href="../view/artistsList_ind.php">Individual</a></li>
                    <li><a href="../view/artistsList_gr.php">Groups</a></li>
                </ul>
                <li><a href="../view/venuesList.php">Venues</a></li>
            </ul>
        </nav>
        <div id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <!-- LOGO IMAGE HERE -->
        <p><a href="../view/index.php">LOGO[TEMP]</a></p>
        <!-- SEARCH BAR HERE -->
        <div>
            <form action="../view/search.php">
                <input type="text" placeholder="Search..."/>
            </form>
        </div>
    </div>