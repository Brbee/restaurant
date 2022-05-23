<?php
require "../pageParts/head.PagePart.php";
?>
<link rel="stylesheet" href="../styles/login.styles.css">
</head>


<?php
require "../pageParts/navbar.PagePart.php";
?>
            <div class="loginSectionWrapper">
                <div class="loginSection">
                    <?php
                        if(isset($_GET['success'])) {
                            if($_GET['success'] == 'true') {
                                echo "<p style='color: green'>Successfully verified account! You are now able to login!</p>";
                            }
                            else if($_GET['success'] == 'false') {
                                echo "<p style='color: red'>Something went wrong!</p>";
                            }
                        }
                    ?>
                    <h2>Log In</h2>
                    <input id="email" type="text" name="email" placeholder="email">
                    <br>
                    <input id="password" type="password" name="password" placeholder="password">
                    <br>
                    <button id="LoginButton" class="btn btn-primary">Login</button>
                    <a style="text-align: center;" href="./forgetPassword.php">Forgot your password?</a>
                    <br>
                    <span id="errorMessage" ></span>
                </div>
            </div>
        </div><!-- div za 100vh sekciju-->
    </div> <!--div sa everything wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../javascript/login.script.js"></script>
</body>
</html>