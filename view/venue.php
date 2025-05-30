<?php 
    // set title
    include('../controller/PageController.php');
    include('../controller/VenueController.php');
    $titleId = $_GET['venue'];
    $venueId = explode(" ", $titleId)[1];
    $pageController = new PageController();
    $venueController = new VenueController();
    $venue = $venueController->getVenue($venueId);
    $title = "Flower City Sound - {$venue['title']}";
    include("../view/include/header.php");
?>
<div class="topContent">
    <h1 class="name"><?php echo $venue['title']; ?></h1>
    <p class="ya">
        <?php 
            if($venue['year_closed'] == null){
                echo "{$venue['year_opened']} - Present";
            } else {
                echo "{$venue['year_opened']} - {$venue['year_closed']}";
            }
             
        ?>
    </p>
    <figure class='img'>
        <?php 
            if($venue['thumbnail_path'] == NULL){
                echo
                "<img src=\"../assets/images/placeholder_img.png\" alt='Venue thumbnail'>
                <figcaption>No image available</figcaption>";
            } else {
                echo
                "<img src='{$venue['thumbnail_path']}' alt='Venue thumbnail'>
                <figcaption>{$venue["thumb_credit"]}</figcaption>";
            }
        ?>
    </figure>
    <div class="side">
        <div>
            <h4>Age Policy:</h4>
            <p><?php echo $venue['age']; ?></p>
        </div>
        <div>
            <h4>Does this venue serve food?</h4>
            <p>
                <?php 
                    if($venue['food'] == 0){
                        echo "No";
                    } else if ($venue['food'] == 1){
                        echo "Yes";
                    }
                ?>
            </p>
        </div>
        <div>
            <h4>Capacity</h4>
            <p><?php echo $venue['capacity']; ?></p>
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
            <p><?php echo $venue['contact']; ?></p>
        </div>
        </div>
        
    </div>
</div>
<div class="bottomContent">
    <div>
        <h2>About <?php echo $venue['title']; ?></h2>
        <p><?php echo $venue['body']; ?></p>
    </div>
    <div class="galleryContainer">
        <h2>Gallery</h2>
        <div class="gallery">
            <?php
                foreach ($pageController->getPhotos($venueId) as $photo){
                    if($photo['cap'] == null){
                        echo
                        "<figure class='img'>
                            <img width='300' src=\"../../images/FCS_Images/{$photo['img_path']}\">
                            <figcaption>{$photo["img_credit"]}</figcaption>
                        </figure>";
                    } else if ($photo['img_credit'] == null){
                        echo
                        "<figure class='img'>
                            <img width='300' src=\"../../images/FCS_Images/{$photo['img_path']}\">
                            <figcaption>{$photo["cap"]}</figcaption>
                        </figure>";
                    } else if ($photo['cap'] == null && $photo['img_credit'] == null){
                        "<figure class='img'>
                            <img width='300' src=\"../../images/FCS_Images/{$photo['img_path']}\">
                        </figure>";
                    } else {
                        echo
                        "<figure class='img'>
                            <img width='300' src=\"../../images/FCS_Images/{$photo['img_path']}\">
                            <figcaption>{$photo["cap"]}: {$photo["img_credit"]}</figcaption>
                        </figure>";
                    }
                }
            ?>
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
