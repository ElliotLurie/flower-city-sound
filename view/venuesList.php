<?php 
    // Set title
    $title = "Flower City Sound - Home";
    include('../view/include/header.php');
    // controller(s)
    include('../controller/VenueController.php');
    $venueController = new VenueController();
    $venues = [];
?>
<div class="top">
    <h1>Venues</h1>
</div>
<div>
    <!-- Filtering and sorting -->
    <form id="filter" method="get" onsubmit="return false">
        <div>
            <p>Filter:</p>
            <select id="status" name="status" onchange="this.form.submit()">
                <option value="">Status</option>
                <option value="open">Active</option>
                <option value="closed">Permanently Closed</option>
            </select>
            <select id="decade" name="decade" onchange="this.form.submit()">
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
        <div id="filterSort" onchange="this.form.submit()">
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
            $decade = $_GET ["decade"] != "" ? $_GET ["decade"] : null;
            $status = $_GET ["status"] != "" ? ($_GET ["status"] == "open" ? 1 : 0) : -1;

            // pulls all results and populates the page using an html 'template'
            // will need pagination
            // return as array of results
            $venues = $venueController->getVenues($status, $decade);


            // for each result, populate a div with info
            foreach ($venues as $v) {
                $echoStr = 
                    "<div class='venEntries' onclick='goToPage(\"{$v['title']}, {$v['id']}\");'>
                        <h4>{$v['title']}</h4>
                        <p>{$v['address']}</p>
                    </div>";
                echo $echoStr;
            }
        ?>
    </div>
</div>
<script>
for (const child of document.getElementById("status").children)
    if (child.value == "<?php echo $_GET ["status"]?>") child.selected = true;

for (const child of document.getElementById("decade").children)
    if (child.value == "<?php echo $_GET ["decade"]?>") child.selected = true;
</script>
<?php include("../view/include/footer.php"); ?>
