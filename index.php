<?php

session_start();
$error="";

/*if (array_key_exists("logout",$_GET) and $_GET["logout"]){
    
    unset($_SESSION);
    
    setcookie("id","",time()-60*60);
    
    $_COOKIE["id"]="";

}else */if((array_key_exists("id",$_COOKIE) and $_COOKIE["id"]) or (array_key_exists("id",$_SESSION) and  $_SESSION["id"])){
    
    header("Location: loged.php");
    
}

include("database_connection.php");

if (array_key_exists("email",$_POST) and (array_key_exists("password",$_POST))){
    
    $query = "select * from `users` where `email` ='".mysqli_real_escape_string($link,$_POST["email"])."'";
    
    $result=mysqli_query($link,$query);
    
    if ($_POST["sign_vs_log"]==1){
    
        if (mysqli_num_rows($result)>0){

            echo "This email is alredy registered";

        }else{

            $query = "insert into `users`(`email`,`password`) values ('".mysqli_real_escape_string($link, $_POST["email"])."','".mysqli_real_escape_string($link, $_POST["password"])."')";

            if (mysqli_query($link, $query)){

                $query = "update `users` set `password`= '".(md5(md5(mysqli_insert_id($link)).$_POST["password"]))."' where `id` = ".mysqli_insert_id($link)." limit 1";

                mysqli_query($link, $query);
                
                $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' limit 1";
                
                $result = mysqli_query($link, $query);
                
                $row = mysqli_fetch_array($result);

                $_SESSION["id"]= $row["id"];
                
                echo $row["id"];

               

                if ($_POST["keepLoggedin"]=='1'){

                    setcookie("id",$row["id"],time()+60*24*24*365);
                }
                
                header("Location: loged.php");
            }
            else{

                echo ("There was some error. Please try again later!");
            }
        }
    }
    else {
        
        $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' limit 1";
                
                    $result = mysqli_query($link, $query);
                
                    $row = mysqli_fetch_array($result);
                
                    if (isset($row)) {
                        
                        $hashedPassword = md5(md5($row['id']).$_POST['password']);
                        
                        if ($hashedPassword == $row['password']) {
                            
                            $_SESSION['id'] = $row['id'];
                            
                            if ($_POST['keepLoggedin'] == '1') {

                                setcookie("id", $row['id'], time() + 60*60*24*365);

                            } 

                            header("Location: loged.php");
                                
                        } else {
                            
                            $error .= "That email/password combination could not be found.";
                            
                        }
                        
                    } else {
                        
                        $error .= "That email/password combination could not be found.";
                        
                    }
                    
    }
}
    
?>






<?php include("header.php")?>





    
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
        <h1>Keep Note</h1>
        
        <h5>Keep your thoughts and note arranged here!</h5>
        <div><?php if (($error)!=""){
    echo "<div class='alert alert-danger'>".$error."</div>";
}  ?></div>
        
        
        <form method="post" class="signup">
            <div>Hurry and join to save yours thought.</div>
  <div class="form-group">
    
    <input type="email" class="form-control" name="email" placeholder="Email" required>
    
  </div>
  <div class="form-group">
    
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
  <div class="form-check">
    <input type="checkbox" name="keepLoggedin" value=1 class="form-check-input" >
    <label class="form-check-label" for="keeploggedin">Stay logged</label>
  </div>
<input type="hidden" name="sign_vs_log" value="1">
  <button type="submit" name="submit" value= "Sign up" class="btn btn-primary">Sign Up</button>
            <div><a class="toggleforms">Log In</a></div>
</form>
    
        
        <form method="post" class="login">
            <div>Log in if you already had account.</div>
  <div class="form-group">
    
    <input type="email" class="form-control" name="email" placeholder="Email" required>
    
  </div>
  <div class="form-group">
    
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
  <div class="form-check">
    <input type="checkbox" name="keepLoggedin" value=1 class="form-check-input" >
    <label class="form-check-label" for="keeploggedin">Stay logged</label>
  </div>
<input type="hidden" name="sign_vs_log" value="0">
            <div class="form-check">
  <button type="submit" name="submit" value= "Log in" class="btn btn-primary">Log in</button>
            </div>
            <div>
            <a class="toggleforms">Sign Up</a></div>
</form>
            </div>
            <div class="col-md-3"></div>
    </div>
        </div>

<?php include("footer.php")?> 