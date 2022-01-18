
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $quantity = $cost = "";
$name_err = $quantity_err = $cost_err = "";
$item_added_success = "";

$query = "SELECT * from items_on_sale";
$result = mysqli_query($link, $query);




 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate item name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter item name.";
    } else{
        $name = trim($_POST["name"]);
    }
    
    // Validate quantity
    if(empty(trim($_POST["quantity"]))){
        $quantity_err = "Please enter quantity.";     
    }  else{
        $quantity = trim($_POST["quantity"]);
    }

     // Validate quantity
    if(empty(trim($_POST["cost"]))){
        $cost_err = "Please enter quantity.";     
    }  else{
        $cost = trim($_POST["cost"]);
    }
    
  
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($quantity_err) && empty($cost_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO items_on_sale (name, quantity, cost) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_quantity, $param_cost);
            
            // Set parameters
            $param_name = $name;
            $param_quantity = floatval($quantity);
            $param_cost = floatval($cost);

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                 $item_added_success = "Item has been added successfully";
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>items</title>
	<link rel="stylesheet" type="text/css" href="notice.css">
</head>
<body>



<div class="form">
     <h1 class="items">Enter items availbe for sell</h1>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
 	<div class="jovic2">
 	 <label class="form-label">Item</label>
     <input type="text" name="name" placeholder="item name">
 </div>
     <span class="invalid-feedback"><?php echo $name_err; ?></span>


<br/>
 <div>
     <label class="form-label">Quatity</label>
     <input type="" name="quantity" placeholder="how many are they">
     </div>
     <span class="invalid-feedback"><?php echo $quantity_err; ?></span>


<br/>
 <div>
     <label class="form-label">cost</label>
     <input type="text" name="cost" placeholder="item price">
</div>
     <span class="invalid-feedback"><?php echo $cost_err; ?></span>


<br/>
      <div class="form-group">
                <input type="submit" class="btn-primary" value="Submit">
                <input type="reset" class="btn-secondary ml-2" value="Reset">
            </div>
  <span class="success"><?php echo $item_added_success; ?></span>

 </form>
 </div>

<a href="public.php"> See all items on sale</a>


</body>
</html>