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
    <title>||...Sangeet Uplaod...||</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

<script>
	function checkfiletype()
	{	
		filename = document.forms["myForm"]["file"].value
		var parts = filename.split('.');
		var ext = parts[parts.length - 1].toLowerCase();
		if(ext == 'mp3' ||ext == 'wav' || ext == 'ogg')
		{
			return true;
		}
		else
		{
			alert('Only mp3/wav/ogg files allowed files allowed'); // just an alert for now but you can spice this up later
        		return false;
		}
	}
</script>
                

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
                    <li >
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>HomePage</a>
                    </li>
		    <li class="selected">
                        <a href="upload.php"><i class="fa fa-edit fa-fw"></i>Upload</a>
                    </li>
		     <li>
                        <a href="playlist.php"><i class="fa fa-table fa-fw"></i>My Playlist</a>
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Upload</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" name = "myForm" action="new_upload.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return checkfiletype()">
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file" name="file">
                                        </div>
					<div class="form-group">
                                            <label>Give a nice name to your file...:)</label>
                                            <input type ="text" name="fname"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>File Description</label>
                                            <textarea class="form-control" rows="3" name="description"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="share" id="optionsRadios1" value="Y" checked>Let everyone know of my awesome taste..:D
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="share" id="optionsRadios2" value="N">No..It's just for me..;)
                                                </label>
                                            </div>
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary" name="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-success">Reset Button</button>
                                    </form>
                                </div>
				<?php
					if(isset($_SESSION['error']))
					{
						if($_SESSION['error'] == 1)
						{
							echo "<strong>Sorry, file doesn't exist.</strong>";
						}
						else if($_SESSION['error'] == 2)
						{
							echo "<strong>Sorry, your file is too large.</strong>"; 
						}
						else if($_SESSION['error'] == 3)
						{
							echo "<strong>File with same name already exists. Please give a new name.</strong>"; 
						}
						else if($_SESSION['error'] == 4)
						{
							echo "<strong>Upload failed</strong>"; 
						}
					}
					$_SESSION['error'] = 0;
					unset($_SESSION);
					?>
                               
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

</body>

</html>
