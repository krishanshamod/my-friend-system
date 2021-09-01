<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> My Friend System - About</title>
</head>

<body>
<h1> My Friend System </h1>
<p> This simple system is developed by Krishan Shamod Prasanna for an assignment of web application development course module. This system uses two database tables which are named as users and friends. Here's the structure of those two tables. </p>
    
<h3> users table</h3>

<table width="500" border="1">
  <tbody>
    <tr>
      <th scope="col"> Name &nbsp;</th>
      <th scope="col"> Type &nbsp;</th>
      <th scope="col"> Default Value&nbsp;</th>
      <th scope="col"> Other &nbsp;</th>
    </tr>
    <tr>
      <td> name &nbsp;</td>
      <td> varchar(30) &nbsp;</td>
      <td> NOT NULL &nbsp;</td>
      <td> - &nbsp;</td>
    </tr>
    <tr>
      <td> email &nbsp;</td>
      <td> varchar(30) &nbsp;</td>
      <td> NOT NULL &nbsp;</td>
      <td> Primary Key &nbsp;</td>
    </tr>
    <tr>
      <td> pass &nbsp;</td>
      <td> varchar(20) &nbsp;</td>
      <td> NOT NULL &nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

<h3> friends table</h3>

<table width="500" border="1">
  <tbody>
    <tr>
      <th scope="col"> Name &nbsp;</th>
      <th scope="col"> Type &nbsp;</th>
      <th scope="col"> Default Value&nbsp;</th>
      <th scope="col"> Other &nbsp;</th>
    </tr>
    <tr>
      <td> email1 &nbsp;</td>
      <td> varchar(30) &nbsp;</td>
      <td> NOT NULL &nbsp;</td>
      <td> Foreign Key &nbsp;</td>
    </tr>
    <tr>
      <td> email2 &nbsp;</td>
      <td> varchar(30) &nbsp;</td>
      <td> NOT NULL &nbsp;</td>
      <td> Foreign Key &nbsp;</td>
    </tr>
  </tbody>
</table>

</body>
</html>