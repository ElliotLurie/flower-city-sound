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
        <p>
            Flower City Sound is a centralized archive of musicians and venues around Rochester. 
            It’s an open source and crowd sourced website that allows the community to help 
            maintain and grow Rochester’s local music scene. Flower City Sound also acts as an 
            informational hub to learn how to get involved in upcoming events.
            <br>Join us in preserving and amplifying the music of the Flower City! We invite 
            you to contribute to our archive and come learn about the well known and indie music
             spaces as well as underground, hidden gems. 
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
<div id="FVContainer">
    <h2>Featured Venues</h2>
    <div id="featuredVenues">
        <figure>
            <img src="../assets/images/placeholder_img.jpg" alt="Venue One Img">
            <figcaption>Venue One</figcaption>
        </figure>
        <figure>
            <img src="../assets/images/placeholder_img.jpg" alt="Venue Two Img">
            <figcaption>Venue Two</figcaption>
        </figure>
        <figure>
            <img src="../assets/images/placeholder_img.jpg" alt="Venue Three Img">
            <figcaption>Venue Three</figcaption>
        </figure>
    </div>
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
