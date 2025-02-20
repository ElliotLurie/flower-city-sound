<?php 
    // Set title
    $title = "Flower City Sound - Artists";
    include("../view/include/header.php");
    // controller(s)
    include("../controller/ArtistController.php");
    $artistController = new ArtistController();
    $artists = [];
?>
<div>
    <h1>Artists</h1>
</div>
<div>
    <!-- Filtering and sorting -->
    <form id="filter" method="get" onsubmit="return false">
        <div>
            <p>Filter:</p>
            <select name="size">
                <option value="">Size</option>
                <option value="ind">Individuals</option>
                <option value="group">Groups</option>
            </select>
            <select name="genre">
                <option value="">Genre</option>
                <option value="blues">Blues</option>
                <option value="class">Classical</option>
                <option value="coun">Country</option>
                <option value="elec">Electronic</option>
                <option value="folk">Folk</option>
                <option value="hhr">Hip-Hop/Rap</option>
                <option value="jazz">Jazz</option>
                <option value="pop">Pop</option>
                <option value="rbs">R&amp;B/Soul</option>
                <option value="rome">Rock/Metal</option>
                <option value="other">Other</option>
            </select>
            <select name="activity">
                <option value="">Activity Status</option>
                <option value="act">Active</option>
                <option value="inact">Inactive</option>
            </select>
            <select name="decade">
                <option value="">Decade</option>
                <option value="pre19">Pre-1900s</option>
                <option value="1900">1900s</option>
                <option value="1910">1910s</option>
                <option value="1920">1920s</option>
                <option value="1930">1930s</option>
                <option value="1940">1940s</option>
                <option value="1950">1950s</option>
                <option value="1960">1960s</option>
                <option value="1970">1970s</option>
                <option value="1980">1980s</option>
                <option value="1990">1990s</option>
                <option value="2000">2000s</option>
                <option value="2010">2010s</option>
                <option value="2020">2020s</option>
            </select>
        </div>
        <div>
            <p>Sort:</p>
            <input type="radio" id="name" name="sort" value="name">
            <label for="name">Name</label>
            <input type="radio" id="year" name="sort" value="year">
            <label for="year">Year</label>
            <input type="radio" id="recent" name="sort" value="recent">
            <label for="recent">Recently Added</label>
        </div>
    </form>
    <!-- div that will hold returned artist's divs and format them into a grid using flex -->
    <div class="listedEntries">
        <?php
            // pulls all individual artists and populates the page using an html 'template'
            // will need pagination
            // return as array of artists
            $artists = $artistController->getAllIndividual();
            // for each artist, populate a div with info
            foreach ($artists as $a) {
                $echoStr = 
                    "<div class='indEntries'>
                        <h4>{$a['title']}</h4>
                    </div>";
                echo $echoStr;
            }
        ?>
    </div>
</div>
<?php include("../view/include/footer.php") ?>
