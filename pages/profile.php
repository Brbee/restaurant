<?php
require "../pageParts/head.PagePart.php";

if(isset($_SESSION['id'])){
  if($_SESSION['verified'] == 1){
    $showPage = true;
  }else{
    header('location: ./verification.php');
  }
}else{
  header('location: ./index.php');
}

if($showPage){
?>
<link rel="stylesheet" href="../styles/profile.styles.css">
</head>
<?php
require "../pageParts/navbar.PagePart.php";
?>
<!-- 100vh div-->
<!-- <div id="profileInfo" style="margin: 50px auto; width: 500px">
    <div id="f_name"></div>
    <div id="l_name"></div>
    <div id="email"></div>
    <a href="#">Change Email</a>
    <div id="phone"></div>
    <a href="#">Change Phone Number</a>
</div> -->


</div>
<div class="card col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
  <div class="card-body">
    <div class="row">
      <span class="col-6">First Name: </span>
      <span class="col-6" id="firstName"></span>
    </div>
    <div class="row">
      <span class="col-6">Last Name: </span>
      <span class="col-6" id="lastName"></span>
    </div>
    <div class="row">
      <span class="col-6">Email: </span>
      <span class="col-6" id="emailSpan"></span>
    </div>
    <div class="row">
      <span class="col-6">Phone: </span>
      <span class="col-6" id="phoneSpan"></span>
    </div>
    <div class="row">
      <button type="button" class="btn btn-primary col-6" data-bs-toggle="modal" id="modalBTN" data-bs-target="#exampleModal">
        Change User info
      </button>
      <button type="button" class="btn btn-primary col-6" data-bs-toggle="modal" id="modalBTN" data-bs-target="#changePasswordModal">
        Change Password
      </button>
    </div>
  </div>
</div>





<div id="ReservationsWrapper">
  <h1 class="text-center m-5" >Your Reservations</h1>
  <div class="m-auto" style="width: fit-content;">
    <button id="reservationsPastButton"  class="btn btn-secondary btn-lg">Past Reservations</button>
    <button id="reservationsButton" class="btn btn-secondary btn-lg">Current Reservations</button>
  </div>

  <div id="ReservationsPast" class="Reservations" style="display: none;">
  </div>
  <div id="Reservations" class="Reservations" style="display: grid;">
  </div>
</div>

<!-- User Info Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container-fluid">
        <div class="row">
          <label class="col-6" for="f_name">First Name:</label>
          <input class="col-6" type="text" id="f_name">
        </div>
        <div class="row">
          <label class="col-6" for="l_name">Last Name:</label>
          <input class="col-6" type="text" id="l_name">
        </div>
        <div class="row">
          <label class="col-6" for="email">Email:</label>
          <input class="col-6" type="email" id="email">
        </div>
        <div class="row">
          <label class="col-6" for="phone">Phone:</label>
          <input class="col-6" type="tel" id="phone">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="saveChangesBTN" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container-fluid">
        <div class="row">
          <label class="col-6" for="np">New Password: </label>
          <input class="col-6" type="password" id="np">
        </div>
        <div class="row">
          <label class="col-6" for="rnp">Repeat New Password: </label>
          <input class="col-6" type="password" id="rnp">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="changePasswordBTN" name="changePasswordBTN" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade " id="ChangeReservation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content modal-width">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalBodyTables">
        <img id="restourantMap" src="../pictures/planRestoranaBela.png" />
        <div id="tablesWrapper"></div>
        <div id='tablesFormWrapper'>
          <?php
          if (!isset($_SESSION['email']) || $_SESSION['verified'] == 0) {
          ?>
            <a href="../pages/login.php?page=res">Log In</a>
            <hr class="hrBetween">
            <a href="../pages/signUp.php?page=res">Sign Up</a>
          <?php
          } else {
          ?>
            <h2>Select Date and Time</h2>
            <?php
            $endDateTime = strtotime("+1 month");
            $startDateTime = strtotime("+1 day");
            $endDate = date("Y-m-d", $endDateTime);
            $startDate = date("Y-m-d", $startDateTime);
            ?>
            <input id="date" type="date" min="<?php echo $startDate ?>" max="<?php echo $endDate ?>">
            <select name="startReservation" id="startReservation">
              <?php
              echo "<option selected>-</option>";
              for ($h = 8; $h < 23; $h++) {
                for ($m = 0; $m < 60; $m += 15) {
                  if ($h < 10) {
                    if ($m < 10) {
                      echo "<option>0$h:0$m</option>";
                    } else {
                      echo "<option>0$h:$m</option>";
                    }
                  } else {
                    if ($m < 10) {
                      echo "<option>$h:0$m</option>";
                    } else {
                      echo "<option>$h:$m</option>";
                    }
                  }
                }
              }
              ?>
            </select>
            <select name="endReservation" id="endReservation">
              <option value="">-</option>
            </select>
            <select name="SelectSeat" id="SelectSeat"></select>
            <p id="TableComment"></p>
            <p id="numberOfSeats"></p>
            <button id="reserveButton" class="btn btn-primary">Reserve Your Table</button>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
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
</div>


</div> <!-- EVERYTHING DIV-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../javascript/getProfileInfo.script.js"></script>
<script src="../javascript/tablePositionProfile.script.js"></script>
<script src="../javascript/reserveButtonProfile.script.js"></script>
<script src="../javascript/fillOptionsTables.script.js"></script>
</body>

</html>
<?php
}