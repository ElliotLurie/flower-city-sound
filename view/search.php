<?php 
    // Set title
    $title = "Flower City Sound - Home";
    include("../view/include/header.php");
    // controller(s)
    include("../controller/SearchController.php");
    $searchController = new SearchController();
    $pages = [];

    session_start ();
    if (!isset ($_GET ["filter"]) || $_GET ["filter"] == "") $_GET ["filter"] = $_SESSION ["filter"];
    else $_SESSION ["filter"] = $_GET ["filter"];

    $type = isset ($_GET ["type"]) ? $_GET ["type"] : "";
    $sort = isset ($_GET ["sort"]) ? $_GET ["sort"] : "";

?>
<div class="top">
    <h1>Search Results</h1>
</div>
<div>
    <!-- Filtering and sorting -->
    <form id="filter" method="get" onsubmit="return false">
        <div>
            <p>Filter:</p>
            <select id="type" name="type" onchange="this.form.submit()">
                <option value="">Type</option>
                <option value="artist">Artist</option>
                <option value="event">Event</option>
                <option value="venue">Venue</option>
            </select>
        </div>
        <div>
            <p>Sort:</p>
            <div id="sort-bar">
                <input type="radio" id="title" name="sort" value="title" onchange="this.form.submit()">
                <label for="title">Title</label>
                <input type="radio" id="last-modified" name="sort" value="last-modified" onchange="this.form.submit()">
                <label for="last-modified">Last Modified</label>
              </div>
          </div>
      </form>
      <!-- div that will hold returned divs and format them into a grid using flex -->
      <div class="listedEntries">
        <?php
            // pulls all results and populates the page using an html 'template'
            // will need pagination
            $pages = $searchController->search($_GET['filter'], $type, $sort);
            $titleId = "{$p['title']} + {$p['id']}";
            $titleId = str_replace(" ", "", $titleId);
            // return as array of results
            $echoStr = "";
            // for each result, populate a div with info
            foreach ($pages as $p) {
                if(isset($p['address'])) {
                    $echoStr = 
                    "<div class='entries' onclick=\"goToVenuePage('$titleId');\">
                        <h4>{$p['title']}</h4>
                    </div>";
                } else {
                    $echoStr = 
                    "<div class='entries' onclick=\"goToArtistPage('$titleId');\">
                        <h4>{$p['title']}</h4>
                    </div>";
                }
                
                echo $echoStr;
            }
        ?>
    </div>
</div>
<script>
for (const child of document.getElementById("type").children)
    if (child.value == "<?php echo $type?>") child.selected = true;

for (const child of document.getElementById("sort-bar").children)
    if (child.tagName == "INPUT" && child.value == "<?php echo $sort?>")
      child.checked = true;
</script>
<?php include("../view/include/footer.php"); ?>
