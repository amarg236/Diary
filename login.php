<?php
  require('config/config.php');

 ?>
<!DOCTYPE html>
<html lang="en">


  <?php require('header.php'); ?>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Write Diary</a>
        <!-- <a class="btn btn-primary" href="#">Sign In</a> -->
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      ?>
        <a class="btn btn-outline-info" href="#"><?php echo $_SESSION['email']; ?></a>
        <form class="" action="" name="signOut" method="post">

             <button type="submit" class="btn btn-md btn-outline-info" name="signOut"> Sign Out </button>

        </form>
            <?php } ?>


      </div>
    </nav>

<?php
  sign_out();
 ?>




    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h2 class="text-warning mb-4">Sign In</h2>

          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">

            <?php
            if(isset($_POST['submit'])) {
                  // username and password sent from form
                  echo "I was execute";
                   //$email = $_POST['email'];
                  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //Sanitize email

                  $check_database_query = mysqli_query($con, "SELECT * FROM usertable WHERE email = '$email'");

                   $row = mysqli_fetch_array($check_database_query);

                   if(isset($row) && (md5($_POST['password']) == $row['password']))
                  {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email; // store email into session variable
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['name'] = $row['fullName'];
                    echo "<p>Redirecting ...</p>";
                    sleep(5);
                    header("Location: index.php");

                  }
                  else{
                    echo "There was error";
                    //header("Location: login.php");
                  }
               }
            ?>

            <form name="login" method="post" action="">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="email">
                  </div>
                  <div class="form-group" >
                    <input type="password" name="password" class="form-control" placeholder="password">
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-block btn-lg btn-primary" placeholder="Sign In">
                      Sign In
                    </button>
                  </div>
            </form>



          </div>
        </div>
      </div>
    </section>





    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class=" text-center alert alert-info alert-dismissible fade show" role="alert">
          <strong>Thank you visiting this page.</strong> <br> <strong>email:</strong> name@domain.com  &nbsp; <strong>password:</strong> password
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">

            <p class="text-muted small mb-4 mb-lg-0">Project By : <a href="http://sonamgurung.me/" class="text-primary"> Sonam Gurung</a></p> </p>
          </div>

          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
