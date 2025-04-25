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
    <p class="ya"><?php echo "{$artist['start']} - {$artist['year']}"; ?></p>
    <figure class='img'>
        <?php 
            if($artist['thumbnail'] == NULL){
                echo
                "<img src=\"../assets/images/placeholder_img.png\" alt='Venue thumbnail'>
                <figcaption>{$artist["title"]}</figcaption>";
            } else {
                echo
                "<img src=\"data:image;base64," . base64_encode($artist["thumbnail"]) . "\" alt='Venue thumbnail'>
                <figcaption>{$artist["title"]}</figcaption>";
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
            <p><?php echo $artist['publishers']; ?></p>
        </div>
        <div>
            <h4>Label(s)</h4>
            <p><?php echo $artist['labels']; ?></p>
        </div>
        <div>
            <h4>Connections</h4>
            <p><?php echo $artist['connections']; ?></p>
        </div>
    </div>
    <div class="bottomContainer">
        <div class="bottom">
            <div>
                <h4>Members</h4>
                <p><?php echo $artist['members']; ?></p>
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
                    if($photo['caption'] == null){
                        echo
                        "<figure class='img'>
                            <img width='300' src=\"data:image;base64," . base64_encode($photo["image"]) . "\">
                            <figcaption>{$photo["credits"]}</figcaption>
                        </figure>";
                    } else if ($photo['credits'] == null){
                        echo
                        "<figure class='img'>
                            <img width='300' src=\"data:image;base64," . base64_encode($photo["image"]) . "\">
                            <figcaption>{$photo["caption"]}</figcaption>
                        </figure>";
                    } else if ($photo['caption'] == null && $photo['credits'] == null){
                        "<figure class='img'>
                            <img width='300' src=\"data:image;base64," . base64_encode($photo["image"]) . "\">
                        </figure>";
                    } else {
                        echo
                        "<figure class='img'>
                            <img width='300' src=\"data:image;base64," . base64_encode($photo["image"]) . "\">
                            <figcaption>{$photo["caption"]}: {$photo["credits"]}</figcaption>
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
