<?php
	
// Include config file
require_once "config.php";

$query = "SELECT * from items_on_sale";
$result = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> public</title>
	<script type="text/javascript">
		
// let name;
//  name = window.prompt("please enter your email");


	</script>
</head>
<body>
 <div>
<table>
<thead>
    <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
</thead>

<tbody>
    <?php
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
        ?>
        <tr>
            <td><?= $row['name'] ?></td>
             <td><?= $row['quantity'] ?></td>
              <td><?= $row['cost'] ?></td>
          </tr>
 <?php
    }
    ?>
</tbody>

</table>

<a href="form.php"> Add item</a>
</div>

</body>
</html>