<?php
  function sign_out()
  {

    if(isset($_POST['signOut'])) {
      echo "I was executed";
      session_unset();
      header("Location: index.php");
    }
  }


 ?>
