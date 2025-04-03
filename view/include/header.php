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
        <div id="navCont">
            <a href="../view/index.php" id="logo"><img src="../assets/images/placeholder_img.jpg" width="60px" height="40px"/></a>
            <div id="nav">
                <ul>
                    <li><a href="../view/about.php">About</a></li>
                    <li><a href="../view/artistsList.php">Artists</a></li>
                    <li><a href="../view/venuesList.php">Venues</a></li>
                    <li><a href="../view/addRes.php">Other Resources</a></li>
                </ul>
            </div>
            <div id="hamburger">
                <div class="hamburgerDiv"></div>
                <div class="hamburgerDiv"></div>
                <div class="hamburgerDiv"></div>
            </div>
        </div>
        <!-- SEARCH BAR HERE -->
        <div id="SBContainer">
            <form action="../view/search.php">
                <input id="searchBar" name="filter" type="text" placeholder="Search..."/>
            </form>
        </div>
    </div>
    <div id="mobileNav" style="display:none;">
        <ul>
            <li><a href="../view/index.php">Home</a></li>
            <li><a href="../view/about.php">About</a></li>
            <li><a href="../view/artistsList.php">Artists</a></li>
            <li><a href="../view/venuesList.php">Venues</a></li>
            <li><a href="../view/addRes.php">Additional Resources</a></li>
        </ul>   
    </div>
    <script type="text/javascript" src="../assets/global_script.js"></script>
