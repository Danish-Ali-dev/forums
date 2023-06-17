<?php
    $title = "Threads - iDiscuss";
    require_once('partials/head.php');
    require_once('partials/navbar.php');
    
    require_once('partials/connection.php');
    if(isset($_GET['threadlist_id'])){
    $thread_id = $_GET['threadlist_id'];
    $sql = "SELECT * FROM threads WHERE thread_id = '$thread_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    }

    if(isset($_POST['post'])){
        $comment = $_POST['comment'];

        $comment = str_replace("<", "&lt", $comment);
        $comment = str_replace(">", "&gt", $comment);

        $th_id = $thread_id;
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $comment_by = $_SESSION['user_id'];

    $sql2 = "INSERT INTO `comments` (`thread_id`, `comment_content`, `comment_by`) VALUES ('$th_id', '$comment', '$comment_by')";

    if($conn->query($sql2)){
        echo '<br><div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your comment has been added!
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
    <?php
        if(isset($_GET['threadlist_id'])){
        $th_id = $_GET['threadlist_id'];
        $sql2 = "SELECT * FROM threads WHERE thread_id = '$th_id'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        }
    ?>
        <h2><?= $row2['thread_title'] ?></h2>
        <p>
            <?= $row2['thread_description'] ?>
            <hr>
        <p>No Spam / Advertising / Self-promote in the forums. ...
            Do not post copyright-infringing material. ...
            Do not post “offensive” posts, links or images. ...
            Do not cross post questions. ...
            Do not PM users asking for help. ...
            Remain respectful of other members at all times.
        </p>
        <?php
            $th_user_id = $row2['thread_user_id'];
            $sql3 = "SELECT username FROM users WHERE `user_id` = '$th_user_id' ";
            $result3 = $conn->query($sql3);
            $row3 = $result3->fetch_assoc();
            $posted_by = $row3['username'];
        ?>
        <p>Posted by: <em><b><?= $posted_by ?></b></em></p>
    </div>

    <h1 class="my-3">Post a Comment</h1>
    <?php
    if (isset($_SESSION['username']))
    {
    ?>
    <form method="post">
        <div class="mb-3">
            <label for="desc" class="form-label">Type Your Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
        </div>
        <div class="mb-1">
            <button type="submit" class="btn btn-success" name="post">Post Comment</button>
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
            You are not logged in. PLease Log in to Post a Comment..... 
        </div>
    </div>
    <?php
        }
    ?>

    <h2 class="my-4">Discussion</h2>

    <?php
        $noResult = true;
        $thread_id = $_GET['threadlist_id'];
        $sql1 = "SELECT * FROM comments WHERE thread_id = '$thread_id'";
        $result1 = $conn->query($sql1);
        while($row1 = $result1->fetch_assoc())
        {
            $noResult = false;

            $th_user_id = $row1['comment_by'];
            $sql3 = "SELECT username FROM users WHERE `user_id` = '$th_user_id' ";
            $result3 = $conn->query($sql3);
            $row3 = $result3->fetch_assoc();
            $username = $row3['username'];
    ?>

    <div class="d-flex mt-4">
        <div class="flex-shrink-0">
            <img src="images/user.png" alt="user" width="70px">
        </div>
        <div class="flex-grow-1 ms-3">
            <p class="fw-bold my-0">Comment by <?= $username ?> at <?= $row1['created'] ?></p>
            <p><?= $row1['comment_content'] ?></p>
        </div>
    </div>
<?php
    }
    if ($noResult) 
    {
?>
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <div>
        <h4>No Comments Found</h4>
        <p>Be the first person to Comment </p>
    </div>
</div>

<?php
    }
?>

    
<?php
    require_once('partials/footer.php');
    require_once('partials/bottom.php');
?>