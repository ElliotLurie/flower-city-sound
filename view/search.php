<?php 
    // Set title
    $title = "Flower City Sound - Home";
    include("../view/include/header.php");
    // controller(s)
    include("../controller/ArtistController.php");
    include("../controller/VenueController.php");
?>
<div>
    <h1>Search Results</h1>
</div>
<div>
    <!-- Filtering and sorting -->
    <form id="filter" method="get" onsubmit="return false">
        <div>
            <p>Filter:</p>
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
                <option value="rbs">R&B/Soul</option>
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
            <select name="type">
                <option value="">Type</option>
                <option value="artist">Artist</option>
                <option value="venue">Venue</option>
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
    <!-- div that will hold returned divs and format them into a grid using flex -->
    <div class="listedEntries">
        <?php
            // pulls all results and populates the page using an html 'template'
            // will need pagination
            if(isset($_GET['filter'])){
                // return as array of results
                $echoStr = "";
                // for each result, populate a div with info
                foreach ($artists as $a) {
                    $echoStr = 
                        "<div>
                            <h4></h4>
                        </div>";
                    echo $echoStr;
                }
            }
        ?>
    </div>
</div>
<?php include("../view/include/footer.php"); ?>
