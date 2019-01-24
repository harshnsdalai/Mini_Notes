<?php

session_start();

if (array_key_exists("id",$_COOKIE)){
    
    $_SESSION["id"]=$_COOKIE["id"];
    
    /*print_r($_COOKIE);
    
    print_r($_SESSION);*/
    
    

}

if (array_key_exists("id",$_SESSION)){
    
    /*print_r($_COOKIE);
    
    print_r($_SESSION);*/
    
    $logout="<a href='logout.php' style='text-decoration: none!important;'>Log Out!</a>";
    
}
else {
    
    header("Location: index.php");
}








?>
<?php include("header.php")?>
<nav class="navbar navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#">
      Add Note
    <img class="plus" src="plus3.png" width="20" height="20" class="d-inline-block align-top" alt="">
    
  </a>
    <form class="form-inline my-2 my-lg-0">
      
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo $logout ?></button>
    </form>
</nav>




<div id="main_down"><div class="text"></div></div>


<?php include("footer.php")?>

      
      
      
      
