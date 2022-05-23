<?php

require "../pageParts/head.PagePart.php";
?>
<link rel="stylesheet" href="../styles/worker.styles.css">
</head>
<?php
require "../pageParts/navbar.PagePart.php";
?>
</div><!-- div za 100vh sekciju-->

<!--div sa everything wrapper -->
<div class="reservationWrapper">
    <h2 class="text-center">Today's Reservations</h2>
    <div class="container-fluid d-flex align-items-center justify-items-center my-4">
        <input class="m-auto" type="text" id="stringRestaurantSearch">
    </div>
    <div id="reservationSearchRes" class="container-fluid"></div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <textarea name="commentArea" id="commentArea" cols="30" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="buttonSaveChanges">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="../javascript/worker/reservationWorker.script.js"></script>
</body>

</html>