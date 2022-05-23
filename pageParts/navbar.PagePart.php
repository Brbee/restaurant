<body>
    <div class="everything-wrapper">
        <div class="hundredVhSection">
            <div id="navbarSpacer" style="background-color: black; margin-bottom: 56px;">
            </div>
            <div style="position: absolute; width:100%; z-index:5; top:0px">
            <nav id="navbar" class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand text-white " href="/Restaurant/pages/index.php">Restaurant</a>
                    <button class="navbar-toggler bg-white" style="width: 60px;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <img src="../pictures/menu.png" style="height: 30px;" alt="menu">
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" id="navCustom">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li><a class="nav-link active text-white" href="../pages/index.php">Home</a></li>
                            <?php
                            if (isset($_SESSION['id']) && $_SESSION['verified'] && $_SESSION['role'] == 2) {
                            ?>
                                <li><a class="nav-link active text-white" href="../pages/reserve.php">Reserve</a></li>
                                <li><a class="nav-link active text-white" href="../pages/profile.php">Edit Profile</a></li>
                                <li><a class="nav-link active text-white" href="../pages/worker.php">Worker's Portal</a></li>
                                <li><a class="nav-link active text-white" href="../pages/admin.php">Admin</a></li>
                                <li><a class="nav-link active text-white" href="../includes/logout.inc.php">Log Out</a></li>
                            <?php
                            } elseif (isset($_SESSION['id']) && $_SESSION['verified'] && $_SESSION['role'] == 1) {
                            ?>
                                <li><a class="nav-link active text-white" href="../pages/reserve.php">Reserve</a></li>
                                <li><a class="nav-link active text-white" href="../pages/profile.php">Edit Profile</a></li>
                                <li><a class="nav-link active text-white" href="../pages/worker.php">Worker's Portal</a></li>
                                <li><a class="nav-link active text-white" href="../includes/logout.inc.php">Log Out</a></li>
                            <?php
                            } elseif (isset($_SESSION['id']) && $_SESSION['verified']) {
                            ?>
                                <li><a class="nav-link active text-white" href="../pages/reserve.php">Reserve</a></li>
                                <li><a class="nav-link active text-white" href="../pages/profile.php">Edit Profile</a></li>
                                <li><a class="nav-link active text-white" href="../includes/logout.inc.php">Log Out</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a class="nav-link active text-white" href="../pages/signUp.php?page=navbar">Sign Up</a></li>
                                <li><a class="nav-link active text-white" href="../pages/login.php?page=navbar">Log In</a></li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </nav>
            </div>