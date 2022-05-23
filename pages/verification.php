<?php
require "../pageParts/head.PagePart.php";

if(isset($_SESSION['id'])){
  if($_SESSION['verified'] == 1){
    header('location: ./index.php');
  }else{
    $showPage = true;
  }
}else{
  header('location: ./index.php');
}

if($showPage){
?>
<link rel="stylesheet" href="../styles/login.styles.css">
</head>
<?php
require "../pageParts/navbar.PagePart.php";
?>
<div class="loginSectionWrapper">
  <div class="loginSection">
    <h2 class="textAboveCodeInput">Verification link has been sent to your email adress</h2>
  </div>
</div>

</div>
</div>



<!-- <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Info</h5>
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
</div> -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../javascript/verification.script.js"></script>
</body>

</html>
<?php
}