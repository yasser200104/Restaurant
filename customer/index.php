<!DOCTYPE html>
<html>

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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

    <!-- NAVBAR -->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <ul class="nav nav-tabs">
    <li class="nav-item">
          <a   class="nav-link active" role="tab" data-bs-toggle="tab" href="#ORDER"> ORDER</a>
        </li>
        <li class="nav-item">
          <a  class="nav-link "  role="tab" data-bs-toggle="tab" href="#RECHARGE"> BALANCE </a>
        </li>
       
        <li class="nav-item">
          <a  class="nav-link  " data-bs-toggle="tab" href="#MEMBERSHIP">  RECHARGE </a>
        </li>
        
    </ul>

    
</div>   

<!-- NAVBAR  -->

        <nav class="navbar navbar-default navbar-fixed-top" role="tablist">
             
            <div class="container">
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                           
                        </button> -->
                        <a class="navbar-brand" style="position: relative;right: 280px;top: 6px;" href="#">Restaurant</a>
                                 
                        <img src="..\images\lady-img.jpg" alt="Avatar" style="width: 8%;border-radius: 100%;position: relative;right: -412px; bottom: -5px;"></li>
                           <a class="btn btn-large btn-primary logout" style="position: relative;right: -440px;top: 5px;background-color: black;border-color: white;" href="../index.php"> 
                            <i class="fa fa-sign-out" aria-hidden="true">Logout</i>
                            </a>
                          

                        
                  

                    <!-- Collect the nav links, forms, and other content for toggling -->
                   
                        <!-- <img class="rounded-circle" alt="100x100" src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg"/> -->
                    </div><!-- /.navbar-collapse -->
                    
                </div>
            </div><!-- /.container-fluid -->
        </nav>
         
       




       <!-- ============ Pricing  ============= -->
<div class="tab-content">
         

    

       <!--     Fetch Balance  -->
<div role="tab-pane " class="tab-pane " id="RECHARGE"> 
       <div class= "container">
        <div class="row justify-content-center">
            <div class="col-md-7">

            <div class="card mt-5">
                   <div class="card-header text-center">
                       <h4> Get Balance </h4>
                   </div> 
                         <div class="card-body">
                    
                 <form action="" method="Get">           
                         <div class="row">
                             <div class="col-md-8">
                                 <input type="text" name="Ctel" value= "<?php if(isset($_GET['Ctel'])){echo $_GET['Ctel'];} ?>" class="form-control">
                         </div>
                         <div class="col-md-4">
                               <button type="submit" class= "btn btn-primary"> Search </button>
                         </div>  
                      </div>
                 </form> 
                 <div class="row">
                     <div class="col-md-12">
                         <hr>
                         <?php 
                         include("../connexion.php");
                         if(isset($_GET['Ctel']))
                         {
                              $Ctel = $_GET['Ctel'];
                          

                             $stmt = $pdo->query("SELECT Cremain FROM customer WHERE Ctel='$Ctel'");
                             $row = $stmt->fetch();
                         
                           
                        //    $stmt = $dbh->prepare("SELECT Cremain FROM customer WHERE Ctel= '$Ctel' LIMIT 1"); 
                        //    $stmt->execute([$id]); 
                        //    $row = $stmt->fetch();

                       
                      

                         }

                      
                         ?>

                         <div class ="form-group mb-3">
                             <label for=""> Balance </label>
                             <input type="text" value= "<?php if(isset($_GET['Ctel'])){ echo $row['Cremain'];} ?>"  class="form-control">

                         </div> 
                 </div> 
                    
            </div>
            </div>
       </div>
   </div>
 </div>
                        </div>
                   
                        
                        </div>
   
       

   <!-- MENU TABLE START -->
   <div role="tab-pane " class="tab-pane active " id="ORDER">
   <div id = "Order" class="tab-content">   
        <div id="Order" class="container tab-pane active">
