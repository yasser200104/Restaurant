<!doctype html>
<html lang="en">

<?php 
           include("../connexion.php");
?>
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
  <link rel="stylesheet" href="./css/merchant.css">

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
          <a class="navbar-brand" >Restaurant</a>
          <ul> 

          
<li><img src="..\images\lady-img.jpg" alt="Avatar" style="width: 14%;border-radius: 100%; position: relative; right: -785px; bottom: -9px;"></li>
<li><a class="btn btn-large btn-primary logout" style="    position: relative;right: -892px;top: -28px;background-color: black;border-color: white;" href="../index.php"> 
    <i class="fa fa-sign-out" aria-hidden="true">Logout</i>
    </a>
</li>
</ul>
          
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <!-- <img class="rounded-circle" alt="100x100" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg"/> -->
        </div><!-- /.navbar-collapse -->
      </div>
    </div><!-- /.container-fluid -->
  </nav>


  <!-- Menu table  -->
  <div id="Menu" class="container-fluid" ; style="padding: 5%; top: 67px;
                                                  position: relative;">
    <h2 style="font-family: 'Pacifico'"> Menu  </h2>
    <hr/>
<div class="row">
  
<?php 
        
        if(!isset($_GET['updateMenu'])) {
        
        ?>
          <fieldset style="padding: 30px; border: 1px groove #ddd !important;">
  
            <form action="merchantService.php" class="signin-form" method="post">
                        <div class="form-group">
                          <input type="text" class="form-control" name="menu" placeholder="menu" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="cost" placeholder="cost" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="price" placeholder="price" required>
                        </div>
                        
                          <button name="ADD_MENU" style="    top: 7px;
    position: relative;
    width: 300px;
    left: 400px;
}" type="submit" class="form-control btn btn-primary submit ">ADD MENU</button>
                       
                    </form>
          </fieldset>
       <br/><br/>

        <?php 
        
         } if(isset($_GET['updateMenu'])) {
        
          $stmt = $pdo->query("SELECT * FROM Menu where Mname = '" . $_GET['updateMenu'] . "'");
          $row = $stmt->fetch()
        ?>
          
        <form action="merchantService.php" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="menu" placeholder="menu" value="<?php echo $row['Mname'] ?>">
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="cost" placeholder="cost" value="<?php echo $row['Mcost'] ?>" required>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="price" placeholder="price" value="<?php echo $row['Mprice'] ?>" required>
		      		</div>
	            <div class="form-group" >
	            	<button name="EDIT_MENU" style="position: initial;" type="submit" class="form-control btn btn-primary submit ">UPDATE MENU</button>
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
          $stmt = $pdo->query("SELECT * FROM Menu");
          echo '<table class="table">
            
            <tr class="filters">
            <th>Menu</th>
            <th>Cost </th>
            <th>Price</th>
            
            </tr>';

            while ($row = $stmt->fetch()) 
            {
              echo "<tbody>";
              echo "<tr>";
              echo "<td>" . $row['Mname'] . "</td>";
              echo "<td>" . $row['Mcost'] . "</td>";
              echo "<td>" . $row['Mprice'] . "</td>";
                       
              echo "<td>".
              "<a  class='btn btn-info btn-xs' href='index.php?updateMenu=" . $row['Mname'] .  "'><span class='glyphicon glyphicon-edit'></span> Edit </a> ".
              "<a  class='btn btn-info btn-xs' href='merchantService.php?deleteMenu=" . $row['Mname'] .  "'><span class='glyphicon glyphicon-edit '></span> Delete </a>".
              "</td>";
              
             
           
             
              echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
        ?>       
      </div>
    </div>
            </div>
  <!-- Order Table start  -->

  <!-- Order Table end   -->



 


  <!-- Membership Table  -->
  <div id="Membership" class="container-fluid" ; style="padding: 5%; top: 67px;
                                                  position: relative;">
    <h2 style="font-family: 'Pacifico'"> Membership </h2>
    <hr/>
<div class="row">
  
<?php 
        
        if(!isset($_GET['updateMembership'])) {
        
        ?>
          <fieldset style="padding: 30px; border: 1px groove #ddd !important;">
  
            <form action="merchantService.php" class="signin-form" method="post">  
                        <div class="form-group">
                          <input type="text" class="form-control" name="Ctel" placeholder="Ctel" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="Cmoney" placeholder="Cmoney" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="Ccheck" placeholder="Ccheck" required>
                        </div>
                        
                          <button name="ADD_MEMBER" style="    top: 7px;
    position: relative;
    width: 300px;
    left: 400px;
}" type="submit" class="form-control btn btn-primary submit ">ADD VIP MEMBER</button>
                       
                    </form>
          </fieldset>
       <br/><br/>

        <?php 
        
         } if(isset($_GET['updateMembership'])) {
        
          $stmt = $pdo->query("SELECT * FROM vip where Ctel = '" . $_GET['updateMembership'] . "'");
          $row = $stmt->fetch()
        ?>
          
        <form action="merchantService.php" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="Ctel" placeholder="Ctel" value="<?php echo $row['Ctel'] ?>">
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="Cmoney" placeholder="Cmoney" value="<?php echo $row['Cmoney'] ?>" required>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="Ccheck" placeholder="Ccheck" value="<?php echo $row['Ccheck'] ?>" required>
		      		</div>
	            <div class="form-group" >
	            	<button name="EDIT_MEMBER" style="position: initial;" type="submit" class="form-control btn btn-primary submit ">UPDATE MEMBERSHIP</button>
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
          $stmt = $pdo->query("SELECT * FROM vip");
          echo '<table class="table">
            
            <tr class="filters">
            <th>Customer tel</th>
            <th>Money</th>
            <th>Check</th>
            
            </tr>';

            while ($row = $stmt->fetch()) 
            {
              echo "<tbody>";
              echo "<tr>";
              echo "<td>" . $row['Ctel'] . "</td>";
              echo "<td>" . $row['Cmoney'] . "</td>";
              echo "<td>" . $row['Ccheck'] . "</td>";
                       
              echo "<td>".
              "<a  class='btn btn-info btn-xs' href='index.php?updateMembership=" . $row['Ctel'] .  "'><span class='glyphicon glyphicon-edit'></span> Edit </a>".
              "<a  class='btn btn-info btn-xs' href='merchantService.php?deleteMembership=" . $row['Ctel'] .  "'><span class='glyphicon glyphicon-edit'></span> Delete </a>".
              "</td>";
              
             
           
             
              echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
        ?>       
      </div>
    </div>
            </div>


<!-- Customer Satisfaction  -->

<div id="Judge" class="container-fluid" ; style="padding: 5%;
                                                  position: relative;">
    <h2 style="font-family: 'Pacifico'"> Customer Satisfaction </h2>
    <hr/>
    <br><br>

    <button style="visibility: hidden;"type="button" class="btn btn-primary btn-lg"></button>
        <!-- delimiter -->
        <div class="row" style=" position: relative;top: -96px; ">
      <div class="panel panel-primary filterable">
      <?php 
           include("../connexion.php");
          $stmt = $pdo->query("SELECT * FROM JUDGE");
          echo '<table class="table">
            
            <tr class="filters">
            <th>Order Number </th>
            <th>Menu Grade</th>
            <th>Menu Comment </th>   
            <th> Delivery Grade </th>  
            <th> Delivery Comment  </th>   
            
            </tr>';

            while ($row = $stmt->fetch()) 
            {
              echo "<tbody>";
              echo "<tr>";
              echo "<td>" . $row['Ono'] . "</td>";
              echo "<td>" . $row['Mgrade'] . "</td>";
              echo "<td>" . $row['Mcomment'] . "</td>";
              echo "<td>" . $row['Dgrade'] . "</td>";
              echo "<td>" . $row['Dcomment'] . "</td>";
              
                   
           
              echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
        ?>       
      </div>
    </div>
    <!-- delimiter -->

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