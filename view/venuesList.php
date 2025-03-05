<?php 
    // Set title
    $title = "Flower City Sound - Home";
    include("../view/include/header.php");
    // controller(s)
    include("../controller/VenueController.php");
    $venueController = new VenueController();
    $venues = [];
?>
<div>
    <h1>Venues</h1>
</div>
<div>
    <!-- Filtering and sorting -->
    <form id="filter" method="get" onsubmit="return false">
        <div>
            <p>Filter:</p>
            <select name="status">
                <option value="">Status</option>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
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
    <!-- div that will hold returned divs and format them into a grid using flex -->
    <div class="listedEntries">
        <?php
            // pulls all results and populates the page using an html 'template'
            // will need pagination
            // return as array of results
            $venues = $venueController->getAll();

            // for each result, populate a div with info
            foreach ($venues as $v) {
                $echoStr = 
                    "<div class='venEntries'>
                        <h4>{$a['title']}</h4>
                    </div>";
                echo $echoStr;
            }
        ?>
    </div>
</div>
<?php include("../view/include/footer.php") ?>
