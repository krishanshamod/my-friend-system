<?php include "database.php"; ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Friend System - Add Friends</title>
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
    
    <?php  
    session_start();
    $email = $_SESSION['s_email'];
    $name = $_SESSION['s_name'];
    
    // Adding new friends to database
    if(isset($_REQUEST['addfriend'])){
        $addfriendemail = $_REQUEST['addfriendemail'];

        $sql_addfriend = "INSERT INTO friends values('$email','$addfriendemail')";
        
        $result3 = $link->query($sql_addfriend);
    }
    
    //get page number
    if(isset($_REQUEST['page'])){
        $pageno = $_REQUEST['page'];
    }
    else{
        $pageno = 1;
    }
    
    $recperpage = 5;
    
    // Getting number of users who are not friends yet 
    $sql_notfriends = "SELECT * FROM users WHERE email NOT IN (SELECT email2 FROM friends WHERE email1='$email' UNION SELECT email1 FROM friends WHERE email2='$email') AND email!='$email'";
    
    $result1 = $link->query($sql_notfriends);
    $last_page=ceil(($result1->num_rows)/$recperpage);
    
    //calculate next page starting number
    if($pageno == 1){
        $pagestart = 0;
    }
    else{
        $pagestart = ($pageno-1) * $recperpage;
    }
    
    // Getting list of users who are not friends yet 
    $sql_notfriends = "SELECT * FROM users WHERE email NOT IN (SELECT email2 FROM friends WHERE email1='$email' UNION SELECT email1 FROM friends WHERE email2='$email') AND email!='$email' limit ".$pagestart.",".$recperpage;
    
    $result1 = $link->query($sql_notfriends);
    
    //Getting list of users who are friends
    $sql_friends = "SELECT * FROM users WHERE email IN (SELECT email2 FROM friends WHERE email1='$email' UNION SELECT email1 FROM friends WHERE email2='$email') AND email!='$email'";
    
    $result4 = $link->query($sql_friends);
    
    //Getting number of friends
    $friendsnumber = $result4->num_rows;
    
    ?>
    
    <div align="center" >
    <h1>My Friend System</h1>
    <h4><?php echo $name ?>'s Add Friend Page <br> Total number of friends is <?php echo $friendsnumber ?></h4>
    

    <table width="400" border="1">
      <tbody>
          <?php while($row = $result1->fetch_array()){ ?>
            <tr>
              <!--Name-->
              <td><?php echo $row['name'] ?>&nbsp;</td>

              <!--Number of mutual friends-->
              <td><?php 

                    $friendemail = $row['email'];

                    $sql_mutual = "SELECT * FROM users WHERE email IN (SELECT email2 FROM friends WHERE email1='$friendemail' UNION SELECT email1 FROM friends WHERE email2 = '$friendemail') AND email != '$friendemail'";

                    $result2 = $link->query($sql_mutual);

                    echo $result2->num_rows." mutual friends";                                                           
                  ?>&nbsp;</td>

              <!--Add friend-->
              <td><form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                      <input type="submit" name="addfriend" value="Add as friend" >
                      <input type="hidden" name="addfriendemail" value="<?php echo $row['email'] ?>" >
                  </form>
                &nbsp; </td>

            </tr>
          <?php } ?>
      </tbody>
    </table>
    <table width="400" border="0">
      <tbody>
        <tr>
          <td><?php if($pageno>1){ ?>   
                <a href="AddFriends.php?page=<?php echo $pageno-1 ?>" > Previous </a> 
              <?php } ?> &nbsp;</td>
          <td> &emsp; &emsp; &emsp; &emsp; </td>
          <td><?php if($pageno<$last_page){ ?>   
                <a href="AddFriends.php?page=<?php echo $pageno+1 ?>" > Next </a> 
              <?php } ?> &nbsp;</td>
        </tr>
        <tr>
          <td> <a href="FriendList.php" > Friend List </a> &nbsp; </td>
          <td> &emsp; &emsp; &emsp; &emsp; </td>
          <td> <a href="HomePage.php" > Log out </a> &nbsp; </td>
        </tr>
      </tbody>
    </table>
    </div>
   
</body>
</html>