<?php include "database.php"; ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Friend System - Sign Up</title>
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
    <h2>Registration Page</h2>
    
    <?php
    if(isset($_REQUEST['register'])){
        
        $email = $_REQUEST['email'];
        $name = $_REQUEST['name'];
        $pass = $_REQUEST['pass'];
        $conpass = $_REQUEST['conpass'];
        
        //checking all fields are filled or not
        if(!empty($email) && !empty($name) && !empty($pass) && !empty($conpass)){
            
            //checking the password and confirmation password are same or not
            if($pass == $conpass){
                $sql = "SELECT * FROM  users";
                $result = $link->query($sql);
                $set = 1;
                
                //checking particular email is already registered or not
                while($row = $result->fetch_array()){
                    if($email == $row['email']){
                        echo "This email address is already registered!";
                        $set = 0;
                    }  
                }
                
                //Adding values to the database table and return to home page
                if($set == 1){
                    $sql = "INSERT INTO users values('$name','$email','$pass')";
                    $result = $link->query($sql);
                    header("Location: HomePage.php");
                }            
            }
            else{
                echo "Confirmation password is not correct!";
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
              <td>Profile Name &nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="text" name="name" maxlength="30">&nbsp;</td>
            </tr>
            <tr>
              <td>Password &nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="password" name="pass" maxlength="20">&nbsp;</td>
            </tr>
            <tr>
              <td>Confirm Password &nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="password" name="conpass" maxlength="20">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input type="submit" name="register" value="Register">&nbsp;<input type="submit" name="clear" value="Clear"></td>
            </tr>
          </tbody>
        </table>
    </form>
    </div>
    
    
</body>
</html>