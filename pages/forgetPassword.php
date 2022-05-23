<?php
require "../pageParts/head.PagePart.php";
?>
<link rel="stylesheet" href="../styles/login.styles.css">
</head>


<?php
require "../pageParts/navbar.PagePart.php";
?>
<div class="loginSectionWrapper" id="enterEmail">
    <div class="loginSection">
        <h2>Enter Your Email:</h2>
        <input id="email" type="text" name="email" placeholder="email">
        <br>
        <button id="SendEmail" class="btn btn-primary">Reset Your Password</button>
        <span id="errorMessage"></span>
    </div>
</div>

<div class="loginSectionWrapper" id="enterCode" style="display: none;">
    <div class="loginSection">
        <h2>Code Has Been Sent to Your Email:</h2>
        <h2>Enter Code:</h2>
        <input id="code" type="text" name="code" placeholder="code">
        <br>
        <button id="checkCode" class="btn btn-primary">Reset Your Password</button>
        <span id="errorMessage"></span>
    </div>
</div>

<div class="loginSectionWrapper" id="resetPassword" style="display: none;">
    <div class="loginSection">
        <h2>Enter New Password:</h2>
        <input id="password" type="password" name="password" placeholder="Password">
        <br>
        <input id="passwordReap" type="password" name="passwordReap" placeholder="Repeat Password">
        <br>
        <button id="passwordButton" class="btn btn-primary">Change Password</button>
        <span id="errorMessage"></span>
    </div>
</div>

</div><!-- div za 100vh sekciju-->
</div>
<!--div sa everything wrapper -->



<div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Password Reset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="modalMessage"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../javascript/resetpassword.script.js"></script>
</body>

</html>