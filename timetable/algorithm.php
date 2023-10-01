<?php

require "../class/db.php";
session_start();
if(isAdminLoggedIn());
//if (isset($_SESSION['adminid'])) { }  //admin is logged in
//else { header("location: ../login/php"); } //redirect to login page


$db->query("Delete from tbl_timetable");
$db->query("Alter table tbl_timetable auto_increment=0");
$db->query("Update tbl_subject set subcount=4"); //initializing subject count to 4 per week

$batches = $db->query("Select * from tbl_batch where bStatus=1");

if ($batches->num_rows > 0) {
    $batch_counter = 0;

    while ($batch_row = $batches->fetch_assoc()) {
        //fetch batch id, program id and current semester of batch
        $bid = $batch_row['bid'];
        $pid = $batch_row['pid'];
        $semid = $batch_row['bCurrentSem'];

        //fetch all subjects for that semester for the batch
        $subject_list = $db->query("Select * from tbl_allocation where bid=$bid and semid=$semid");
        $total_subjects = mysqli_num_rows($subject_list);

        //fetch the subject ids and store in an array
        if ($subject_list->num_rows > 0) {
            $subjects = array();
            while ($subject_row = $subject_list->fetch_assoc()) {
                $subid = $subject_row['subid'];
                $subjects[] = $subid;     
            }
        }
        else {
            continue;
        }

        $subject_details = $db->query("SELECT tbl_allocation.bid, tbl_allocation.semid, tbl_allocation.subid, tbl_subject.subcount FROM tbl_allocation left outer join tbl_subject on tbl_subject.subid=tbl_allocation.subid where tbl_allocation.bid=$bid and tbl_allocation.semid=$semid");
        if ($subject_details->num_rows > 0) {
            $subjectHourCount = array();
            while ($subject_detail_row = $subject_details->fetch_assoc()) {
                $subjectHourCount[] = $subject_detail_row['subcount'];
            }
        }
        

        $day = 1;
        $hour = 1;

        $libraryDay = $batch_counter % 5 + 1;
        $libraryCount = 0;

        while ($day <= 5) {
            $subject_index = $day - 1;
            $hour = 1;

        $workingDays = array("1" => "Monday","2" => "Tuesday","3" => "Wednesday","4" => "Thursday","5" => "Friday","6" => "Saturday");
            $dayOfWeek = $workingDays[$day];

            $libraryHour = 3;

            while ($hour <= 6) {
                // Check if there are hours remaining for any subject
                $isRemainingHours = 0; // false
                foreach ($subjectHourCount as $count) {
                    if ($count != 0) {
                        $isRemainingHours = 1; //true
                        break;
                    }
                }

                // Check if any faculty is available for the particular hour,for the particular batch
                $isAvailableFaculty = 0; // false
                foreach ($subjects as $subject) {
                    $check_faculty = mysqli_num_rows($db->query("SELECT fid from tbl_allocation where subid=$subject INTERSECT Select fid from tbl_timetable where day='$dayOfWeek' and hour=$hour and bid!=$bid"));
                    if ($check_faculty == 0) {
                        $isAvailableFaculty = 1; //true
                        break;
                    }
                }

                // Allot Library
                allotLibrary:   
                if ($day == $libraryDay && $hour == $libraryHour && $libraryCount < 1) {
                    $library = $db->query("Select * from tbl_activity where fid=01");
                    if ($library->num_rows) {
                        while ($libraryrow = $library->fetch_assoc()) {
                            $libraryfid = $libraryrow['fid'];
                            $libraryid = $libraryrow['id'];
                        }
                    }
                    
                    // Check if library is free for the hour
                    $currentfaculty = $db->query("Select fid from tbl_timetable where day='$dayOfWeek' and hour=$hour and bid!=$bid");
                    if ($currentfaculty->num_rows > 0) {
                        while ($currentfaculty_row = $currentfaculty->fetch_assoc()) {
                            if ($currentfaculty_row['fid'] == $libraryfid) {
                                $libraryHour = $libraryHour + 2;
                                if ($libraryHour > 6) {
                                    $libraryHour = $libraryHour % 6 + 2;
                                    $libraryDay++;
                                    if ($libraryDay > 5) {
                                        $libraryDay = $libraryDay % 5;
                                    }
                                }
                                goto allotLibrary;
                            }
                            // else continue loop
                        }
                    }
                   
                    $db->query("Insert into tbl_timetable(bid,semid,day,hour,subid,fid) values ($bid,$semid,'$dayOfWeek',$hour,$libraryid,$libraryfid)");
                    $libraryCount++;
                    $hour++;
                }
                //If no faculty is available or no more hours are needed for the subject, allot general lab
                else if ($isAvailableFaculty == 0 || $isRemainingHours == 0) {
                    $db->query("Insert into tbl_timetable(bid, semid, day, hour, subid, fid) values ($bid,$semid,'$dayOfWeek',$hour,3,0)");
                    $hour++;
                }
                
                // Allot Subjects
                else {
                    $loop = 0;  
                    /* When allocating a subject, if faculty is unavailable, the next subject in the array is selected and the
                    process continues. But if none of the faculty is available after looping through the entire array once, then
                    allocate general lab. The loop variable is used to track how many times the array has been gone through.
                    Without this variable, the algorithm may result in an infinite loop. */

                    label1: 
                    if($subject_index > $total_subjects - 1) { //0 to 6 for 7 subjects
                        $subject_index = $subject_index % $total_subjects; //to go in circular fashion in array
                    } 

                    // Select subject
                    $currentSubjectid = $subjects[$subject_index];
                    echo $currentSubjectid;

                    // Select faculty for the subject
                    $fid = $db->query("Select fid from tbl_allocation where subid=$currentSubjectid");
                    if ($fid->num_rows > 0) {
                        while ($currentfidrow = $fid->fetch_assoc()) {
                            $currentfid = $currentfidrow['fid'];
                        }
                    }

                    // Select type and number of remaining hours of subject
                    $currentSubject = $db->query("Select * from tbl_subject where subid=$currentSubjectid");
                    if ($currentSubject->num_rows > 0) {
                        while ($currentSubjectRow = $currentSubject->fetch_assoc()) {
                            $subjectType = $currentSubjectRow['subtype'];
                            $subjectHours = $currentSubjectRow['subcount'];
                        }
                    }
                    if($isAvailableFaculty == 1 && $loop >=$total_subjects - 1) {
                        $db->query("Insert into tbl_timetable(bid, semid, day, hour, subid, fid) values ($bid,$semid,'$dayOfWeek',$hour,3,0)");
                        $hour += 1;
                    }

                    // Theory Subject
                    else if ($subjectType == 1 && $subjectHours > 0 && $hour <= 6) {
                        
                        // Check if faculty is assigned elsewhere
                        $assignedFaculty = $db->query("Select fid from tbl_timetable where day='$dayOfWeek' and hour=$hour and bid!=$bid");
                        if ($assignedFaculty->num_rows > 0) {
                            while($assignedFacultyRow = $assignedFaculty->fetch_assoc()) {
                                if($assignedFacultyRow['fid'] == $currentfid) {
                                    $subject_index = $subject_index + 1;
                                    $loop += 1;
                                    goto label1;
                                    
                                }
                                // else continue loop
                            }
                        }
                        
                        $db->query("Insert into tbl_timetable(bid,semid,day,hour,subid,fid) values ($bid,$semid,'$dayOfWeek',$hour,$currentSubjectid,$currentfid)");
                        $db->query("Update tbl_subject set subcount=($subjectHours-1) where subid=$currentSubjectid");
                        
                        $subjectHourCount[$subject_index] = $subjectHourCount[$subject_index] - 1;
                        $hour = $hour + 1;
                    }

                    // Practical Subject
                    else if ($subjectType == 0 && $subjectHours > 0 && $hour < 6) { 

                        // Check if faculty for selected subject is already assigned elsewhere
                        $assignedFaculty = $db->query("Select fid from tbl_timetable where day='$dayOfWeek' and hour=$hour and bid!=$bid");  
                        if ($assignedFaculty->num_rows > 0) {
                            while ($assignedFacultyRow = $assignedFaculty->fetch_assoc()) {
                                if ($assignedFacultyRow['fid'] == $currentfid) { 
                                    $subject_index = $subject_index + 1;
                                    $loop += 1;
                                    goto label1;
                                }
                            }
                        }

                        // Check if faculty for selected subject is free for next hour
                        $nextHour = $hour + 1;
                        if($nextHour == $libraryHour)
                        {
                            $libraryHour = $libraryHour + 1;
                        }
                        $assignedFaculty2 = $db->query("Select fid from tbl_timetable where day='$dayOfWeek' and hour=$nextHour and bid!=$bid");
                        if ($assignedFaculty2->num_rows > 0) {
                            while ($assignedFacultyRow = $assignedFaculty2->fetch_assoc()) {
                                if ($assignedFacultyRow['fid'] == $currentfid) {
                                    $subject_index = $subject_index + 1;
                                    goto label1;
                                    // $loop += 1;
                                }
                            }
                        }

                        // Insert into timetable and update the remaining number of hours
                        $db->query("Insert into tbl_timetable(bid,semid,day,hour,subid,fid) values ($bid,$semid,'$dayOfWeek',$hour,$currentSubjectid,$currentfid)");
                        $db->query("Insert into tbl_timetable(bid,semid,day,hour,subid,fid) values ($bid,$semid,'$dayOfWeek',$nextHour,$currentSubjectid,$currentfid)");
                        $db->query("Update tbl_subject set subcount=($subjectHours-2) where subid=$currentSubjectid");
                        
                        $subjectHourCount[$subject_index] = $subjectHourCount[$subject_index] - 2;
                        $hour = $hour + 2;
                    }

                    else {
                        $subject_index++;
                        $loop++;
                        goto label1;
                    }

                    $subject_index = $subject_index + 1;
                }

                // $hour++;
            }
            $day += 1;
        }
    }
}
$_SESSION['msg'] = "Timetable generated successfully!";
header("location: ../index.php");
?>