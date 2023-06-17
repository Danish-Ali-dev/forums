<div class="row">
    <?php
        include('connection.php');
        $sql  = "SELECT * FROM `category`";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $title = $row['category_name'];
            $desc = $row['category_description'];
    ?>
    
        <div class="col-md-4 my-2">
            <div class="card col-xs col-sm" style="width: 18rem;">
                <img src="https://source.unsplash.com/500x400/?<?= $title ?>,coding" class="card-img-top img-responsive" alt="image about <?= $title ?>">
                <div class="card-body">
                    <h5 class="card-title"><a href="threadlist.php?cat_id=<?php echo $row['category_id'] ?>"><?= $title ?></a></h5>
                    <p class="card-text"><?= substr($desc, 0, 90) ?>....</p>
                    <a href="threadlist.php?cat_id=<?= $row['category_id'] ?>" class="btn btn-primary">View Thread</a>
                </div>
            </div>
        </div>
    <?php
        }
        ?>
</div>