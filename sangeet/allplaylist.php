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
    <title>||...Sangeet Search Result...||</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

    <!-- Page-Level CSS -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

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
                                <div><strong><?php echo $_SESSION['first_name']?> </strong><?php echo $_SESSION['last_name'] ?></div>
                                
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
		    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>HomePage</a>
                    </li>
		    <li>
                        <a href="upload.php"><i class="fa fa-edit fa-fw"></i>Upload</a>
                    </li>
		     <li class="selected">
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
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Search Result</h1>
                </div>
                 <!-- end  page header -->
            </div>
            	<div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                     
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Songs</th>
					    <th width ="300">Play Music</th>
					    <th>Uploaded By</th>
					    <th>Actions</th>
					</tr>
				    </thead>
                                    <tbody>
					<?php 
			$query = "SELECT * FROM playlist WHERE file_name LIKE '%".$_GET['name']."%' AND share = 'Y';";
			$res = mysql_query($query, $conn);
			$count = 1;
			$color = array("success","info", "warning","danger");
			while($output = mysql_fetch_assoc($res))
			{
				$query1 = "SELECT * FROM user_detail WHERE user_id =".$output['user_id'].";";
				$res1 = mysql_query($query1, $conn);
				$output1 = mysql_fetch_assoc($res1);
				$file_loc= 'playlist/'.$output['owner'].'/'.$output['file_name'];
				echo '<tr class="gradeA '.$color[$count %4].'"><td>'.$count.'</td><td>'.$output['file_name']."</td>";
				echo '<td><audio controls> <source src="'.$file_loc.'" type="'.$output['file_type'].'"> Your browser does not support the audio element.</audio></td>';
				echo '<td>'.$output1['first_name'].' '.$output1['last_name'].'</td>';
				if($output['owner'] == $_SESSION['user_id'])
				{
					echo '<td><div class="btn-group"><button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"> Actions <span class="caret"></span> </button><ul class="dropdown-menu pull-left" role="menu"><li><a href="process_playlist.php?&opt=share&public='.$output['share'].'&name='.$output['file_name'].'">'.$share.'</a></li><li><a href="process_playlist.php?&opt=delete&name='.$output['file_name'].'">Delete From Playlist</a></li></li><li><a href="process_playlist.php?&opt=download&name='.$output['file_name'].'">Download</a></li></ul></div></td></tr>';
				}
				else
				{
					echo '<td><div class="btn-group"><button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"> Actions <span class="caret"></span> </button><ul class="dropdown-menu pull-left" role="menu"><li><a href="process_playlist.php?&opt=fav&owner='.$output['user_id'].'&name='.$output['file_name'].'">Add to favourite</a></li><li class="divider"></li><li><a href="process_playlist.php?&opt=download&name='.$output['file_name'].'">Download</a></li></ul></div></td></tr>';
				}
				$count = $count+1;
			}
			?>
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
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
