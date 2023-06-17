<?php
    $title = "Welcome to iDiscuss - Coding Forums";
    require_once('partials/head.php');
    require_once('partials/navbar.php');
    require_once('partials/slider.php');
?>
<div class="container">
    <h2 class="text-center my-3"> iDiscuss - Browse Categories </h2>
    <?php require_once('partials/card.php') ?>
</div>
<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>