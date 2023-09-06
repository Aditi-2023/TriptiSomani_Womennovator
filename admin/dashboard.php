<?php 
session_start();
include_once('../conf/Db.php');
include_once('components/Dashboard.php');
include_once('components/Med_CommonClass.php');
include_once('components/Admin.php');
//include_once('autoload.php');
//Auth::handleLogin();
$dashboard=new Dashboard();

//$reportarr=$dashboard->getDashboardOrderFigures();

//print_r($reportarr);
$med_common_Obj=new Med_CommonClass(); 
//$registeredDrivers=$dashboard->getRegisteredDrivers();
//total_employee=$med_common_Obj->totalnumberofrows('med_employee');
//$total_employers=$med_common_Obj->totalnumberofrows('med_employers');
//$total_jobpost=$med_common_Obj->totalnumberofrows('med_job_post');

?>
<!DOCTYPE html>
<html lang="en">
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

<?php include_once('all-css.php'); ?>
</head>

	<body class="main-body app  sidebar-mini leftmenu-dark">
	
	<?php include_once('sidebar.php'); ?>
		<!-- main-content -->
		<div class="main-content app-content">
		
				<?php include_once('header.php'); ?>
			<!-- container -->
			<div class="container-fluid">
								<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Welcome, <?php echo $adminName; ?></h2>
						  <p class="mg-b-0">Analytic Dashboard.</p>
						</div>
					</div>
					
				</div>
				<!-- /breadcrumb -->
								<!-- row -->
				<!--<div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">Total Employee</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">
												<?php echo $total_employee; ?></h4>
											<p class="mb-0 tx-12 text-white op-7"></p>
										</div>
										
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">Total Employee</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">
												<?php echo $total_employers; ?></h4>
											
										</div>
										
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
				
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">Total Job Vacancy</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white"><?php 
											echo $total_jobpost;?></h4>
											<p class="mb-0 tx-12 text-white op-7"></p>
										</div>
										
									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>-->
                    
				
			</div>
			<!-- /Container -->
		</div>
		<!-- /main-content -->
				<?php include_once('footer.php'); ?>
	</body>

</html>