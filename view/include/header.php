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
        <div id="nav">
            <ul>
                <li><a href="../view/about.php">About</a></li>
                <li><a href="../view/artistsList.php">Artists</a></li>
                <li><a href="../view/venuesList.php">Venues</a></li>
            </ul>
        </div>
        <div id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <!-- LOGO IMAGE HERE -->
        <p id="logo"><a href="../view/index.php">LOGO[TEMP]</a></p>
        <!-- SEARCH BAR HERE -->
        <div id="SBContainer">
            <form action="../view/search.php">
                <input id="searchBar" type="text" placeholder="Search..."/>
            </form>
        </div>
    </div>