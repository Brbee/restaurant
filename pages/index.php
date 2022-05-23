<?php

require "./../pageParts/head.PagePart.php";
?>
<link rel="stylesheet" href="../styles/index.styles.css">
</head>
<?php
require "../pageParts/navbar.PagePart.php";
?>
<div class="buttonWrapper">
    <a href="./reserve.php" class="reserveButton">RESERVE</a>
</div>
</div><!-- div za 100vh sekciju-->
<div class="">

</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4 col-sm-12 d-flex justify-content-center">
            <div class="card my-5" style="width: 18rem;">
                <img class="card-img-top" src="../pictures/home.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 d-flex justify-content-center">
            <div class="card my-5" style="width: 18rem;">
                <img class="card-img-top" src="../pictures/jay-wennington-N_Y88TWmGwA-unsplash.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 d-flex justify-content-center">
            <div class="card my-5" style="width: 18rem;">
                <img class="card-img-top" src="../pictures/waitress.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

    </div>

</div>


<!--CORUSEEL-->

<div class="container-fluid px-5">
    <div class="row">
        <div class="col-auto">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../pictures/jay-wennington-N_Y88TWmGwA-unsplash.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../pictures/waitress.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../pictures/home.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>

</div>
</div>
<!--END OF CORUSEEL-->

<div class="container px-4 py-5" >
    <div class="row g-4 py-5">
        <div id="indicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#indicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#indicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#indicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#indicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#indicators" data-bs-slide-to="4" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block img-box-5 w-100 img-box" src="../pictures/jay-wennington-N_Y88TWmGwA-unsplash.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-box-5 w-100 img-box" src="../pictures/waitress.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../pictures/home.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
              <div class="img-box img-box-4">Box 4</div>
            </div>
            <div class="carousel-item">
              <div class="img-box img-box-5">Box 5</div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#indicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#indicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </div>
</div>


</div>
<!--div sa everything wrapper -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>