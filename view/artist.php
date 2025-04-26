<?php 
    // set title
    include('../controller/PageController.php');
    include('../controller/ArtistController.php');
    $titleId = $_GET['artist'];
    $artistId = explode(" ", $titleId)[1];
    $pageController = new PageController();
    $artistController = new ArtistController();
    $artist = $artistController->getArtist($artistId);
    $title = "Flower City Sound - {$artist['title']}";
    include("../view/include/header.php");
?>
<div class="topContent">
    <h1 class="name"><?php echo $artist['title']; ?></h1>
    <p class="ya">
        <?php 
            if($artist['year_disbanded'] == null){
                echo "{$artist['year_founded']} - Present";
            } else {
                echo "{$artist['year_founded']} - {$artist['year_disbanded']}";
            }
             
        ?>
    </p>
    <figure class='img'>
        <?php 
            if($artist['thumbnail_path'] == NULL){
                echo
                "<img src=\"../assets/images/placeholder_img.png\" alt='Artist thumbnail'>
                <figcaption>No image available</figcaption>";
            } else {
                echo
                "<img src=\"../../images/FCS_Images/{$artist['thumbnail_path']}\" alt='Artist thumbnail'>
                <figcaption>{$artist["thumb_credit"]}</figcaption>";
            }
        ?>
    </figure>
    <div class="side">
        <div>
            <h4>Music Type</h4>
            <p><?php echo $artist['types']; ?></p>
        </div>
        <div>
            <h4>Publishers</h4>
            <p>
                <?php 
                    if($artist['publishers'] == null){
                        echo "N/A";
                    } else {
                        echo $artist['publishers']; 
                    }
                ?>
            </p>
        </div>
        <div>
            <h4>Label(s)</h4>
            <p>
                <?php 
                    if($artist['labels'] == null){
                        echo "N/A";
                    } else {
                        echo $artist['labels']; 
                    }
                ?>
            </p>
        </div>
        <div>
            <h4>Connections</h4>
            <p>
                <?php 
                    if($artist['connections'] == null){
                        echo "N/A";
                    } else {
                        $artist['connections']; 
                    }
                ?>
            </p>
        </div>
    </div>
    <div class="bottomContainer">
        <div class="bottom">
            <div>
                <?php
                    if($artist['members'] != null){
                        echo "<h4>Members</h4>
                            <p>{$artist['members']}</p>";
                    }
                ?>
            </div>
            <div>
                <h4>Genres</h4>
                <p><?php echo $artist['genres']; ?></p>
            </div>
        </div>
        
    </div>
</div>
<div class="bottomContent">
    <div>
        <h2>About <?php echo $artist['title']; ?></h2>
        <p><?php echo $artist['body']; ?></p>
    </div>
    <div class="galleryContainer">
        <h2>Gallery</h2>
        <div class="gallery">
            <?php
                foreach ($pageController->getPhotos($artistId) as $photo){
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
                $links = explode(", ", $artist['external_links']);
                foreach($links as $l){
                    echo "<li><a href='$l'>$l</a></li>";
                }
            ?>
        </ul>
        <h3>Sources</h3>
        <ul>
            <?php
                $links = explode(", ", $artist['sources']);
                foreach($links as $l){
                    echo "<li><a href='$l'>$l</a></li>";
                }
            ?>
        </ul>
    </div>
    <a href="#header" class="backToTop">Back to top</a>
</div>
<?php include("../view/include/footer.php"); ?>
