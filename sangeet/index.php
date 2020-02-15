<?php
require_once('global.php');
if(!isset($_SESSION['user_id']))
{
	header('Location: login.php');
	exit(0);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>||...Sangeet Home...||</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
	  <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo.png" alt="" width = "250px" height="100px"/>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->


               

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i>Change Profile Picture</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
				<?php
					if(file_exists("assets/img/".$_SESSION['user_id'].".jpeg"))
					{
						 echo '<img src="assets/img/'.$_SESSION['user_id'].'.jpeg" alt="">';
					}
					else{
                               			 echo '<img src="assets/img/user.jpg" alt="">';
					}?>
                            </div>
                            <div class="user-info">
                                <div><strong><?php echo $_SESSION['first_name']?>  </strong><?php echo $_SESSION['last_name'] ?></div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search Music Online..." name ="search1" id="search1">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button" name="search_online" onclick="location.href ='allplaylist.php?name='+document.getElementById('search1').value;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>HomePage</a>
                    </li>
		    <li>
                        <a href="upload.php"><i class="fa fa-edit fa-fw"></i>Upload</a>
                    </li>
		     <li>
                        <a href="playlist.php"><i class="fa fa-table fa-fw"></i>My Playlist</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">HomePage</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'] ?> </b><b> :)</b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>


           <div class="row">
                <!--quick info section -->
                <div class="col-lg-3">
                    <div class="alert alert-danger text-center">
                        <i class="fa fa-trophy fa-3x"></i></i>&nbsp;<b> Award </b>for best music website
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa  fa-beer fa-3x"></i>&nbsp;<b>60% Users </b>Most Visited Website 
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                        <i class="fa fa-expand fa-3x"></i>&nbsp;<b>Low Storage In Mobile ? </b>Store Your Collections Here

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <i class="fa  fa-pencil fa-3x"></i>&nbsp;<b>Acess to </b>Over 20,000 of songs
                    </div>
                </div>
                <!--end quick info section -->
            </div>

            <div class="row">
                <div class="col-lg-8">

                        <div class="panel-body">
                            <img src="assets/img/girl.jpg" alt="some_text" style="width:630px;height:350px;">


                        </div>
                    <div class="panel panel-primary">
                             <img src="assets/img/4.jpg" alt="some_text" style="width:640px;height:400px;">
                           
                        </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body yellow">
                            <i class="fa fa-signal fa-3x"></i>
                            <h3>100</h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Music Released In One day
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body blue">
                            <i class="fa fa-heart fa-3x"></i>
                            <h3>500 </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Music Released In One Week
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body green">
                            <i class="fa fa-music fa-3x"></i>
                            <h3>1,000</h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Music Released In One Month
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body red">
                            <i class="fa fa-headphones fa-3x"></i>
                            <h3>10,000</h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Music Released In One Year
                            </span>
                        </div>
                    </div>
                </div>

            </div>
		
            <div class="row">
                <div class="col-lg-4">
                    <!-- Notifications-->
                    <div class="panel panel-primary">
                            <img src="assets/img/1.jpg" alt="some_text" style="width:305px;height:228px;">
                    </div>
                    <!--End Notifications-->
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">

                            <img src="assets/img/2.jpg" alt="some_text" style="width:309px;height:228px;">
                    </div>
                </div>
                <div class="col-lg-4">
                                            <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body yellow">
                           <i class="fa fa-volume-up fa-3x"></i>
                            <h1> SANGEET</h1>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title">Brings you all at one place
                            </span>
                        </div>
                    </div>
                </div>
            </div>
	</div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>
<embed src="background.mp3" autostart="true" loop="true" height="10" width="10"> 
   
</body>

</html>
