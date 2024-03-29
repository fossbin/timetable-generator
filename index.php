<?php

require "class/db.php";

session_start();

if(isAdminLoggedIn());

//Reports

$total_pgms = mysqli_num_rows($db->query("select * from tbl_program where pstatus=1"));
$total_batches = mysqli_num_rows($db->query("select * from tbl_batch where bStatus=1"));
$total_faculty = mysqli_num_rows($db->query("select * from tbl_faculty where fStatus=1"));
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script type="text/javascript">
    </script>
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <div class=" sidebar-brand-text d-flex mt-3 justify-content-center">
                <image class="" src="img/scms-logo.jpg" style="width:60px"></image>
            </div>
            <a class="sidebar-brand d-flex mb-3 align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text">Timetable Management System </div> 
            </a>
            
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-clock"></i> 
                    <span>Timetable </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            

            <li class="nav-item">
                <a class="nav-link" href="program/index.php">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Programme</span>
                </a>
            </li>
           

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            

            <li class="nav-item">
                <a class="nav-link" href="batch/index.php" >
                    <i class="fas fa-fw fa-users"></i>
                    <span>Batches</span>
                </a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider my-0">
             
            <li class="nav-item">
                <a class="nav-link" href="semester/index.php" >
                    <i class="fas fa-columns"></i>
                    <span>Semester</span>
                </a>
            </li>

             <!-- Divider -->
             <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="subject/index.php" >
                    <i class="fas fa-fw fa-book-reader"></i>
                    <span>Subject</span>
                </a>
            </li>
           
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="faculty/index.php" >
                    <i class="fas fa-fw fa-user"></i>
                    <span>Faculty</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="subjectallocation/index.php" >
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Subject Allocation</span>
                </a>
            </li>

            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link collapsed" href="invigilation/index.php" >
                    <i class="fas fa-diagnoses"></i>
                    <span>Invigilation</span>
                </a>
            </li>
       
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="mentoring/index.php" >
                    <i class="fas fa-diagnoses"></i>
                    <span>Mentoring</span>
                </a>
            </li> -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

         

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

