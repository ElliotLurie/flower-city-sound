<?php 
    // set title
    $title = "Flower City Sound - Home";
    include("../view/include/header.php");
    // controller(s)
    include("../controller/ArtistController.php");
    $artistController = new ArtistController();
?>
<div class="top" id="topHome">
    <!-- <h1>
        <?php
            // test retrieve from db
            // echo $artistController->getTestName();
        ?>
    </h1> -->
    <div id="topTxt">
        <div onclick="txtChange();">
            <h1>Flower City </h1>
            <h1 id="txtChange">Sound</h1>
        </div>
        <h3><a href="../view/artistPgTemplate.php" style="color: white;">artist template page</a></h3>
        <p>
            PLACEHOLDER TEXT -- Lorem ipsum dolor sit amet, 
            consectetur adipiscing elit, sed do eiusmod tempor 
            incididunt ut labore et dolore magna aliqua. Ut 
            enim ad minim veniam, quis nostrud exercitation 
            ullamco laboris nisi ut aliquip ex ea commodo 
            consequat. Duis aute irure dolor in reprehenderit 
            in voluptate velit esse cillum dolore eu fugiat 
            nulla pariatur. Excepteur sint occaecat cupidatat 
            non proident, sunt in culpa qui officia deserunt 
            mollit anim id est laborum.
        </p>
    </div>
    
</div>
<!-- Featured Artists -->
<div id="FBackground"></div>
<div id="featured">
    <figure>
        <img src="../assets/images/placeholder_img.jpg" alt="Band One Img">
        <figcaption>Band One</figcaption>
    </figure>
    <figure>
        <img src="../assets/images/placeholder_img.jpg" alt="Band Two Img">
        <figcaption>Band Two</figcaption>
    </figure>
    <figure>
        <img src="../assets/images/placeholder_img.jpg" alt="Band Three Img">
        <figcaption>Band Three</figcaption>
    </figure>
</div>

<hr>
<!-- Upcoming Events -->
<div id="UEContainer">
    <h2>Upcoming Events</h2>
    <div id="upcomingEvents">
        <figure>
            <img src="../assets/images/placeholder_img.jpg" alt="Event One Img">
            <figcaption>Event One</figcaption>
            <p>04/14/2025</p>
        </figure>
        <figure>
            <img src="../assets/images/placeholder_img.jpg" alt="Event Two Img">
            <figcaption>Event Two</figcaption>
            <p>05/18/2025</p>
        </figure>
        <figure>
            <img src="../assets/images/placeholder_img.jpg" alt="Event Three Img">
            <figcaption>Event Three</figcaption>
            <p>06/25/2025</p>
        </figure>
    </div>
</div>
<?php include("../view/include/footer.php") ?>
