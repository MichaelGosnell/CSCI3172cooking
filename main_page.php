<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>
    <div id="headerImage" class="container p-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid rounded" src="images/fruit_background.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid rounded" src="images/fruit_background.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid rounded" src="images/fruit_background.jpg" alt="Third slide">
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
    <div id="middle" class="container p-3">
        <hr>
        <div class="row">
            <div id="middle_left_div" class="col-md p-3">
                <img class="img-fluid rounded" alt="Fruit" src="images/blueberry.jpeg" />
            </div>
            <div id="middle_right_div" class="col-sm p-3">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquet dignissim congue. Aliquam ultrices pellentesque dui sit amet finibus. Praesent a suscipit dolor. Nullam at odio sed risus ultricies faucibus eget et sapien. Ut et justo
                    felis. </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquet dignissim congue. Aliquam ultrices pellentesque dui sit amet finibus. Praesent a suscipit dolor. Nullam at odio sed risus ultricies faucibus eget et sapien. Ut et justo
                    felis. </p>
            </div>
        </div>
        <hr><br>
        <h2>Recommendation</h2>
        <?php display_recommendation(); ?>
    </div>
<?php include "includes/footer.php" ?>
