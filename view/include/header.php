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
                <li><a href="../about.php">About</a></li>
                <li>Artists</li>
                <ul>
                    <li><a href="../artistList_ind.php">Individual</a></li>
                    <li><a href="../artistList_gr.php">Groups</a></li>
                </ul>
                <li><a href="../venuesList.php">Venues</a></li>
            </ul>
        </nav>
        <div id="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <!-- LOGO IMAGE HERE -->
        <p>LOGO[TEMP]</p>
        <!-- SEARCH BAR HERE -->
        <div>
            <input type="text" placeholder="Search..."/>
        </div>
    </div>