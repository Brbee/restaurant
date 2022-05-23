<?php
require "../pageParts/head.PagePart.php";
if(isset($_SESSION['id'])){
  if($_SESSION['role'] == 2 || $_SESSION['verified'] == 1){
    $showAdmin = true;
  }else{
    header('location: ./index.php');
  }
}else{
  header('location: ./index.php');
}

if($showAdmin){
  ?>
  <link rel="stylesheet" href="../styles/admin.styles.css">
  </head>
  <?php
  require "../pageParts/navbar.PagePart.php";
  ?>
  
  </div><!-- div za 100vh sekciju-->
  <div id="buttonWrapper">
      <br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modalBtnTables" data-bs-target="#adminModalTables">Tables</button>
      <br>
  
  <div class="modal fade " id="adminModalTables" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <select name="tableid" id="tableSelect"></select>
              <div><span>Table Id: </span><input type="text" id="tableIdInput" readonly></div>
              <div><span>Table position (X): </span><input type="text" id="tablePosX"></div>
              <div><span>Table position (Y): </span><input type="text" id="tablePosY"></div>
              <div><span>Number of seats: </span><input type="text" id="tableNumSeats"></div>
              <div><span>Table size: </span><input type="text" id="tableSize"></div>
              <div><span>Table rotation: </span><input type="text" id="tableRotate"></div>
              <div><span>About table: </span><input type="text" id="aboutTable"></div>
              <button class="btn btn-primary" id="applyButtonTables">Apply</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  
  <br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modalBtnTables" data-bs-target="#adminModalTablesAdd">Add/Remove Tables</button>
      <br>
  
      <div class="modal fade " id="adminModalTablesAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content modal-width">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalBodyTablesAdd">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="AddNewTable">Add Table</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
          
  
      <br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modalBtnTables" data-bs-target="#adminModalReservations">Reservations</button>
      <br>
      <div class="modal fade " id="adminModalReservations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content modal-width">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalBodyReservations">
          <div class="searchReservation">
            <div>
              <button id="resetDateButton">Reset date</button>
              <input type="date" id="dateReservation">
            </div>
            <input type="text" id="stringRestaurantSearch">
          </div>
          <div id="reservationSearchRes"></div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  
    <br>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="modalBtnWorkers" data-bs-target="#adminModalWorkers">Workers</button>
      <br>
      <?php
              if(isset($_GET['success']))
              {
                if($_GET['success'] == true){
                  echo "<p style='color: green'>Successfully updated worker info</p>";
                }
                else {
                  echo "<p style='color: red'>Something went wrong</p>";
                }
              }

              if(isset($_GET['DeleteTable'])) {
                if($_GET['DeleteTable'] == 'false') {
                  echo "<p style='color: red'>Something went wrong! Failed to delete table</p>";
                }
              }
            ?>
  
    <div class="modal fade " id="adminModalWorkers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content modal-width">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modalBodyWorkers">
          <button id="addWorkersButton" class="btn btn-danger">Add Workers</button>
          <table id="workers" style="display:block !important"></table>
          </div>
          <div id="addWorkers" style="display: none;">
          <div class="loginSectionWrapper">
                  <div class="loginSection">
                      <h2>Add worker</h2>
                      <input id="email" type="text" name="email" placeholder="email">
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
                      <button id="addWorkerButton">Create New Worker</button>
                      <br>
                      <span id="errorMessage" ></span>
                  </div>
              </div>
          </div>
          <div id="updateWorker" style="display: none; margin: 0 auto">
            <h2>Update Worker</h2>
            <input type="text" id="firstName" name="firstName">
            <br>
            <input type="text" id="lastName" name="lastName">
            <br>
            <input type="text" name="telephone" id="telephone">
            <br>
            <input type="text" name="e-mail" id="e-mail">
            <br>
            <input type="text" readonly name="user_id" id="user_id">
            <br>
            <button id="updateWorkerBTN">Update Worker Info</button>
            <br>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  
  
  </div>
  </div>
  <!--div sa everything wrapper -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../javascript/admin/tablePositionAdmin.js" ></script>
  <script src="../javascript/admin/addAndRemoveTables.script.js" ></script>
  <script src="../javascript/admin/reservationsAdmin.script.js" ></script>
  <script src="../javascript/admin/workersAdmin.script.js" ></script>
  <script src="../javascript/admin/addWorkerAdmin.script.js" ></script>
  </body>
  
  </html>

  <?php
} 
