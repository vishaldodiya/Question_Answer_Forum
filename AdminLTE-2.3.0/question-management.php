<!DOCTYPE html>

<?php
	session_start();


	if(empty($_SESSION['usr_id'])){
		header("Location: http://localhost/forum/login.php");
	}else{
		if($_SESSION["previlidge"] == 'user'){
		
			header("Location: http://localhost/forum/user_profile.php");
		}else{
			
		}
	}

?>

<?php
	
	
	include_once "../php/connection.php";
	
	$connection = new connection();
	$connection->connect();
	$query = "select `im_profile_picture` from `registration` where `in_id` = ".$_SESSION['usr_id'];
	$result = mysqli_query($connection->mycon,$query);
	
	$pro_img;
	if($arr = mysqli_fetch_array($result)){
		$pro_img = $arr['im_profile_picture'];
	}
	
	
	
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		  
		  
		  <div class="col col-sm-4">
		  </div>
		 <a href="http://localhost/forum/user_profile.php"> <button class="btn btn-danger" style="margin-top:10px;">FORUM </button></a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- edited by vdm -->
				  <img src="/forum/images/<?php echo $pro_img ?>" class="user-image" alt="User Image">
				  <!-- edited by vdm -->
                  <span class="hidden-xs"><?php echo $_SESSION['uname']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
				  
					<!-- edited by vdm  -->
                    <img src="/forum/images/<?php echo $pro_img ?>" class="img-circle" alt="User Image">
                    <p>
					<!-- edited by vdm -->
                      <?php echo $_SESSION['uname']; ?> - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="../php/php-logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
			<!-- edited by vdm -->
              <img src="/forum/images/<?php echo $pro_img ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
			<!-- edited by vdm -->
              <p><?php echo $_SESSION['uname']; ?></p>
              
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <ul class="treeview-menu">
                <li><a href="user_management.php"><i class="fa fa-circle-o"></i> User Management</a></li>
                <li><a href="category-management.php"><i class="fa fa-circle-o"></i> Category Management</a></li>
				<li><a href="report-management.php"><i class="fa fa-circle-o"></i> Report Management</a></li>
				<li><a href="log_detail.php"><i class="fa fa-circle-o"></i> Log Details </a></li>
				<li><a href="question-management.php"><i class="fa fa-circle-o"></i> Question Management </a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Question Management
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            
            
          </div><!-- /.row -->
		 
          
			<!-- edited by vdm -->
			<!-- data table -->
				<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Question ID</th>
                          <th>Asker</th>
						  <th>Question</th>
                          <th>Date</th>
                          <th>Time</th>
						  <th>Category</th>
						  <th>Status</th>
						  <th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
						
						include_once "../php/php-utility.php";
						$ob = new utility();
						
						$result = $ob->display_question(null);
						
						
						
						
						while($arr = mysqli_fetch_array($result)){
					?>		
						 <tr>
							 <td><?php echo $arr['in_question_id']; ?></td>
							 <td><?php echo $arr['st_username']; ?></td>
							 <td><?php echo $arr['st_question']; ?></td>
							 <td><?php echo $arr['dt_question']; ?></td>
							 <td><?php echo $arr['tm_question']; ?></td>
							 <td><?php echo $arr['st_category_name']; ?></td>
							 <td><?php echo ($arr['st_question'] == '0') ? 'Disabled' : 'Active'; ?></td>
							 <td><button data-toggle="modal" data-target="#Edit_question" id="edit-btn<?php echo $arr['in_question_id']; ?>" data-id='<?php echo $arr['in_question_id']; ?>' data-que="<?php echo $arr['st_question']; ?>"  class = "btn btn-primary edit-btn"><span class="glyphicon glyphicon-edit"></span></button>&nbsp;<button id="del-btn<?php echo $arr['in_question_id']; ?>" data-cat="<?php echo $arr['st_category_name']; ?>" data-id='<?php echo $arr['in_question_id']; ?>' class = "btn btn-danger del-que"><span class="glyphicon glyphicon-remove"></span></button></td>
							
							 
						 </tr>
					<?php		
						}
						
					?>
				</tbody>
			</table>
			<!-- ------------------------------------------ -->
              
            </div><!-- /.col -->
			
			<!-- Edit question -->
				<div id="Edit_question" class="modal fade" role="dialog">
					<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit question</h4>
							  </div>
							<form method="post">
								<div class="modal-body">
								
								<div class="form-group">
								  <label for="comment"><h4>Update Question</h4></label>
								  <input type="text" class="form-control" id="in_question_txt" value="" required>
								  
								</div>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  <button type="button" id="que_btn_edit" class="btn btn-primary">Edit</button>
							  </div>	
							</form>	
							  
							</div>

						  </div>
				</div>	
							
			
			
			
			
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->

          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../js/jquery-1.12.2.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
	<!-- My JS file -->
	<script>

	
	var que_id;
	var que_cat;
	var st_que;
	$(".edit-btn").click(function(){
			que_id = $(this).data('id');
			st_que = $(this).data('que');
			
			console.log(que_id+"---------"+st_que);
			$("#in_question_txt").val(st_que);
			
		});
	
	$("#que_btn_edit").click(function(){
		var new_que = $("#in_question_txt").val();
		console.log("-----"+new_que);
		if(new_que == ''){
			return false;			
		}
		$.ajax({
			url:"../php/php-update-question.php",
			method:"POST",
			data:{que_id:que_id,new_que:new_que},
			success:function(html){
				alert(html);
				location.reload(true);
			}
		});
	});
	
	
	$(".del-que").click(function(){
			que_id = $(this).data('id');
			que_cat = $(this).data('cat');
			console.log("-----"+que_id);
			
				$.ajax({
					url:"../php/php-del-question.php",
					method:"POST",
					data:{que_id:que_id,que_cat:que_cat},
					success:function(html){
						alert(html);
						location.reload(true);
					}
				});
			
			
		});
	</script>
	<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
	</script>
	
	<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
	</script>
	
  </body>
</html>
