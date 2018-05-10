<footer class="footer m-2 rounded bg-success p-4">
    <div class="container">
        <img class="bottom_nav_title" src='images/logo.jpeg' href="#" width="130px" height="110px">
        <hr>
        <div class="row">
            <div class="col-md-4 p-3 1">
                <ul class="bottom_nav">
                    <li><a class="bottom_nav_link" href="recipe.php">Recipe</a></li>
                    <li><a class="bottom_nav_link" href="category.php">Category</a></li>
                    <li><a class="bottom_nav_link" href="search.php">Search</a></li>
                    <?php
                     if(isset($_SESSION['login_is_succesful'])){
                       if($_SESSION['login_is_succesful']){
                      ?>
                        <li><a class="bottom_nav_link" href="add.php">Add</a></li>
                        <li><a class="bottom_nav_link" href="profile.php">Profile</a></li>
                    <?php }else{ ?>
                        <li><a class="bottom_nav_link" href="login.php">Login</a></li>
                    <?php } }else{ ?>
                        <li><a class="bottom_nav_link" href="login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-4 p-3 2">
                <ul class="bottom_nav">
                    <li><a class="bottom_nav_link" href="#">Cras justo odio</a></li>
                    <li><a class="bottom_nav_link" href="#">Dapibus ac facilisis in</a></li>
                    <li><a class="bottom_nav_link" href="#">Morbi leo risus</a></li>
                    <li><a class="bottom_nav_link" href="#">Porta ac consectetur ac</a></li>
                    <li><a class="bottom_nav_link" href="#">Vestibulum at eros</a></li>
                </ul>
            </div>
            <div class="col-md-4 p-3 3">
                <ul class="bottom_nav">
                    <li><a class="bottom_nav_link" href="#">About</a></li>
                    <li><a class="bottom_nav_link" href="#">Blog</a></li>
                    <li><a class="bottom_nav_link" href="#">Contact</a></li>
                    <li><a class="bottom_nav_link" href="#">Follow</a></li>
                </ul>
            </div>
        </div>
        <hr>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link  text-white active" href="#">Cookies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white active" href="#">Privacy Statement</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white active" href="#">Terms of Use</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  text-white active" href="#">Sing in</a>
            </li>
        </ul>
        <p class="copyright">&copy; 2017 CollegeCooking.com CSCI 3172 Project</p>
    </div>
</footer>

<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
