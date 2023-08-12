<?php 
	error_reporting(0);
	session_start();
	
	require "../class/db.php";

    if(!isset($_SESSION['adminid'])) 
    {
        header("location: ../login.php");
    }
    $fid = $_GET['fid'];
    $sql1="select * from tbl_faculty where fid=$fid";
    $total_subjects = mysqli_num_rows($db->query("select distinct subid from tbl_allocation where fid=$fid"));
    $result1=$db->query($sql1);
    if($result1->num_rows >0)
    { 
        while($row =$result1->fetch_assoc())
        {
        
            $name = $row['fName'];
            $designation = $row['fDesignation'];
            $qualification = $row['fQualification'];
            $email = $row['fEmail'];
            $phone = $row['fPhone'];
            $gender = $row['fGender'];
            $status = $row['fStatus'];
            $subcount = $row['fSubcount'];
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Timetable Management System</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <div class=" sidebar-brand-text d-flex mt-3 justify-content-center">
                <image class="" src="../img/scms-logo.jpg" style="width:60px"></image>
            </div>
            <a class="sidebar-brand d-flex mb-3 align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text">Timetable Management System </div> 
            </a>
            
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-clock"></i> 
                    <span>Timetable</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            

            <li class="nav-item">
                <a class="nav-link" href="../program/index.php" >
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Programme</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            

            <li class="nav-item">
                <a class="nav-link" href="../batch/index.php" >
                    <i class="fas fa-fw fa-users"></i>
                    <span>Batch</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
             
             <li class="nav-item">
                 <a class="nav-link" href="../semester/index.php" >
                     <i class="fas fa-columns"></i>
                     <span>Semester</span>
                 </a>
             </li>
 
             <!-- Divider -->
             <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="../subject/index.php" >
                    <i class="fas fa-fw fa-book"></i>
                    <span>Subject</span>
                </a>
            </li>
           
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php" >
                    <i class="fas fa-fw fa-user"></i>
                    <span>Faculty</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="../subjectallocation/index.php" >
                    <i class="fas fa-tasks"></i>
                    <span>Subject allocation</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link collapsed" href="../invigilation/index.php" >
                    <i class="fas fa-diagnoses"></i>
                    <span>Invigilation</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

         

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
            <div id="content" class="bg-gray-200">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown  -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                           
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-gray-200 border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                           
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-item">
                                <i class="fas fa-signout-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                <a class="text-decoration-none" href="../logout.php">Logout</a>
                                </div>
                                <!-- <input type="submit" value="Logout" name="logout" class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"/> -->
                                    <!-- 
                                    Logout -->
                                 <!-- </input> -->
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div  class="main-panel align-middle ">
			<div style="min-height: 77vh;" class="bg-light content">

			
			

				<div class="col-md-12 ">
					<div class="card mt-4 bg-white">
						<div class="card-header">
						<div class="card-title"> 
							<!--<h3 style="font-size: 30px; display: inline-block;"> Program </h3>-->
						</div>
						</div>
						<div class="card-body">
							<div class="col-md-5 mr-auto ml-auto ">
								<div class="card mt-4  bg-white	">
									<div class="card-header">
										<div class="card-title">
											 Faculty Details
										</div>
									</div>
									<div class="card-body">
										<form action="" method="POST">
                                            <div class="form-group" style="display:flex">
                                                    <div style="width:40%"><label for="exampleInputEmail1">Name</label></div>
                                                    <div style="width:10%"><label>:</label></div>
                                                    <div style="width:40%"><label for="exampleInputEmail1"><?php echo $name?></label></div>
                                            </div>
                                            <div class="form-group" style="display:flex">
                                                <div style="width:40%"><label for="exampleInputEmail1">Designation</label></div>
                                                <div style="width:10%"><label>:</label></div>
                                                <div style="width:40%"><label for="exampleInputEmail1"><?php echo $designation?></label></div>
                                            </div>
                                             <div class="form-group" style="display:flex">
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1">Highest Qualification</label></div>
                                                <div style="width:10%"> <label>:</label></div>
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1"><?php echo $qualification?></label></div>
											</div>
                                            <div class="form-group" style="display:flex">
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1">Email</label></div>
                                                <div style="width:10%"><label>:</label></div>
                                                <div style="width:40%"><label class="column"  for="exampleInputEmail1"><?php echo $email?></label></div>
											</div>
                                            <div class="form-group" style="display:flex">
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1">Phone number</label></div>
                                                <div style="width:10%"><label>:</label></div>
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1"><?php echo $phone?></label> </div>
											</div>
                                            <div class="form-group" style="display:flex">
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1">Gender</label></div>
                                                <div style="width:10%"><label>:</label></div>
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1">
                                                                <?php 
                                                                if($gender=='f')
                                                                echo"Female";
                                                                else {
                                                                    echo"Male";
                                                                }?>
                                                </label> </div>
											</div>
                                            <div class="form-group" style="display:flex">
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1">Status</label></div>
                                                <div style="width:10%"><label>:</label></div>
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1">
                                                                <?php 
                                                                if($status==1)
                                                                echo "Active";
                                                                else {
                                                                    echo"Inactive";
                                                                }?>
                                                </label> </div>
											</div>

                                            <?php 
                                            if($status==1)
                                            { ?>
                                            <div class="form-group" style="display:flex">
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1">No: of subjects handled</label></div>
                                                <div style="width:10%"><label>:</label></div>
                                                <div style="width:40%"><label class="column" for="exampleInputEmail1">
                                                                <?php 
                                                                echo $total_subjects;
                                                                ?>
                                                </label> </div>
											</div>
                                            <?php } ?>
											<div class="form-group">
												
											</div>
											<a href="index.php"><input type="button" value="Back" class="btn btn-danger float-right"></a>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class=" sticky-footer bg-white ">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SSTM 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">


        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>