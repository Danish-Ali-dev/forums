<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">iDiscuss</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Top Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                        require_once('partials/connection.php');
                        $sql  = "SELECT * FROM `category`";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) 
                        {
                    ?>
                        <li><a class="dropdown-item" href="threadlist.php?cat_id=<?= $row['category_id'] ?>"><?= $row['category_name'] ?></a></li>
                    <?php
                        }
                    ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>
                <?php
                    session_start();
                    if (isset($_SESSION['username'])){
                        ?>
                        <form class="d-flex" action="search.php" method="get">
                        <p class="my-0 mx-3 fs-5 text-success"><?= $_SESSION['username'] ?></p>
                        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                        <a href="partials/logout.php" class="btn btn-outline-success mx-2" type="button">Logout</a>
                        </form>
                    <?php
                    }
                    else{
                    ?>
                <form class="d-flex" action="search.php" method="get">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
                <button class="btn btn-outline-success mx-2" type="button" data-bs-toggle="modal"
                    data-bs-target="#signupmodal">Signup</button>
                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                    data-bs-target="#loginmodal">Login</button>
                <?php
                    }
                ?>
            </form>
        </div>
    </div>
</nav>
<?php 
    include('partials/signup_modal.php');
    include('partials/login_modal.php');
?>

<!-- <?php
                    session_start();
                    if (isset($_SESSION['username'])){
                        ?>
                        <p class=text-light>Welcome <?= $_SESSION['username'] ?></p>
                        <a href="logout.php" class="btn btn-outline-success" type="button">Logout</a>
                        </form>
                    <?php
                    }
                    else{
                    ?>
            <form>
                <button class="btn btn-outline-success mx-2" type="button" data-bs-toggle="modal"
                    data-bs-target="#signupmodal">Signup</button>
                <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                    data-bs-target="#loginmodal">Login</button>
                <?php
                    }
                ?> -->
            </form>