<?php
    $title = "Threads - iDiscuss";
    require_once('partials/head.php');
    require_once('partials/navbar.php');
    
    require_once('partials/connection.php');
    if(isset($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];
    $sql = "SELECT * FROM category WHERE category_id = '$cat_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    }

    if(isset($_POST['submit'])){
        $th_title = $_POST['title'];
        $th_description = $_POST['desc'];

        $th_title = str_replace("<", "&lt", $th_title);
        $th_title = str_replace(">", "&gt", $th_title);

        $th_description = str_replace("<", "&lt", $th_description);
        $th_description = str_replace(">", "&gt", $th_description);
        $th_cat_id = $cat_id;
        if(!isset($_SESSION))
        { 
            session_start(); 
        }
        $th_user_id = $_SESSION['user_id'];

    $sql2 = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_category_id`, `thread_user_id`) VALUES ('$th_title', '$th_description', '$th_cat_id', '$th_user_id')";

    if($conn->query($sql2)){
        echo '<br><div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your thread has been added! Please wait for community to respond...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else{
        echo '<br><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

?>
<div class="container">
    <h2 class="text-center my-3"> iDiscuss - Threads </h2>
    <div class="h-100 p-4 bg-light border rounded-3">
        <h2>Welcome to <?= $row['category_name'] ?> Forums</h2>
        <p>
            <?= $row['category_description'] ?>
            <hr>
        <p>No Spam / Advertising / Self-promote in the forums. ...
            Do not post copyright-infringing material. ...
            Do not post “offensive” posts, links or images. ...
            Do not cross post questions. ...
            Do not PM users asking for help. ...
            Remain respectful of other members at all times.
        </p>
    </div>

    <h1 class="my-3">Start a Discussion</h1>
    <?php
        if (isset($_SESSION['username']))
        {
    ?>
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Problem Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Elaborate Your Problem</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>
        <div class="mb-1">
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </div>
    </form>
    <?php
        }
        else {
    ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
            aria-label="Warning:">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div>
            You are not logged in. PLease Log in to Start a Discussion..... 
        </div>
    </div>
    <?php
        }
    ?>
    <h1 class="my-4">Browse Questions</h1>

    <?php
        $noResult = true;
        $cat_id = $_GET['cat_id'];
        $sql1 = "SELECT * FROM threads WHERE thread_category_id = '$cat_id'";
        $result1 = $conn->query($sql1);
        while($row1 = $result1->fetch_assoc())
        {
            $noResult = false;

            $th_user_id = $row1['thread_user_id'];
            $sql3 = "SELECT username FROM users WHERE `user_id` = '$th_user_id' ";
            $result3 = $conn->query($sql3);
            $row3 = $result3->fetch_assoc();
            // $username = $row3['username'];
    ?>

    <div class="d-flex mt-4">
        <div class="flex-shrink-0">
            <img src="images/user.png" alt="user" width="70px">
        </div>
        <div class="flex-grow-1 ms-3">
            <p class="fw-bold my-0">Asked by <?= $row3['username'] ?> at <?= $row1['created'] ?></p>
            <h5> <a href="threads.php?threadlist_id=<?php echo $row1['thread_id'] ?>"> <?= $row1['thread_title'] ?> </a>
            </h5>
            <p><?= $row1['thread_description'] ?></p>
        </div>
    </div>

    <?php
    }
    if ($noResult) 
    {
        ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            <h4>No Threads Found</h4>
            <p>Be the first person to ask a question</p>
        </div>
    </div>

<?php
    }

    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>