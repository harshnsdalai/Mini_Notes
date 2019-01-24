<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
session_destroy();
if (array_key_exists("id",$_COOKIE)){
    setcookie("id","",time()-60*60);
    
    

    
}
echo "<script>window.location.href='index.php'</script>";
?>