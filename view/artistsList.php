<?php 
    // Set title
    $title = "Flower City Sound - Artists";
    include("../view/include/header.php");
    // controller(s)
    include("../controller/ArtistController.php");
    $artistController = new ArtistController();
    $artists = [];
?>
<div class="top">
    <h1>Artists</h1>
</div>
<div>
    <!-- Filtering and sorting -->
    <form id="filter" method="get" onsubmit="return false">
        <div>
            <p>Filter:</p>
            <select id="size" name="size" onchange="this.form.submit()">
                <option value="">Size</option>
                <option value="ind">Individuals</option>
                <option value="group">Groups</option>
            </select>
            <select id="genre" name="genre" onchange="this.form.submit()">
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
            <select id="activity" name="activity" onchange="this.form.submit()">
                <option value="">Activity Status</option>
                <option value="act">Active</option>
                <option value="inact">Inactive</option>
            </select>
            <select id="decade" name="decade" onchange="this.form.submit()">
                <option value="">Decade</option>
                <option value="pre50">Pre-1950</option>
                <option value="1950">1950s</option>
                <option value="1960">1960s</option>
                <option value="1970">1970s</option>
                <option value="1980">1980s</option>
                <option value="1990">1990s</option>
                <option value="2000">2000s</option>
                <option value="2010">2010s</option>
                <option value="2020">2020s</option>
            </select>
            <button type="button" onclick="location.href=location.href.split('?')[0]">Reset</button>
        </div>
        <div id="sort-bar">
            <p>Sort:</p>
            <input type="radio" id="name" name="sort" value="title">
            <label for="name">Name</label>
            <input type="radio" id="year" name="sort" value="year-founded">
            <label for="year">Year</label>
            <input type="radio" id="recent" name="sort" value="last-modified">
            <label for="recent">Last Modified</label>
        </div>
    </form>
    <!-- div that will hold returned artist's divs and format them into a grid using flex -->
    <div class="listedEntries">
        <?php
            $group = $_GET ["size"] != "" ? ($_GET ["size"] == "group" ? 1 : 0) : -1;
            $activity = $_GET ["activity"] != "" ? ($_GET ["activity"] == "act" ? 1 : 0) : -1;
            $genre = $_GET ["genre"] != "" ? $_GET ["genre"] : null;
            $decade = $_GET ["decade"] != "" ? $_GET ["decade"] : null;
            $sort = $_GET ["sort"] != "" ? $_GET ["sort"] : null;
            // pulls all individual artists and populates the page using an html 'template'
            // will need pagination
            // return as array of artists
            $artists = $artistController->getArtists($group, $genre, $activity, $decade, $sort);
            // for each artist, populate a div with info
            foreach ($artists as $a) {
                $titleId = "{$a['title']} + {$a['id']}";
                $titleId = str_replace(" ", "", $titleId);
                $echoStr = 
                    "<div class='artEntries' onclick=\"goToArtistPage('$titleId');\">
                        <h4>{$a['title']}</h4>
                        <p>{$a['genres']}</p>
                    </div>";
                echo $echoStr;
            }
        ?>
    </div>
</div>
<script>
for (const child of document.getElementById("size").children)
    if (child.value == "<?php echo $_GET ["size"]?>") child.selected = true;

for (const child of document.getElementById("genre").children)
    if (child.value == "<?php echo $_GET ["genre"]?>") child.selected = true;

for (const child of document.getElementById("activity").children)
    if (child.value == "<?php echo $_GET ["activity"]?>") child.selected = true;

for (const child of document.getElementById("decade").children)
    if (child.value == "<?php echo $_GET ["decade"]?>") child.selected = true;

for (const child of document.getElementById("sort-bar").children)
    if (child.tagName == "INPUT"){
        child.addEventListener("change", () => {child.form.submit()});
        if (child.value == "<?php echo $sort?>")
            child.checked = true;
    }
</script>


<?php include("../view/include/footer.php"); ?>
