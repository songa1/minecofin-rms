



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>minecofin Restaurant attendance system</title>
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
  &:hover {
    background: rgba(20, 20, 20, .8);
    padding: 10px 80px;
  }
}
    </style>
</head>

<body class="sb-nav-fixed">
       <?php include "navbar.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="home.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Admin Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Activities</div>
                           <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Forms and tables
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Manage system
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="users.php">Register users</a>
                                         <a class="nav-link" href="view.php">Manage Employee</a>
                                          <a class="nav-link" href="attendance.php">Attendance</a>
                                    </nav>
                                </div>
                               
                            </nav>
                        </div>

                         <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                           Reports
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Dark mode </a>
                                <a class="nav-link" href="#">Light mode</a>
                            </nav>
                        </div>
                       
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                   <h5> <span> System Admin</span></h5>
      <h6>welcome <span></span></h6>
      
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Welcome to Attendance page</h1>
                    <ol class="breadcrumb mb-4">
                       <a href="signup.php"><button type="button" id="join-btn">Add Employee</button></a> 
                    </ol>
                  
                    <div class="card mb-4">
                        <div class="card-header" style="color: #f17a71;">
                            <i class="fas fa-table me-1"></i>
                            View System users
                        </div>
                        <div class="card-body" style="color: #f17a71;">
               
            	<center>
		<h3 class="text-center">Report</h3>
		<table class="table table-bordered">
				                     <tr><th>#</th> 
                                        <th>Firstname</th>
                                        <th>lastname</th>
                                        <th>department</th>
                                        <th>position</th>
                                        
                                
				<?php
				$sel=$mysqli->query("select first_name,last_name,department_name,position from staff_register");
				$no="";
                while ($row=mysqli_fetch_array($sel)) {
                	$no++;
                	?>
                <tr>
					 <td><?php echo $no;?></td>
					<td><?php echo $customer['first_name'];?></td>
					<td><?php echo $customer['last_name'];?></td>
                    	<td><?php echo $customer['department_name'];?></td>
                    	<td><?php echo $customer['position'];?></td>
                </tr>
                <?php
                }
				?>
			</table>
	</center>





            
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy;ishimwe deborah 2022</div>
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