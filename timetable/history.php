<?php
require "../class/db.php";
session_start();
if(isAdminLoggedIn());
$sql_dates = "SELECT * FROM tbl_storage";
$result_dates = $db->query($sql_dates);
$timetableData=array();

//unset($_SESSION['previousB']);
unset($_SESSION['previousD']);

// Check if there is data received from the AJAX request
if(isset($_SESSION['timetableData'])) {
    // Retrieve the JSON string sent from JavaScript and convert it to PHP array
    $timetableData = json_decode($_SESSION['timetableData'], true);
}
function checkPrevB($newValue){
    if(!isset($_SESSION['previousB'])){
        $_SESSION['previousB']=$newValue;
        return false; 
    } else if ($newValue==$_SESSION['previousB']) {
        return true;
    } else if($newValue!=$_SESSION['previousB']){
        $_SESSION['previousB']=$newValue;
        return false;
    }
}
function checkPrevD($newValue){
    if(!isset($_SESSION['previousD'])){
        $_SESSION['previousD']=$newValue;
        return false; 
    } else if ($newValue==$_SESSION['previousD']) {
        return true;
    } else if($newValue!=$_SESSION['previousD']){
        $_SESSION['previousD']=$newValue;
        return false;
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
    <link href="../css/style.css" rel="stylesheet">
    <script type="text/javascript">
    </script>


</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <div class=" sidebar-brand-text d-flex mt-3 justify-content-center">
                <image class="" src="../img/scms-logo.jpg" style="width:60px"></image>
            </div>
            <a class="sidebar-brand d-flex mb-3 align-items-center justify-content-center" href="index.php">
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
                <a class="nav-link" href="../program/index.php">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Programme</span>
                </a>
            </li>
           

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            

            <li class="nav-item">
                <a class="nav-link" href="../batch/index.php" >
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
                <a class="nav-link collapsed" href="../subject/index.php" >
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
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Subject Allocation</span>
                </a>
            </li>

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
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                  <!-- Begin Page Content -->
                  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800 text-center">TIMETABLE</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
        <div class="card-header"> 
        <form action="../index.php" name="home">
        <div style="float:left;" class="font-weight-bold text-right">
            <button style="width:80px;margin-top:17px;" class="btn-sm btn-primary a-btn-slide-text">
            <span style="width:400; font-size:14px;"><strong>Home</strong></span>
            </button>
        </div>
        </form>
        <div style="float:right;" class="font-weight-bold text-right">
            <button onclick="window.print();" style="width:80px;margin-top:15px;" class="btn-sm btn-primary a-btn-slide-text">
            <span style="width:400; font-size:14px;"><strong>Print</strong></span>
            </button>
            <style>
                @media print {
                @page {
                    /* size: A4; */
                    margin: 0.2cm;
                }
                body {
                    transform-origin: 0 0; /* Set scaling origin */
                }
                }
            </style>
        </div>
        <form action="../timetable/records.php" name="back">
        <div style="float:right;" class="font-weight-bold text-right">
            <button style="width:80px;margin-top:15px;margin-right:10px;" class="btn-sm btn-primary a-btn-slide-text">
            <span style="width:400; font-size:14px;"><strong>Back</strong></span>
            </button>
        </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                        <tr>
                        
                        </form>
                        
                        </tr>
                        </tbody>
                        </table>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                            
                            <!-- Hours -->
                            <?php
                                    foreach($timetableData as $entry)
                                    {
                                            $hourcount;
                                            $id=$entry['id'];
                                            $bid=$entry['bid'];
                                            $semid=$entry['semid'];
                                            $day=$entry['day'];
                                            $hour=$entry['hour'];
                                            $subid=$entry['subid'];
                                            $fid=$entry['fid'];

                                                        $sql_batchname = "Select bName from tbl_batch where bid=$bid";
                                                        $batchname = $db->query($sql_batchname);
                                                        if($batchname->num_rows>0)
                                                        {
                                                            while($batchname_row = $batchname->fetch_assoc())
                                                            {
                                                                if(checkPrevB($bid))
                                                                    break;
                                                                else{ 
                                                                $bname = $batchname_row['bName'];
                                ?><tr>
                                    <td colspan="8" class="text-center" style="background-color:#043565;">
                                    <span  class="text-center" style="font-weight:800; font-size:large; color:white; ">
                                <?php    
                                                                echo $bname; 
                                                                ?>
                                                                </span>
                                                                </td>
                                                            </tr>
                                                            <tr style="background-color:#EDF7F6;">
                                                                <th style="text-align:center;width:1px"><b>Day</b></th>
                                                                <th style="text-align:center;width:1px"><b>Hour 1</b></th>
                                                                <th style="text-align:center;"><b>Hour 2</b></th>
                                                                <th style="text-align:center;"><b>Hour 3</b></th>
                                                                <th style="text-align:center;"><b>Hour 4</b></th>
                                                                <th style="text-align:center;"><b>Hour 5</b></th>
                                                                <th style="text-align:center;"><b>Hour 6</b></th>
                                                            </tr>
                                                <?php           
                                                                }
                                                            }
                                                        }
                                                ?>
                                                                    <!----------------- DISPLAY DAY ----------------------------------------------->
                                                                        <?php
                                                                            if(checkPrevD($day)) 
                                                                                goto skip1;
                                                                            else {
                                                                    ?>
                                                                    <tr style="background-color:white">
                                                                    <td style="background-color:#EDF7F6;justify-content:center; text-align:center; color:grey; font-weight:600" width=7%>
                                                                    <?php
                                                                                $hourcount=0;
                                                                                echo $day;
                                                                            }
                                                                        ?>
                                                                    </td>
                                                <?php
                                                    // while($timetable_row = $timetable->fetch_assoc())
                                                    // {
                                                        skip1:
                                                            if($subid==01)
                                                            {
                                                                $subname = 'Library';
                                                            }
                                                            if($subid==02)
                                                            {
                                                                $subname = 'Mentoring';
                                                            } 
                                                            if($subid==03)
                                                            {
                                                                $subname = 'General Lab';
                                                            }
                                                            else
                                                            {
                                                                $sql_subject = "select subname from tbl_subject where subid=$subid";
                                                                $subject = $db->query($sql_subject);
                                                                if($subject->num_rows>0)
                                                                {
                                                                    while($subject_row = $subject->fetch_assoc())
                                                                    {
                                                                        $subname = $subject_row['subname'];
                                                                    }
                                                                }
                                                            }    
                                                    
                                                ?>
                                                                                <!----------------- DISPLAY FACULTY----------------------------------------------->
                                                                        
                                                                                <td style="justify-content:center; text-align:center;cursor:pointer" width="10%"
                                                                                onMouseOver="this.style.backgroundColor='#f1f4f7'"  onMouseOut="this.style.backgroundColor='white'">
                                                                                <?php 
                                                                                echo $subname;
                                                                                $hourcount++;
                                                                                ?> <br>
                                                                                <?php
                                                                                    if($subid==01){
                                                                                        $faculty_sql= "select * from tbl_activity where fid=01";
                                                                                    } 
                                                                                    else{
                                                                                        $faculty_sql = "select * from tbl_faculty where fid in (select fid from tbl_timetable where subid=$subid)";
                                                                                    }
                                                                                    if($subid!=2 and $subid!=3)
                                                                                    {
                                                                                        $faculty_name = $db->query($faculty_sql);
                                                                                        while($fName = $faculty_name->fetch_assoc())
                                                                                            $faculty = $fName['fName'];
                                                                                ?>
                                                                                <span style="color:#043565"><?php echo "(".$faculty.")"; ?></span></td>
                                                                                <?php
                                                                                    }
                                                                                ?>
                                                                        <?php        
                                                                   if($hourcount==6){?>
                                                                        </tr> 
                                                                <?php }
                                                            }
                                                    ?> 
                                            
                                            </tbody>
                                            </table> 
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

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