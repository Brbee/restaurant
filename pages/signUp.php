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
                    <h2>Sign In</h2>
                    <input id="email" type="email" name="email" placeholder="email">
                    <br>
                    <input id="password" type="password" name="password" placeholder="password">
                    <br>
                    <input id="passwordRepeat" type="password" name="passwordRepeat" placeholder="Repeat password">
                    <br>
                    <input id="f_name" type="text" name="f_name" placeholder="First Name">
                    <br>
                    <input id="l_name" type="text" name="l_name" placeholder="Last Name">
                    <br>
                    <input type="tel" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone Number">
                    <br>
                    <button id="signUpButton" class="btn btn-primary">Sign Up</button>
                    <br>
                    <span id="errorMessage" ></span>
                </div>
            </div>
        </div><!-- div za 100vh sekciju-->
    </div> <!--div sa everything wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../javascript/signUp.script.js"></script>
</body>
</html>