<!-- color palette 
#DDFBD2
#f7f0f5
D5FFF3
-->

            <!-- Main Content -->
            <div id="content" class="" style="background-color:#e0fff6;">

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
                                    src="img/trace.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-item">
                                <i class="fas fa-signout-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                <a class="text-decoration-none" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mb-3 pl-3">
                            <h1 class="h3 mb-0 text-gray-800">Timetable Operations</h1>
                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="">
                        <div class="card-body d-flex" >
                                <div class="mr-2">
                                    <a class="btn btn-md btn-primary shadow-sm" onclick="redirectToTarget()">
                                    <i class="fas fa-clock fa-sm text-white-50"></i>
                                    <span>Generate Timetable<span>
                                    </a>
                                </div>
                                <div class="mr-2">
                                    <a class="btn btn-md btn-primary shadow-sm" onclick="redirectToDisplay()">
                                    <i class="fas fa-file fa-sm text-white-50"></i> 
                                    <span>View Timetable</span>
                                    </a>
                                </div>
                                <div class="mr-2">
                                    <a href="timetable/records.php" class="btn btn-md btn-primary shadow-sm">
                                    <i class="fas fa-cloud-download-alt fa-sm text-white-50"></i> 
                                    <span>View Previous Timetables</span>
                                    </a>
                                </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <div style="width:40%; margin-left:15px;margin-bottom:10px;"><h1 class="h3 mb-0 text-gray-800" style>Working Days</h1></div>
                                <div class="days-container" style="display: flex; flex-wrap: wrap; margin-left:10px;">
                                <div class="day-item">
                                    <input type="checkbox" id="option1" name="days" value="1" style="margin-left:10px;">
                                    <label for="option1">Monday</label>
                                </div>
                                <div class="day-item">
                                    <input type="checkbox" id="option2" name="days" value="2" style="margin-left:10px;">
                                    <label for="option2">Tuesday</label>
                                </div>
                                <div class="day-item">
                                    <input type="checkbox" id="option3" name="days" value="3" style="margin-left:10px;">
                                    <label for="option3">Wednesday</label>
                                </div>
                                <div class="day-item">
                                    <input type="checkbox" id="option4" name="days" value="4" style="margin-left:10px;">
                                    <label for="option4">Thursday</label>
                                </div>
                                <div class="day-item">
                                    <input type="checkbox" id="option5" name="days" value="5" style="margin-left:10px;">
                                    <label for="option5">Friday</label>
                                </div>
                                <div class="day-item">
                                    <input type="checkbox" id="option6" name="days" value="6" style="margin-left:10px;" >
                                    <label for="option6">Saturday</label>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Check localStorage for previously selected options
                            var selectedOptions = JSON.parse(localStorage.getItem('selectedOptions'));
                            if (selectedOptions) {
                                selectedOptions.forEach(function(option) {
                                    document.getElementById('option' + option).checked = true;
                                });
                            }
                        });

                        function redirectToTarget() {
                            var selectedOptions = [];
                            document.querySelectorAll('input[name="days"]:checked').forEach(function(checkbox) {
                                selectedOptions.push(checkbox.value);
                            });
                            localStorage.setItem('selectedOptions', JSON.stringify(selectedOptions));
                            window.location.href = 'timetable/algorithm.php?options=' + JSON.stringify(selectedOptions);
                        }

                        function redirectToDisplay() {
                            var selectedOptions = [];
                            document.querySelectorAll('input[name="days"]:checked').forEach(function(checkbox) {
                                selectedOptions.push(checkbox.value);
                            });
                            localStorage.setItem('selectedOptions', JSON.stringify(selectedOptions));
                            window.location.href = 'timetable/display.php?options=' + JSON.stringify(selectedOptions);
                        }
                    </script>
                    <div>
                        <?php  
                            if(isset($_SESSION['msg'])) {?>
                                <div class="timetable-msg">
                                <?php echo $_SESSION['msg']; ?>
                                </div>
                                <?php unset($_SESSION['msg']);
                            }
                        ?>
                    </div>
                    <hr>
                    <div class="mb-3 pl-3">
                            <h1 class="h4 mb-0 py-3 text-gray-800">Dashboard</h1>
                    </div>
    
                    <!-- Content Row -->
                    <div class="card-deck">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="d-inline-block col-xl-3 col-md-6 mb-4" onclick="redirectProgram()">
                            <div class="card shadow h-100 py-2 highlight-on-hover" style="border-left-color:#043565; border-left-width:7px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col ">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                                Total Programmes</div>  
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_pgms?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-inline-block col-xl-3 col-md-6 mb-4" onclick="redirectBatch()">
                            <div class="card shadow h-100 py-2 highlight-on-hover" style="border-left-color:#043565; border-left-width:7px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col ">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                             Active Batches</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_batches?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-inline-block col-xl-3 col-md-6 mb-4" onclick="redirectFaculty()">
                            <div class="card shadow h-100 py-2 highlight-on-hover" style="border-left-color:#043565; border-left-width:7px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col ">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                             Active Faculty</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_faculty?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function redirectProgram(){
                                window.location.href = './program/index.php';
                            }
                            function redirectBatch(){
                                window.location.href = './batch/index.php';
                            }
                            function redirectFaculty(){
                                window.location.href = './faculty/index.php';
                            }
                        </script>
                        
                         <!-- Earnings (Monthly) Card Example -->
                         <!-- <div class="d-inline-block col-xl-3 col-md-6 mb-4 pl-0 pr-4">
                            <div class="card shadow h-100 py-2 w-100" style="border-left-color:#043565; border-left-width:7px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                                Total Active Batches</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_batches; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <!-- Earnings (Monthly) Card Example -->
                         <!-- <div class="d-inline-block col-xl-3 col-md-8 mb-4">
                            <div class="card shadow h-100 py-2 w-100" style="border-left-color:#043565; border-left-width:7px;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                                Total Active Faculty</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_faculty; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    <!-- <div class="d-inline-block col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Active Batches</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">sql</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div> -->
                </div>
                <!-- Page Heading -->

                <div>
                    <?php  
                        // if(isset($_SESSION['msg'])) {
                        //     echo "<div class='message'>".$_SESSION['msg']."</div>";
                        //     unset($_SESSION['msg']);
                        // }
                    ?>
                </div>
                <!-- DataTales Example -->


                </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white ">
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
   
</body>

</html>