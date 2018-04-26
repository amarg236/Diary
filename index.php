<?php
  require('config/config.php');
  sign_out();
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






    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <?php
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Welcome <font color="orange"><?php echo $_SESSION["name"]; ?></font>
            <div class="form-group custom_menu">
              <button type=" submit" class="btn btn-lg btn-block btn-outline-primary" >
                <a href="user_page.php" class="nounderline text-white btn">DASHBOARD</a>
              </button>
            </div>

        </div>

        <?php
        //
        // sleep(5);
        // header("Location: user_page.php");

      } else{
         ?>
          <div class="col-xl-9 mx-auto text-center">
            <h2 class="mb-4">Write and document your day !</h2>
          </div>
          <div class="col-xl-9 mx-auto text-center">
              <a href="login.php" class=" nounderline text-white btn">
            <button type=" submit" class="text-white btn btn-block btn-sm btn-outline-info" >
              Sign In
            </button>
            </a>
          </div>

          <?php

        }
         ?>
        </div>
      </div>
    </section>





    <!-- Footer -->
    <?php require('footer.php') ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
