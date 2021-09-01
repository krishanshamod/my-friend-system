<?php include "database.php"; ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Friend System - Friend List</title>
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
    if(isset($_REQUEST['unfriend'])){
        $unfriendemail = $_REQUEST['unfriendemail'];

        $sql_unfriend = "DELETE FROM friends WHERE (email1='$email' AND email2='$unfriendemail') OR (email1='$unfriendemail' AND email2='$email')";
        
        $result3 = $link->query($sql_unfriend);
    }
    
    //get page number
    if(isset($_REQUEST['page'])){
        $pageno = $_REQUEST['page'];
    }
    else{
        $pageno = 1;
    }
    
    $recperpage = 5;
    
    // Getting number of friends
    $sql_friends = "SELECT * FROM users WHERE email IN (SELECT email2 FROM friends WHERE email1='$email' UNION SELECT email1 FROM friends WHERE email2='$email') AND email!='$email'";
    
    $result1 = $link->query($sql_friends);
    $last_page=ceil(($result1->num_rows)/$recperpage);
    
    //Getting number of friends
    $friendsnumber = $result1->num_rows;
    
    //calculate next page starting number
    if($pageno == 1){
        $pagestart = 0;
    }
    else{
        $pagestart = ($pageno-1) * $recperpage;
    }
    
    // Getting list of friends
    $sql_friends = "SELECT * FROM users WHERE email IN (SELECT email2 FROM friends WHERE email1='$email' UNION SELECT email1 FROM friends WHERE email2='$email') AND email!='$email' limit ".$pagestart.",".$recperpage;
    
    $result1 = $link->query($sql_friends);
        
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

              <!--Add friend-->
              <td><form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                      <input type="submit" name="unfriend" value="Unfriend" >
                      <input type="hidden" name="unfriendemail" value="<?php echo $row['email'] ?>" >
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
                <a href="FriendList.php?page=<?php echo $pageno-1 ?>" > Previous </a> 
              <?php } ?> &nbsp;</td>
          <td> &emsp; &emsp; &emsp; &emsp; </td>
          <td><?php if($pageno<$last_page){ ?>   
                <a href="FriendList.php?page=<?php echo $pageno+1 ?>" > Next </a> 
              <?php } ?> &nbsp;</td>
        </tr>
        <tr>
          <td> <a href="AddFriends.php" > Add Friends </a> &nbsp; </td>
          <td> &emsp; &emsp; &emsp; &emsp; </td>
          <td> <a href="HomePage.php" > Log out </a> &nbsp; </td>
        </tr>
      </tbody>
    </table>
    </div>
    
</body>
</html>