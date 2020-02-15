<?php
require_once('global.php');
if(isset($_SESSION['user_id']))
{
	header('Location: index.php');
	exit(0);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>||...Sangeet...||</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-15 text-center logo-margin ">
              <img src="assets/img/logo.png" alt=""/>
                </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="form">
      
      			<ul class="tab-group">
        			<li class="tab active"><a href="#signup">Sign Up</a></li>
        			<li class="tab"><a href="#login">Log In</a></li>
      			</ul>
      
      			<div class="tab-content">
			<?php
				if(isset($_SESSION['error']))
					{	
					if($_SESSION['error']==1)
					{
			      			echo '<h1>Email Id already exists....!</h1>';
					}
					if($_SESSION['error']==3)
					{
			      			echo '<h1>Authentication Failed....!</h1>';
					}
					unset($_SESSION['error']);
				}
			?>

        			<div id="signup">   
	          			<h1>Sign Up for Free</h1>
						<form name="myForm1" action="process_signup.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit = "return true">
          
          					<div class="top-row">
            					<div class="field-wrap">
              						<label>
                						First Name<span class="req">*</span>
              						</label>
              						<input type="text" required autocomplete="off" name="firstname"/>
            					</div>
        
            					<div class="field-wrap">
              						<label>
										Last Name<span class="req">*</span>
									</label>
									<input type="text" required autocomplete="off" name="lastname"/>
								</div>
							</div>

							<div class="field-wrap">
								<label>
									Email Address<span class="req">*</span>
								</label>
								<input type="email" required autocomplete="on" name="emailaddress"/>
							</div>
							  
							<div class="field-wrap">
								<label>
									Set A Password<span class="req">*</span>
								</label>
								<input type="password" required autocomplete="off" name="newpassword"/>
							</div>
							  
							<input type="submit" class="button button-block" value="Sign Up" name="Signup"/>Get Started</button>
				      </form>
				</div>
        
        		<div id="login">   
					<h1>Welcome Back!</h1>
				  
				  	<form name="myForm" action="process_login.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit = "return true">
				    	<div class="field-wrap">
				    		<label>
				      			Email Address<span class="req">*</span>
				    		</label>
				    		<input type="email" required autocomplete="on" name ="email"/>
				  		</div>
				  
				  		<div class="field-wrap">
				    		<label>
				      			Password<span class="req">*</span>
				    		</label>
				    		<input type="password" required autocomplete="off" name ="password"/>
				  		</div>
				  
				  		<input type="submit" class="button button-block" value="Log In" name="login"/>
				  
				  </form>

        		</div>
        		
      		</div><!-- tab-content -->

		</div> <!-- /form -->

  		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      	<script src="js/index.js"></script>
        </div>
	</div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
