<?php
include 'config.php';
$result = $conn->query("SELECT * FROM user_form");
$customers = $result->fetch_all(MYSQLI_ASSOC);

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
    <title>Users - MINECOFIN RMS</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    <h1 class="mt-4">System users</h1>
                    <ol class="breadcrumb mb-4">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                            Add user
                                        </button>

                                    </div>


                    </ol>

                    <div class="card mb-4">
                        <div class="card-header" style="color: #f17a71;">
                            <i class="fas fa-table me-1"></i>
                            View System users
                        </div>
                        <div class="card-body" style="color: #f17a71;">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr style="color: #f17a71;">
                                        <th>#</th>
                                        <th>names</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($customers as $customer) : ?>


                                        <tr>
                                            <td><?php echo $customer['id'] ?></td>
                                            <td><?php echo $customer['name'] ?></td>
                                            <td><?php echo $customer['email'] ?></td>
                                            <td><?php echo $customer['user_type'] ?></td>
                                           
                                            <td><button id="editUser" data-id="<?php echo $customer['id'] ?>" class="btn btn-sm btn info">
                                                    <i class="fas fa-edit"></i>
                                            </button>
                                            </td>
                                        </tr>
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
        </div>
    </div>
    </footer>
    </div>
    </div>

    <!--modal-->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!--registration form-->
                    <form id="saveUserForm" action="javascript:void();" method="POST">

                        <div class="mb-3">
                            <label for="fname" class="form-label">Name</label>
                            <input type="text" name="fname" class="form-control" id="fname" required>

                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                          <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm password</label>
                            <input type="password" name="cpassword" class="form-control" id="cpassword" required>
                        </div>
                        

                        <div class="mb-3">
                            <label for="role" class="form-label">User Role</label>
                            <select class="form-select" aria-label="User Role" id="role" name="role" required>
                                <option value="Financial">Financial</option>
                                <option value="Admin">Admin</option>
                                <option value="HR">HR</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="addUser">Save user</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['addUser'])){
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $cpass = $_POST['cpassword'];
            $role = $_POST['role'];

            // $res = $conn->query("INSERT INTO users () VALUES ('$fname, $email, ')")
        
        }
    ?>


    <!--End of modal-->

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
   
</body>

</html>