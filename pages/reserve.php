<?php

require "../pageParts/head.PagePart.php";
?>
<link rel="stylesheet" href="../styles/reserve.styles.css">
</head>
<?php
require "../pageParts/navbar.PagePart.php";
?>

<div id="wrapper">
    
    <img id="restourantMap" src="../pictures/planRestoranaBela.png" />
    <div id="tablesWrapper"></div>
    

    <div class="formWrapper">
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
            <select name="endReservation" id="endReservation" >
                <option value="">-</option>
            </select>
            <select name="SelectSeat" id="SelectSeat"></select>
            <p id="TableComment"></p>
            <p id="numberOfSeats"></p>
            <button id="reserveButton" class="btn btn-primary btn-lg">Reserve Your Table</button>
        <?php
        }
        ?>
    </div>
</div>




</div><!-- div za 100vh sekciju-->
</div>
<!--div sa everything wrapper -->


<!-- Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reservation Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span id="modalMessage"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Reserve more tables</button>
        <a href="./profile.php" type="button" class="btn btn-primary">My Reservations</a>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../javascript/tablePosition.js"></script>
<script src="../javascript/fillOptionsTables.script.js"></script>
<script src="../javascript/reserveButton.script.js"></script>
</body>

</html>