<?php 
    // set title
    $title = "Flower City Sound - Home";
    include("../view/include/header.php");
    // controller(s)
    include("../controller/ArtistController.php");
    include("../controller/EventController.php");
    include("../controller/VenueController.php");
    $artistController = new ArtistController();
    $eventController = new EventController();
    $venueController = new VenueController();
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
    <?php
        foreach ($artistController->getRandom(3) as $a){
            $name = str_replace (" ", "", $a["title"]);
            $name = str_replace ("&", "", $name);
            if($a['thumbnail_path'] == NULL){
                echo
                "<a class='entry-link' href='artist.php?artist={$name}+{$a['id']}'><figure class='img'>
                    <div class='imgContainer'><img src=\"../assets/images/placeholder_img.png\" alt='Artist thumbnail'></div>
                    <figcaption>{$a["title"]}</figcaption>
                </figure></a>";
            } else {
                echo
                "<a class='entry-link' href='artist.php?artist={$name}+{$a['id']}'><figure class='img'>
                    <div class='imgContainer'><img src=\"{$a['thumbnail_path']}\" alt='Artist thumbnail'></div>
                    <figcaption>{$a["title"]}</figcaption>
                </figure></a>";
            }
            
        }
    ?>
</div>

<hr>
<div id="FVContainer">
    <h2>Featured Venues</h2>
    <div id="featuredVenues">
        <?php
            foreach ($venueController->getRandom(3) as $v){
                $name = str_replace (" ", "", $v["title"]);
                if($v['thumbnail_path'] == NULL){
                    echo
                    "<a class='entry-link' href='venue.php?venue={$name}+{$v['id']}'><figure class='img'>
                        <div class='imgContainer'><img src=\"../assets/images/placeholder_img.png\" alt='Venue thumbnail'></div>
                        <figcaption>{$v["title"]}</figcaption>
                    </figure></a>";
                } else {
                    echo
                    "<a class='entry-link' href='venue.php?venue={$name}+{$v['id']}'><figure class='img'>
                        <div class='imgContainer'><img src=\"../../images/FCS_Images/{$v['thumbnail_path']}\" alt='Venue thumbnail'></div>
                        <figcaption>{$v["title"]}</figcaption>
                    </figure></a>";
                }
                
            }
        ?>
    </div>
</div>


<hr>
<!-- Upcoming Events -->
<div id="UEContainer">
    <h2>Upcoming Events</h2>
    <div id="upcomingEvents">
        <?php
            foreach ($eventController->getRecent(3) as $e){
                $name = str_replace ("", " ", $e["title"]);
                /* Link: href='event.php?artist={$name}+{$e['id']}'*/
                if($e['thumbnail'] == null){
                    echo
                    "<a class='entry-link'><figure class='img'>
                        <img src=\"../assets/images/placeholder_img.png\" alt='Event thumbnail'>
                        <figcaption><strong>{$e["title"]}</strong><br>{$e["date_start"]}-{$e["date_end"]}<br>{$e["location"]}</figcaption>
                    </figure></a>";
                } else {
                    echo
                    "<a class='entry-link'><figure class='img'>
                        <img src=\"data:image;base64," . base64_encode($e["thumbnail"]) . "\" alt='Event thumbnail'>
                        <figcaption><strong>{$e["title"]}</strong><br>{$e["date_start"]}-{$e["date_end"]}<br>{$e["location"]}</figcaption>
                    </figure></a>";
                }
                
            }
        ?>
    </div>
</div>
<?php include("../view/include/footer.php") ?>
