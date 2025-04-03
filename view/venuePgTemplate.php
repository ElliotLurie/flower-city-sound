<?php 
    // set title
    include('../controller/VenueController.php');
    $titleId = $_GET['venue'];
    $venueId = explode(" ", $titleId)[1];
    $venueController = new VenueController();
    $venue = $venueController->getVenue($venueId);
    $title = "Flower City Sound - {$venue['title']}";
    include("../view/include/header.php");

?>
<div class="topContent">
    <h1 class="name"><?php echo $venue['title']; ?></h1>
    <p class="ya"><?php echo "{$venue['open']} - {$venue['year']}"; ?></p>
    <figure class="img">
        <img src="../assets/images/placeholder_img.jpg" alt="temp img" width="300px">
        <figcaption>image caption(credits)</figcaption>
    </figure>
    <div class="side">
        <div>
            <h4>Age Policy:</h4>
            <p>All ages</p>
        </div>
        <div>
            <h4>Does this venue serve food?</h4>
            <p>No</p>
        </div>
        <div>
            <h4>Capacity</h4>
            <p>12,428</p>
        </div>
    </div>
    <div class="bottomContainer">
        <div class="bottom">
            <div>
                <h4>Address</h4>
                <p><?php echo $venue['address']; ?></p>
            </div>
            <div>
                <h4>Hours</h4>
                <p>
                    <?php 
                        $hours = str_replace(", ", "<br>", $venue['hours']);
                        echo $hours; 
                    ?>
                </p>
            </div>
            <div>
            <h4>Booking Contact</h4>
            <p>personsname@gmail.com</p>
        </div>
        </div>
        
    </div>
</div>
<div class="bottomContent">
    <div>
        <h2>About <?php echo $venue['title']; ?></h2>
        <p><?php echo $venue['blurb']; ?></p>
    </div>
    <div class="galleryContainer">
        <h2>Gallery</h2>
        <div class="gallery">
            <figure id="img">
            <a target="_blank" href="../assets/images/placeholder_img.jpg"><img src="../assets/images/placeholder_img.jpg" alt="temp img" width="300px"></a>
            <figcaption>image caption(credits)</figcaption>
            </figure>
            <figure id="img">
                <a target="_blank" href="../assets/images/placeholder_img.jpg"><img src="../assets/images/placeholder_img.jpg" alt="temp img" width="300px"></a>
                <figcaption>image caption(credits)</figcaption>
            </figure>
            <figure id="img">
                <a target="_blank" href="../assets/images/placeholder_img.jpg"><img src="../assets/images/placeholder_img.jpg" alt="temp img" width="300px"></a>
                <figcaption>image caption(credits)</figcaption>
            </figure>
        </div>
        
    </div>
    <div class="links">
        <h3>Social Media/Website Links</h3>
        <ul>
            <?php
                $links = explode(", ", $venue['external_links']);
                foreach($links as $l){
                    echo "<li><a href='$l'>$l</a></li>";
                }
            ?>
        </ul>
        <h3>Sources</h3>
        <ul>
            <?php
                $links = explode(", ", $venue['sources']);
                foreach($links as $l){
                    echo "<li><a href='$l'>$l</a></li>";
                }
            ?>
        </ul>
    </div>
    <a href="#header" class="backToTop">Back to top</a>
</div>
<?php include("../view/include/footer.php"); ?>