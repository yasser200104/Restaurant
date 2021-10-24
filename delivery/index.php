
 <?php 
 include("../connexion.php");
?>



<!doctype html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>Restaurant</title>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/main.css" media="screen" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style-portfolio.css">
  <link rel="stylesheet" href="../css/picto-foundry-food.css" />
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/font-awesome.min.css" rel="stylesheet">
  <link rel="icon" href="favicon-1.ico" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- Css style  -->


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>

  <!-- navbar -->

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="row">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Restaurant</a>
          <ul> 

          
          <li><img src="..\images\lady-img.jpg" alt="Avatar" style="width: 14%;border-radius: 100%; position: relative; right: -785px; bottom: -9px;"></li>
          <li><a class="btn btn-large btn-primary logout" style="    position: relative;right: -892px;top: -28px;background-color: black;border-color: white;" href="../index.php"> 
              <i class="fa fa-sign-out" aria-hidden="true">Logout</i>
              </a>
          </li>
          </ul>
        
          <div style="width:30%;" class="bg-info rounded-circle"></div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <!-- <img class="rounded-circle" alt="100x100" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg"/> -->
        </div><!-- /.navbar-collapse -->
      </div>
    </div><!-- /.container-fluid -->
  </nav>

  <!-- Menu Table  -->

 


  <!-- Order Table  -->



<div id="orderCondition" class="container-fluid" ; style="padding: 5%; top: 67px;
                                                  position: relative;">
    <h2 style="font-family: 'Pacifico'"> Orders </h2>
    <hr/>
<div class="row">
  

        <?php 
        
          if(isset($_GET['updateOrderCondition'])) {
        
          $stmt = $pdo->query("SELECT * FROM ordering where Ono = '" . $_GET['updateOrderCondition'] . "'");
          $row = $stmt->fetch()
        ?>
          
        <form action="deliveryService.php" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="Ono" placeholder="Ono" value="<?php echo $row['Ono'] ?>">
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="Oaddress" placeholder="Oaddress" value="<?php echo $row['Oaddress'] ?>" >
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="Otime" placeholder="Otime" value="<?php echo $row['Otime'] ?>" >
		      		</div>
   		        <div class="form-group">
		      			<input type="text" class="form-control" name="Osum" placeholder="Osum" value="<?php echo $row['Osum'] ?>" >
		      		</div>
             	<div class="form-group">
		      			<input type="text" class="form-control" name="Oprice" placeholder="Oprice" value="<?php echo $row['Oprice'] ?>" >
		      		</div>
              <div class="form-group">
		      			<input type="text" class="form-control" name="Odiscount" placeholder="Odiscount" value="<?php echo $row['Odiscount'] ?>" >
		      		</div>
                  <div class="form-group">
		      			<input type="text" class="form-control" name="Ocomment" placeholder="Ocomment" value="<?php echo $row['Ocomment'] ?>" >
		      		</div>
                <div class="form-group">
		      			<input type="text" class="form-control" name="Ocondition" placeholder="Ocondition" value="<?php echo $row['Ocondition'] ?>" required>
		      		</div>
	            <div class="form-group" >
	            	<button name="EDIT_CONDITION" style="position: initial;" type="submit" class="form-control btn btn-primary submit ">UPDATE CONDITION </button>
	            </div>
	        </form>
          
        <?php 
         
        }
        
        ?>
            </div>

    <!-- delimiter -->
    <div class="row" >
      <div class="panel panel-primary filterable">
      <?php 
          include("../connexion.php");
          $stmt = $pdo->query("SELECT * FROM ordering WHERE Ocondition = '未接单'");
          echo '<table class="table">
            
            <tr class="filters">
            <th>Order Number</th>
            <th>Customer Tel</th>
            <th>Customer Address</th>
            <th>Time</th>
            <th>Total Price</th>
            <th>Paid Price</th>
            <th>Discount </th>
            <th>Ocomment </th>
            <th>Order Condition</th>
            <th>Action</th>
            </tr>';

            while ($row = $stmt->fetch()) 
            {
              echo "<tbody>";
              echo "<tr>";
              echo "<td>" . $row['Ono'] . "</td>";
              echo "<td>" . $row['Ctel'] . "</td>";
              echo "<td>" . $row['Oaddress'] . "</td>";
              echo "<td>" . $row['Otime'] . "</td>";  
              echo "<td>" . $row['Osum'] . "</td>";
              echo "<td>" . $row['Oprice'] . "</td>";                          
              echo "<td>" . $row['Odiscount'] . "</td>";
              echo "<td>" . $row['Ocomment'] . "</td>";
              echo "<td>" . $row['Ocondition'] . "</td>";           
               echo "<td>".
              "<a  class='btn btn-info btn-xs' href='index.php?updateOrderCondition=" . $row['Ono'] .  "'><span class='glyphicon glyphicon-edit'></span> Edit </a>".              
                    "</td>";
              }
              echo "</tbody>";
              echo "</table>";
        ?>
             </div>
         </div>






  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>