<?php

require "../class/db.php";

session_start();

if(isAdminLoggedIn());

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
            <a class="sidebar-brand d-flex mb-3 align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text">Timetable Management System </div> 
            </a>
            
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="index.php">
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
                    <form
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
                    </form>

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
<div>
    <?php  
        // if(isset($_SESSION['msg'])) {
        //     echo "<div class='message'>".$_SESSION['msg']."</div>";
        //     unset($_SESSION['msg']);
        // }
    ?>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header text-center">
    </div>
    <div class="card-body">
        <div class="table-responsive">

                        <?php
                        $days = array('MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
                        foreach($days as $day)
                        { ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                            <!--------------------- DISPLAY THE DAY OF THE WEEK --------------------------- -->
                            <tr>
                                <td colspan="8" class="text-center" style="background-color:#043565;">
                                <span  class="text-center" style="font-weight:800; font-size:large; color:white; ">
                                    <?php echo $day; ?>
                                </span>
                                </td>
                            </tr>
                            <tr style="background-color:#EDF7F6">
                                <th style="text-align:center;width:1px"><b>Batch</b></th>
                                <th style="text-align:center;width:1px"><b>Hour 1</b></th>
                                <th style="text-align:center;"><b>Hour 2</b></th>
                                <th style="text-align:center;"><b>Hour 3</b></th>
                                <th style="text-align:center;"><b>Hour 4</b></th>
                                <th style="text-align:center;"><b>Hour 5</b></th>
                                <th style="text-align:center;"><b>Hour 6</b></th>
                                
                            </tr>

                            <tr>
                        
                                </form>

                                <!----------------------------------- MODAL ---------------------------------------------->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Hour</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Select Faculty</label>
                                                <select name="fName" class="form-control" required>
                                                <option value="">Select Faculty</option>
                                                <?php
                                                 $sql_faculty = "select * from tbl_faculty";
                                                 $result=$db->query($sql_faculty);
                                                 if($result->num_rows > 0){
                                                    while($faculty=$result->fetch_assoc()){
                                                    ?>
                                                       <option value=""><?php echo $faculty['fName'];?></option>
                                                    <?php
                                                    }
                                                 }
                                                ?>
                                                </select>
                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="message-text" class="col-form-label">Message:</label>
                                                <textarea class="form-control" id="message-text"></textarea>
                                            </div> -->
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Edit</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- end of modal --------------------------------------------------------------------------------------------->
                                        
                                    
                                    <!-- Hours -->
                                    <?php
                                        $sql_program = "select * From tbl_program";
                                        $programs = $db->query($sql_program);

                                        $sql_semester = "select * From tbl_semester where semStatus=1";
                                        $semesters = $db->query($sql_semester);

                                        $sql = "select * from tbl_allocation";
                                        $allocation = $db->query($sql);
                                        // echo $batches;

                                        $sql_batch = "select * From tbl_batch";
                                        $batches = $db->query($sql_batch);
                                        if($batches->num_rows>0)
                                        {
                                            while($batch_row=$batches->fetch_assoc())
                                            {
                                                $bid = $batch_row['bid'];
                                    ?>
                                        <tr>
                                        <td data-target="#exampleModal" data-toggle="modal" 
                                        style="justify-content:center; text-align:center; cursor:pointer;background-color:#EDF7F6" width="10%"  > 

                                    <!--------------------- DISPLAY BATCH NAME -------------------------------->
                                        <?php echo $batch_row['bName']; ?>
                                        </td>   
                                        <?php
                                            $sql_current_sem = "select * from tbl_batch where bid=$bid";
                                            $sem = $db->query($sql_current_sem);
                                            while($sem_row = $sem->fetch_assoc())
                                            {
                                                $sid = $sem_row['bCurrentSem'];
                                                $sql_subject = "select * from tbl_subject where semid=$sid";
                                                $subjects = $db->query($sql_subject);
                                                while($subject_row = $subjects->fetch_assoc())
                                                {
                                                    $subname = $subject_row['subname'];
                                                    $subid = $subject_row['subid'];
                                        ?>
                                    <!--------------------- DISPLAY SUBJECT FOR THE HOUR  ------------------- -->
                                            <td data-target="#exampleModal" data-toggle="modal" style="justify-content:center; text-align:center;cursor:pointer" width="10%"
                                                onMouseOver="this.style.backgroundColor='#f1f4f7'"  onMouseOut="this.style.backgroundColor='#FFFF'" > 
                                                <?php echo $subname; ?><br><br>
                                                
                                                <?php
                                                $faculty_sql = "select * from tbl_faculty where fid in (select fid from tbl_allocation where subid=$subid)";
                                                $faculty_name = $db->query($faculty_sql);
                                                while($fName = $faculty_name->fetch_assoc())
                                                $faculty = $fName['fName'];
                                                ?>
                                                <span style="color:#043565"><?php echo "(".$faculty.")"; ?></span>
                                            </td>

                                        <?php
                                            }
                                        }?>

                                      </tr>  
                                      <?php
                                    }
                                }
                                

                            ?>

                        </tr>
						
                </tbody>
                
            </table>
                        <?php
                        }
                        ?>
            <br>
                        
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
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
   
</body>

</html>