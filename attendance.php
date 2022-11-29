<?php
include 'config.php';
$qs= "SELECT * FROM attendance";
$attendances = $conn->query($qs);

// session start if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['admin_name'])){
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Attendance - MINECOFIN RMS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
      <style>
        #join-btn {
  border: 1px solid #f17a71;
  background: #f17a71;
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
}
    </style>
</head>

<body class="sb-nav-fixed">
       <?php include "navbar.php"; ?>
    <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="color:#27254a;"> 
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="home.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Admin Dashboard
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                           Reports
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="attendancereport.php">Attendance Report</a>
                                <a class="nav-link" href="#">User Report</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Activities</div>
                       
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Manage Users
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="users.php">View/Add Users</a>
                                <a class="nav-link" href="try.php">Manage Employee</a>                          
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#attendance"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Manage Attendance
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="attendance" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="attendance.php">Record Attendance</a>                           
                            </nav>
                        </div>

                        
                       
                <div class="sb-sidenav-footer" style="color:grey;">
                    <div class="small">Logged in as:</div>
                   <h5><?php echo $_SESSION['admin_name'] ?></span></h5>
      
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Today's Attendance</h1>
                    <ol class="breadcrumb mb-4">
                       <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#attendModal">Make attendance</button>
                    </ol>
                  
                    <div class="card mb-4">
                        <div class="card-header" style="color: #f17a71;">
                            <i class="fas fa-table me-1"></i>
                            View Today's attendance
                        </div>
                        <div class="card-body" style="color: #f17a71;">
                            <table id="datatablesSimple" >
                                <thead>
                                    <tr style="color: #f17a71;">
                                        <th>#</th> 
                                        <th>Names</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if ($attendances->num_rows > 0) {
                            
                                            while($att = $attendances->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $att['id']; ?></td>
                                        <td><?php echo $att['user_name']; ?></td>
                                        <td><?php echo $att['amount']; ?></td>
                                        <td><?php echo $att['attend_date']; ?></td>
                                        <td>edit</td>
                                    </tr>

                                    <?php
                                            }
                                        }
                                    ?>
                             </tbody>
                            </table>
                        </div>    
                    </div>
                </div>
            
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Ishimwe Deborah 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>




    <div class="modal fade" id="attendModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Record attendance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!--registration form-->
                    <form id="saveUserForm" method="POST">

                        <div class="mb-3">
                            <label for="InputFirst_name" class="form-label">Names</label>
                            <input type="text" name="username" class="form-control" id="username" required>

                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" name="time" class="form-control" id="time" required>

                        </div>                        

                        <div class="mb-3">
                            <label for="Inputdepartment_name" class="form-label">User Role</label>
                            <select class="form-select" aria-label="Default select example" id="Inputuser_type" name="user_type" required>
                                <option value="Financial">Financial</option>
                                <option value="admin">admin</option>
                                <option value="HR">HR</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_att">Save attendance</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <?php 
        
        if(isset($_POST['submit_att'])){

            $atttime = $_POST['time'];
            $attuser = $_POST['username'];
            $attuserrole = $_POST['user_type'];
            $today = date('Y-m-d H:i:s');
            
            $sql = "INSERT INTO attendance (`user_name`, `amount`, `attend_date`) VALUES ('$attuser', '900', '$today')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Attendance added!');</script>";
            } else {
                echo "Error";
            }
            $conn->close();
        }
    
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>   