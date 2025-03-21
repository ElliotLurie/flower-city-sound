<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="../assets/global_styles.css">
</head>
<body>
    <script type="text/javascript" src="../assets/global_script.js"></script>
    <div id="header">
        <div id="nav">
            <ul>
                <li><a href="../view/about.php">About</a></li>
                <li><a href="../view/artistsList.php">Artists</a></li>
                <li><a href="../view/venuesList.php">Venues</a></li>
            </ul>
        </div>
        <div id="hamburger" onclick="mobileNav()">
            <div class="hamburgerDiv"></div>
            <div class="hamburgerDiv"></div>
            <div class="hamburgerDiv"></div>
        </div>
        <!-- LOGO IMAGE HERE -->
        <a href="../view/index.php" id="logo"><img src="../assets/images/placeholder_img.jpg" width="60px" height="40px"/></a>
        <!-- SEARCH BAR HERE -->
        <div id="SBContainer">
            <form action="../view/search.php">
                <input id="searchBar" type="text" placeholder="Search..."/>
            </form>
        </div>
    </div>
    <div id="mobileNav" style="display:none;">
        <ul>
            <li><a href="../view/index.php">Home</a></li>
            <li><a href="../view/about.php">About</a></li>
            <li><a href="../view/artistsList.php">Artists</a></li>
            <li><a href="../view/venuesList.php">Venues</a></li>
        </ul>
    </div>