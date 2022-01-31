<html>
<head>
    <style>
body {background-color: powderblue;
  font-family: courier;
  width: 500px;
  padding: 100px;
  margin: 50px;
}

  </style></head>
<body>
  <form method='POST'name='f1'>
  <center><h1 style="border:10px solid pink;">BOOK INFORMATION</h3><center>
    <table align="center" >
      <tr>
        <td>ACCESSION NUMBER</td>
        <td><input type='number' name='accession'/></td></tr>
    <tr>
      <td>TITLE</td>
      <td><input type='text' name='title'/></td></tr>
      <tr>
      <td>AUTHOR</td>
      <td><input type='text' name='author'/></td></tr>
      <tr>
      <td>EDITION</td>
      <td><input type='number' name='edition'/></td></tr>
      <tr>
      <td>PUBLISHER</td>
      <td><input type='text' name='publisher'/></td></tr></table></form>
 <form name="f2" method="POST">
  <h3 align="center"><u>Search a Book</u></h3>
  <table align="center">
<tr>
  <td>Enter the Title:</td>
  <td><input type="text" name="titles"/></td>
</tr>
<tr>
<td><input type="submit" name="search" value="Search"></td>
</tr></table></form>
      
<?php
if(isset($_POST['submit']))
{
  $accession=$_POST['accession'];
  $title=$_POST['title'];
  $author=$_POST['author'];
  $edition=$_POST['edition'];
  $publisher=$_POST['publisher'];
  $conn=mysqli_connect("localhost","root","","book form");
if($conn)
{
    echo("Successfully connected");
    echo "<br>";
}
else
{
    echo("connection error");
}

    $query="INSERT INTO booktable(ACCESSION NUMBER,TITLE,AUTHOR,EDITION,PUBLISHER,)VALUES('{$accession}','{$title}','{$author}','{$edition}','{$publisher}')";
    if(mysqli_query($conn,$query))
{
    echo("successfully inserted");
    echo "<br>";
}
else
{
    echo("insertion failed");
}
}
if(isset($_POST['search']))
 {
  $conn=mysqli_connect("localhost","root","","book form");
  $titles=$_POST['titles'];
    ?>
<table border="1" align="left">
<tr>
<th>ACCESSION NUMBER</th>
<th>TITLE</th>
<th>AUTHOR</th>
<th>EDITION</th>
<th>PUBLISHER</th>
</tr>
<?php
$s="SELECT * FROM booktable WHERE title LIKE '%$titles%'";
$data=mysqli_query($conn,$s);
 
while($res=mysqli_fetch_assoc($data))
{
    ?>
   <tr>
    <td><?php echo $res['ACCESSION NUMBER'];?></td>
    <td><?php echo $res['TITLE'];?></td>
    <td><?php echo $res['AUTHOR'];?></td>
    <td><?php echo $res['EDITION'];?></td>
    <td><?php echo $res['PUBLISHER'];?></td>
</tr>


<?php
}
 }


?>
</table>
</body>
</html>