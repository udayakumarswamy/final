<?php
include 'db.php';

if(isset($_POST['submit_order'])) {
  $first_name = strip_tags($_POST['first_name']);
  $last_name = strip_tags($_POST['last_name']);
  $menu_item = strip_tags($_POST['menu_item']);
  $quantity = strip_tags($_POST['quantity']);
  $email = strip_tags($_POST['email']);
  $mobile = strip_tags($_POST['mobile']);

  $card_name = strip_tags($_POST['card_name']);
  $card_number = strip_tags($_POST['card_number']);
  $expiry_month = strip_tags($_POST['expiry_month']);
  $expiry_year = strip_tags($_POST['expiry_year']);
  $expiry_date = $expiry_month.'/'.$expiry_year;

  $sql = "INSERT INTO tbl_orders (`first_name`, `last_name`, `menu_id`, `quantity`, `email`, `mobile`, `order_status`, `createdOn`) VALUES ('$first_name', '$last_name', '$menu_item', '$quantity', '$email', '$mobile', '1', now())";
  $result = mysql_query($sql);
  $order_id = mysql_insert_id();

  $sql = "INSERT INTO tbl_payments (`order_id`, `card_name`, `card_number`, `expiry_date`, `payment_status`, `createdOn`) VALUES ('$order_id', '$card_name', '$card_number', '$expiry_date', '1', now())";
  $result = mysql_query($sql);
  $payment_id = mysql_insert_id();
}

$items = array();
$sql = "SELECT * FROM tbl_menu WHERE item_status = '1'";
$result = mysql_query($sql);
if(mysql_num_rows($result)) {
    while ($row = mysql_fetch_assoc($result)) {
        $items[] = array(
            'id' => $row['item_id'], 
            'name' => $row['item_name'] 
        );
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order Now</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="index.php">The</span> Restaurant</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="about.php">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="menu.php">Menu</a>
                    </li>
                    <li>
                        <a class="page-scroll act" href="order.php">Order Now</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- About Section -->
    <section id="order" class="container content-section">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
               <img src="img/order.png" width="100">
                <h2>Order Your Menu</h2>
                <div>
                  <?php
                  if(isset($order_id) && isset($payment_id)) {
                    echo "Your order successfully placed.";
                  }
                  ?>
                </div>
                <form action="" method="post" onsubmit="return validate();">
              <div class='form-row'>
              <div class='col-md-6 form-group text-left'>
                <label class='control-label'>First Name</label>
                <input autocomplete='off' class='form-control' size='20' type='text' required="required" name="first_name" id="first_name">
              </div>
                    
            </div>
            <div class='form-row'>
              <div class='col-md-6 form-group text-left'>
                  <label class='control-label'>Last Name</label>
                <input autocomplete='off' class='form-control' size='20' type='text'  required="required" name="last_name" id="last_name">
              </div>
            </div>
             <div class='form-row'>
              <div class='col-md-6 form-group text-left'>
                <label class='control-label'>Type of Food</label>
                <select  required="required" name="menu_item" id="menu_item">
                  <option value="">--Select Food Type--</option> 
                  <?php foreach ($items as $key => $item): ?>
                  <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option> 
                  <?php endforeach; ?>
                </select>
              </div>
              <div class='col-md-6 form-group text-left'>
                <label class='control-label'>Quantity</label>
                <select  required="required" name="quantity" id="quantity">
                  <option value="Select Quantity">Quantity</option> 
                  <option value="1">1</option> 
                  <option value="2">2</option> 
                  <option value="3">3</option> 
                  <option value="4">4</option> 
                </select>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-6 form-group text-left'>
                <label class='control-label'>Email Address</label>
                <input autocomplete='off' class='form-control' size='20' type='email' required="required" name="email" id="email">
              </div>
              <div class='col-md-6 form-group text-left'>
                <label class='control-label'>Mobile Number</label>
                <input autocomplete='off' class='form-control' size='20' type='text' required="required" name="mobile" id="mobile">
              </div>
            </div>
            <h2>Payment Info</h2>
            <div class='form-row'>
              <div class='col-md-6 form-group text-left'>
                <label class='control-label'>Name on Card</label>
                <input autocomplete='off' class='form-control' size='20' type='text' required="required" name="card_name" id="card_name">
              </div>
              <div class='col-md-6 form-group text-left'>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control' size='20' type='text' required="required" name="card_number" id="card_number">
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-6 form-group text-left'>
                <label class='control-label'>Expiration Date</label>
                <select requried="requried" name="expiry_month" id="expiry_month">
                  <option value="">--Month--</option>
                  <?php for ($i=1; $i <= 12; $i++) { 
                    ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                    
                    <?php
                  } ?>
                </select>
                <select requried="requried" name="expiry_year" id="expiry_year">
                  <option value="">--Year--</option>
                  <?php for ($i=2015; $i <= 2020; $i++) { 
                    ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                    
                    <?php
                  } ?>
                </select>
              </div>
            </div>
           <div class='form-row text-center'>
              <input value="Submit Order" class='btn btn-default btn-lg' size='20' type='submit' name="submit_order" id="submit_order">
            </div>
       </div>
        </div>
        </form>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>what makes us special ?</h2>
                    <p>Check out the List of varieties available with us</p>
                    <a href="menu.php" class="btn btn-default btn-lg">Check Menu</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; The Restaurant 2015</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/effect.js"></script>
</body>

</html>

<script type="text/javascript">
function validate () {
  var first_name = $('#first_name').val();
  var last_name = $('#last_name').val();
  var menu_item = $('#menu_item').val();
  var quantity = $('#quantity').val();
  var email = $('#email').val();
  var mobile = $('#mobile').val();
  var card_name = $('#card_name').val();
  var card_number = $('#card_number').val();
  var expiry_month = $('#expiry_month').val();
  var expiry_year = $('#expiry_year').val();

  if(first_name == '' || first_name.length < 2 || !isNaN(first_name)) {
    alert('Invalid First name');
    return false;
  }
  else if(last_name == '' || last_name.length < 2 || !isNaN(last_name)) {
    alert('Invalid Last name');
    return false;
  }
  else if(mobile == '' || mobile.length > 10 || mobile.length < 10 || isNaN(mobile)) {
    alert('Invalid mobile number');
    return false;
  }
  else if(card_name == '' || card_name.length < 2 || !isNaN(card_name)) {
    alert('Invalid card name');
    return false;
  }
  else if(card_number == '' || card_number.length < 10 || isNaN(card_number)) {
    alert('Invalid card number');
    return false;
  }

}
</script>