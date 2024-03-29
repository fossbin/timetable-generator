<?php 
	error_reporting(0);
	session_start();
	
	require "../class/db.php";

    if(!isset($_SESSION['adminid'])) 
    {
        header("location: ../login.php");
    }

	if (isset($_POST["submit"]))
	{
            //End Date Calculation Based on Programme duration that maybe overriden due to falacies in whether a program could be completed.
            // $bFrom=$_POST['bFrom'];
            // $sql = "select semesters from tbl_program where pid=".$_POST['pName'];
            // $res=$db->query($sql);
            // if($res->num_rows>0)
            //     while($row->fetch_assoc($res))
            //         $years = floor($semesters / 2);
            
            // $end_date = clone $bFrom;
            // $end_date->modify("+$years years");
            // $end_date_formatted = $end_date->format("Y-m-d");
            $sql1 = "insert into tbl_batch (bid,pid,bName,bFrom,bTo,bCurrentSem) VALUES ('".$_POST["bid"]."','".$_POST["pName"]."','".$_POST["bName"]."','".$_POST["bFrom"]."','".$_POST["bTo"]."','".$_POST["bCurrentSem"]."')";
            if($db->query($sql1) == TRUE)
            { 
            $_SESSION['msg'] = "Batch added successfully!";
            header("location: index.php");
            }
            else
            {  
            ?> 
            <script> alert("Error!!"); </script>
            <?php
            echo " ".$db->error; 
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

    <!-- Custom styles for this template-->
    <link href="../css/main.css" rel="stylesheet">
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
                <a class="nav-link" href="index.php" >
                    <i class="fas fa-fw fa-users"></i>
                    <span>Batches</span>
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
                <a class="nav-link collapsed" href="../semester/index.php" >
                    <i class="fas fa-fw fa-book-reader"></i>
                    <span>Subject</span>
                </a>
            </li>
           
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="../faculty/index.php" >
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
                                    src="../img/trace.svg">
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
							<!--<h3 style="font-size: 30px; display: inline-block;"> Batch </h3>-->
						</div>
						</div>
						<div class="card-body">
							<div class="col-md-5 mr-auto ml-auto ">
								<div class="card mt-4  bg-white	">
									<div class="card-header">
										<div class="card-title">
											 Add Batch
										</div>
									</div>
									<div class="card-body">
										<form action="" method="POST">
                                        <div class="form-group">
												<label for="exampleInputEmail1">Enter Programme</label>
                                                <select name="pName" class="form-control" required>
													<option value="">Select Programme</option>
                                                    <?php 
													$sql="select * from tbl_program";
                                                                    $result=$db->query($sql);
                                                                    if($result->num_rows >0)
                                                                    { while($row =$result->fetch_assoc())
                                                                    {
                                                        ?>
                                                        <option value="<?php  echo $row["pid"] ;?>" > 
                                                        <?php 
                                                        echo $row["pName"] ;
                                                        ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }
                                                    ?>  
												</select> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail1">Enter Batch Name</label>
                                                <input type="text" autofocus name="bName" class="form-control" placeholder="Batch name" required />
												<!--<p style = "color: red;"><?php echo $errMsg; ?></p>  --> 
											</div>
                                            <div class="form-group">
												<label for="exampleInputEmail1">Enter From Date</label>
                                                <input type="date" autofocus name="bFrom" class="form-control" placeholder="" required />
												<!--<p style = "color: red;"><?php echo $errMsg; ?></p>  --> 
											</div>
                                            <div class="form-group">
												<label for="exampleInputEmail1">Enter To Date</label>
                                                <input type="date" autofocus name="bTo" class="form-control" placeholder="" required />
												<!--<p style = "color: red;"><?php echo $errMsg; ?></p>  --> 
											</div>
                                            
                                            <div class="form-group">
												<label for="exampleInputEmail1">Enter Current Semester</label>
                                                <select name="bCurrentSem" class="form-control" required>
                                                <option>Select Semester</option>
                                                <?php
                                                for($i=1;$i<=10;$i++)
                                                {
                                                ?>
                                                <option value=<?php echo $i; ?>><?php echo $i; ?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
                                                <!-- <input type="int" autofocus name="bCurrentSem" class="form-control" placeholder="" required /> -->
												<!--<p style = "color: red;"><?php echo $errMsg; ?></p>  --> 
											</div>
                                            
											<div class="form-group">
                                                <button name="submit" type="submit" class="btn btn-primary ml-3 float-right">Submit</button>
                                                <a href="index.php"><input type="button" value="Back" class="btn btn-danger float-right"></a>
											</div>
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
                        <span>Copyright </span>
                        <i class="fas fa-fw fa-copyright"></i>
                        <span>SSTM 2024</span>
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