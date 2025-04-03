<?php 
    // set title
    include('../controller/ArtistController.php');
    $titleId = $_GET['artist'];
    $artistId = explode(" ", $titleId)[1];
    $artistController = new ArtistController();
    $artist = $artistController->getArtist($artistId);
    $title = "Flower City Sound - {$artist['title']}";
    include("../view/include/header.php");
?>
<div class="topContent">
    <h1 class="name"><?php echo $artist['title']; ?></h1>
    <p class="ya"><?php echo "{$artist['start']} - {$artist['year']}"; ?></p>
    <figure class="img">
        <img src="../assets/images/placeholder_img.jpg" alt="temp img" width="300px">
        <figcaption>image caption(credits)</figcaption>
    </figure>
    <div class="side">
        <div>
            <h4>Music Type</h4>
            <p>Covers, parodies, and/or original music</p>
        </div>
        <div>
            <h4>Publishers</h4>
            <p><?php echo $artist['publishers']; ?></p>
        </div>
        <div>
            <h4>Label(s)</h4>
            <p>Label, Label, Label</p>
        </div>
        <div>
            <h4>Connections</h4>
            <p>Connection name, connection name</p>
        </div>
    </div>
    <div class="bottomContainer">
        <div class="bottom">
            <div>
                <h4>Members</h4>
                <p>Member 1, member 2, member 3, etc...</p>
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
        <h2>About [Artist name]</h2>
        <p><?php echo $artist['blurb']; ?></p>
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