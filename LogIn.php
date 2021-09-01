<?php include "database.php"; ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Friend System - Log In</title>
<style>
div {
  width: 400px;
  padding: 10px;
  border: 5px solid gray;
  margin: 0;
}
</style>
</head>

<body>    
    <div align="center" >
    <h1>My Friend System</h1>
    <h2>Log In Page</h2>
    
    <?php
    session_start();
    
    if(isset($_REQUEST['login'])){
        
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['pass'];
        
        //checking all fields are filled or not
        if(!empty($email) && !empty($pass)){
            $sql = "SELECT name,pass FROM users WHERE email='$email'";
            $result = $link->query($sql);
            $res = $result->fetch_assoc();
            
            //check the particular email is available in the database or not
            if(isset($res['pass'])){
                $password = $res['pass'];
                
                //checking password is correct or not
                if($pass == $password){
                    $_SESSION['s_email'] = $email;
                    $_SESSION['s_name'] = $res['name'];
                    header("Location: FriendList.php");
                }
                else{
                    echo "Password is incorrect!";
                }    
            }
            else{
                echo "Email is incorrect!";
            }            
        }
        else{
            echo "Please fill all fields!";
        }
    }      
    ?>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <table width="400" border="0">
          <tbody>
            <tr>
              <td>Email &nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="text" name="email" maxlength="30">&nbsp;</td>
            </tr>
            <tr>
              <td>Password &nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="password" name="pass" maxlength="20">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="login" value="Log In">&nbsp;<input type="submit" name="clear" value="Clear"></td>
            </tr>
          </tbody>
        </table>
    </form>
    </div>
        
</body>
</html>