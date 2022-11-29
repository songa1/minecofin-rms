<?php

@include 'config.php';
$result = $conn->query("SELECT department.department_name as 'DEPARTMENT',staff_register.* FROM staff_register JOIN department ON staff_register.department_name=department.id");
$customers = $result->fetch_all(MYSQLI_ASSOC);

# Get distinct department names from department
$departments = $conn->query("SELECT DISTINCT id,department_name FROM department");
$departments = $departments->fetch_all(MYSQLI_ASSOC);


session_start();

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
    <title>MINECOFIN Restaurant Attendance System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
                    <h1 class="mt-4">Admin Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Welcome</li>
                    </ol>
                  <div class="main">

            
                <div class="gridcon">
                    <div class="grid1 gridd">
                        <img src="../images/user.png" alt="" height="50px">
                        <div class="content">
                          <?php
                          
                          ?>
     
                        </div>
                    </div>
                    <div class="grid2 gridd">
                            <img src="../images/user.png" alt="" height="50px">
                            <div class="content">
                                <h6>System users</h6>
                                <h5><b>Total : 6</b></h5>
         
                            </div>
                    </div>
                    <div class="grid3 gridd">
                            <img src="../images/user.png" alt="" height="50px">
                            <div class="content">
                                <h6>Staff members</h6>
                                <h5><b>Total : 6</b></h5>
         
                            </div>
                    </div>


                </div>

            </div>
                    <!---Table-->
                    <div class="card mb-4">
                        <div class="card-header" style="color: #f17a71;">
                            <i class="fas fa-table me-1"></i>
                             Staff member
                        </div>
                        <div class="card-body" style="color: #f17a71;">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr style="color: #f17a71;">
                                        <th>#</th>
                                        <th>Firstname</th>
                                        <th>lastname</th>
                                        <th>department</th>
                                        <th>position</th>
                                        

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Firstname</th>
                                        <th>lastname</th>
                                        <th>department</th>
                                        <th>position</th>
                                        
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    foreach ($customers as $customer) : ?>


                                        <tr>
                                            <td><?php echo $customer['id'] ?></td>
                                            <td><?php echo $customer['first_name'] ?></td>
                                            <td><?php echo $customer['last_name'] ?></td>
                                            <td><?php echo $customer['DEPARTMENT'] ?></td>
                                            <td><?php echo $customer['position'] ?></td>
                                   
                                    <?php endforeach; ?>

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