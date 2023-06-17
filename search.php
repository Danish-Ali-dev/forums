<!-- alter table threads add FULLTEXT(`thread_title`,`thread_description`); -->
<!-- SELECT * FROM `threads` WHERE match (`thread_title`, `thread_description`) against ('work') -->
<style>
#maincontainer {
    min-height: 80vh;
}
</style>
<?php
    $title = "Search - iDiscuss";
    require_once('partials/head.php');
    require_once('partials/navbar.php');
?>
<div class="container my-3" id="maincontainer">
    <h1 class="text-center my-3"> Search Results for <em>"<?= $_GET['search'] ?>" </em></h1>
    <?php
    $query = $_GET['search'];
    $noResult = true;

        $sql="SELECT * FROM `threads` WHERE match (thread_title, thread_description) against ('$query')";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) 
        {
            $noResult = false;
    ?>
    <h3 class="result"><a href="threads.php?threadlist_id=<?php echo $row['thread_id'] ?>" style="color: black;"><?= $row['thread_title'] ?></a></h3>
    <p><?= $row['thread_description'] ?></p>
    <?php
        }
        if ($noResult) {
        ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            <h4> No Results Found for <em>"<?= $query ?>"</em> </h4>
            <ul>
                <li>Make sure that all words are spelled correctly.</li>
                <li>Try different keywords.</li>
                <li>Try more general keywords.</li>
                <li>Try fewer keywords.</li>
            </ul>
        </div>
    </div>
    <?php
        }
    ?>
</div>
<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>