<div id="Menu" class="container-fluid" ; style="padding: 2%; top: -18px;
                                                  position: relative;">
    <h2 style="font-family: 'Pacifico'"> Menu  </h2>
    <hr/>
       <div class="row">
  

        <?php 
        
          
         if(isset($_GET['addOrder'])) {
        
          $stmt = $pdo->query("SELECT * FROM Menu where Mname = '" . $_GET['addOrder'] . "'");
          $row = $stmt->fetch()
        ?>
          
        <form action="customerService.php" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="Mname" placeholder="Menu" value="<?php echo $row['Mname'] ?>">
		      		</div>
		      	
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="ODprice" placeholder="price" value="<?php echo $row['Mprice'] ?>" >
		      		</div>
              <div class="form-group">
                 <input type="text" class="form-control" name="ODquantity" placeholder="Quantity" required>
               </div>
               <div class="form-group">
                 <input type="text" class="form-control" name="Oaddress" placeholder="Address" required>
               </div>

               
                <div class="form-group">
                 <input type="text" class="form-control" name="Ocomment" placeholder="Comment" required>
               </div>

	            <div class="form-group" >
	            	<button name="ADD_ORDER" style="position: initial;width: 307px;right: -313px;position: relative;" type="submit" class="form-control btn btn-primary submit ">PLACE ORDER</button>
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
            
            <th>Price</th>
            
            </tr>';

            while ($row = $stmt->fetch()) 
            {
              echo "<tbody>";
              echo "<tr>";
              echo "<td>" . $row['Mname'] . "</td>";
              echo "<td>" . $row['Mprice'] . "</td>";
              
                       
              echo "<td>".
              "<a  class='btn btn-info btn-xs' href='index.php?addOrder=" . $row['Mname'] .  "'> Place Order </a>".
              
                   "</td>";
               
                    
              echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";
        ?>       
      </div>
    </div>
            </div>
            </div>         
    </div>
    </div>
   <!-- MENU TABLE END -->


   <!-- Recharge Start   -->
   <div role="tab-pane" class="tab-pane " id="MEMBERSHIP">
   <div class="tab-content">   
        <div id="vip" class="container tab-pane active">
   
   <div class="container" style="position: relative;">
   <div class="row justify-content-center">
            <div class="col-md-7">

            <div class="card mt-5">
                   <div class="card-header text-center">
                       <h4> Recharge your account </h4>
                   </div> 
                         <div class="card-body">
  
   <form action="customerService.php" method= "Post">
        <div class="mb-3">
        <label for=" Recharge " class="form-label" > tel </label>
             <input type="text" class="form-control" name="Ctel" placeholder="Ctel" required>  
        </div>
        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"> Amount Recharge </label>
        <input type="text" class="form-control" name="Cmoney" placeholder="Cmoney" required>
         </div>
  
     <button name="RECHARGE" class="btn btn-primary"> Submit </button>
  </form>
  </div>
        </div>         
    </div>
    </div>
            </div>
            </div>
    </div>
   <!-- Recharge End    -->




        


        <!-- ============ Contact Section  ============= -->
        
        <section id="contact">
           
            
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner contact">
                            <!-- Form Area -->
                            <div class="contact-form">
                                <!-- Form -->
                                <form id="contact-us" method="post" action="contact.php">
                                    <!-- Left Inputs -->
                                    <div class="col-md-6 ">
                                        <!-- Name -->
                                        <input hidden type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                                        <!-- Email -->
                                        <input hidden type="email" name="email" id="email" required="required" class="form" placeholder="Email" />
                                        <!-- Subject -->
                                        <input hidden type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                                    </div><!-- End Left Inputs -->
                                    <!-- Right Inputs -->
                                    <div class="col-md-6">
                                        <!-- Message -->
                                        <textarea hidden name="message" id="message" class="form textarea"  placeholder="Message"></textarea>
                                    </div><!-- End Right Inputs -->
                                    <!-- Bottom Submit -->
                                    <br/><br/>
                                    <div class="relative fullwidth col-xs-12" style="display: flex;">
                                        <!-- Send Button -->
                                        
                                    </div><!-- End Bottom Submit -->
                                    <!-- Clear -->
                                    <div class="clear"></div>
                                </form>
                            </div><!-- End Contact Form Area -->
                        </div><!-- End Inner -->
                    </div>
                </div>
            </div>
        </section>
        <!-- ============ Our Beer  ============= -->


        <section id ="beer" class="description_content" style="height: 0px; padding: 0px;">
        </section>


       <!-- ============ Our Bread  ============= -->


        <section id="bread" class=" description_content" style="height: 0px; padding: 0px;">
        </section>


        
        <!-- ============ Featured Dish  ============= -->

        <section id="featured" class="description_content" style="height: 0px; padding: 0px;">
        </section>

        <!-- ============ Reservation  ============= -->

        <section  id="reservation"  class="description_content" style="height: 0px; padding: 0px;">
           
        </section>


        <!-- ============ Footer Section  ============= -->

        <footer class="sub_footer">
            <div class="container">
                <div class="col-md-4"><p class="sub-footer-text text-center">&copy; Restaurant 2014, Theme by <a href="https://themewagon.com/">ThemeWagon</a></p></div>
                <div class="col-md-4"><p class="sub-footer-text text-center">Back to <a href="#top">TOP</a></p>
                </div>
                <div class="col-md-4"><p class="sub-footer-text text-center">Built With Care By <a href="#" target="_blank">Us</a></p></div>
            </div>
        </footer>


        <script type="text/javascript" src="js/jquery-1.10.2.min.js"> </script>
        <script type="text/javascript" src="js/bootstrap.min.js" ></script>
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>     
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script type="text/javascript" src="js/main.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>