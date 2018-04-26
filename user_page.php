<?php
  require('config/config.php');

  // function sign_out()
  // {
  //   session_unset();
  //   header("Location: index.php");
  //   exit;
  // }

 ?>

<!DOCTYPE html>
<html lang="en">

  <?php require('header.php'); ?>
  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Write Diary</a>
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
      $post_date = date_create()->format('Y-m-d');
      if(isset($_POST['submit_diary'])){
        $sql = "INSERT INTO post (post_date, post_title, post_content)
        VALUES ('$post_date','".$_POST["post_title"]."','".$_POST["post_content"]."')";
        if (mysqli_query($con, $sql))
        {
          ?>
          <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Great!</strong> Your day has been saved.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
        }
}

     ?>


    <!-- Call to Action -->
    <form name="submit_diary" action="" method="post">


    <section class="call-to-action text-white text-center">
      <div class="form-group">
        <h3>Write your diary.....</h3>
      </div>
      <div class="container form-group">
        <input type="text" class="form-control" name="post_title" placeholder="Post Title">
        <br>
        <textarea rows="10" cols="40" name="post_content" class="txt_editor form-control" placeholder="Write your day here..."></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn  btn-lg btn-success" name="submit_diary">

          Submit

        </button>
      </div>
    </section>
  </form>

<section class="container">
  <div class="articles_section row">
    <div class="col-lg">
      <h3 class="text-center text-dark">Latest updates</h3>
      <hr>

        <?php

        $sql = "SELECT * FROM post";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>

      <div class="row">
                <div class="well">
                		<div class="media-body">
                      <ul class="list-inline list-unstyled">
                        <li>
                          <span>
                            <i class="font-weight-light glyphicon glyphicon-calendar">
                             <?php echo $row["post_date"]; ?>
                            </i>
                          </span>
                        </li>
                      </ul>
                  		<h4 class="media-heading">
                        <?php echo $row["post_title"] ?>
                      </h4>
                      <p><?php echo $row["post_content"] ?>
                      </p>

                     </div>
                </div>
      </div>
                <hr>

                <?php

            }
        } else {
            echo "<p>0 results</p>";
        }
         ?>









      </div>
    </div>
  </div>
</section>


<!--  Here i deleted the middle part-->








    <?php require('footer.php') ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
