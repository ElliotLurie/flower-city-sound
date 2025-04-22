<?php 
    // set title
    $title = "Flower City Sound - Home";
    include("../view/include/header.php");
    // controller(s)
    include("../controller/ArtistController.php");
    include("../controller/VenueController.php");
    $artistController = new ArtistController();
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
        foreach ($artistController->getRandom(5) as $a){
            $name = str_replace ("", " ", $a["title"]);
            echo
                "<a class='entry-link' href='artist.php?artist={$name}+{$a['id']}'><figure class='img'>
                    <img src=\"data:image;base64," . base64_encode($a["thumbnail"]) . "\" alt='Artist thumbnail'>
                    <figcaption>{$a["title"]})</figcaption>
                </figure></a>";
        }
    ?>
</div>

<hr>
<div id="FVContainer">
    <h2>Featured Venues</h2>
    <div id="featuredVenues">
        <?php
            foreach ($venueController->getRandom(5) as $v){
                $name = str_replace ("", " ", $v["title"]);
                echo
                    "<a class='entry-link' href='artist.php?artist={$name}+{$v['id']}'><figure class='img'>
                        <img src=\"data:image;base64," . base64_encode($v["thumbnail"]) . "\" alt='Artist thumbnail'>
                        <figcaption>{$v["title"]})</figcaption>
                    </figure></a>";
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
            foreach ($artistController->getRandom(5) as $a){
                $name = str_replace ("", " ", $a["title"]);
                echo
                    "<a class='entry-link' href='artist.php?artist={$name}+{$a['id']}'><figure class='img'>
                        <img src=\"data:image;base64," . base64_encode($a["thumbnail"]) . "\" alt='Artist thumbnail'>
                        <figcaption>{$a["title"]})</figcaption>
                    </figure></a>";
            }
        ?>
    </div>
</div>
<?php include("../view/include/footer.php") ?>
