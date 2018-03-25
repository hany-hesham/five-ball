<!DOCTYPE html>
<html lang="en">
	<head>
	<?php $this->load->view('header'); ?>
		<style type="text/css">
			@media print{
				.summary{
					width: 300px !important;
				}
				.real{
					width: 680px !important;
				}
				.hany{
					display: block !important;
				}
			}
			@page{
				margin:20px auto;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<?php $this->load->view('menu') ?>
			<div id="page-wrapper">
				<button onclick="window.print()" class="non-printable form-actions btn btn-success" href="" >Print</button>
    			<a class="form-actions btn btn-success non-printable" href="/fin_report" style="float:right;" > Back </a>
				<div class="container" style="margin-left: -20px !important; margin-right: 20px !important;">
					<div class="rest-selector col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php if(validation_errors() != false): ?>
			                <div class="alert alert-danger">
			                  	<?php echo validation_errors(); ?>
			                </div>
			            <?php endif ?>   
						<fieldset class="non-printable">
							<legend class="title-table">Out Going Delay Report</legend>
							<?php $this->load->view('out_go_delay_report_menu'); ?>
						</fieldset>
					</div>
					<?php if (isset($out_gos)): ?>	
						<div class="hany" style="float:right; margin-right: -35px !important; margin-left: 20px !important; display: none;">
							<?php if (isset($hotel) && $hotel): ?>	
								<div class="header-logo"><img src="/assets/uploads/logos/<?php echo $hotel['logo']; ?>"/></div>
								<h2 class="centered"><?php echo $hotel['name'];?></h2> 
							<?php endif; ?>
							<h3 class="centered">Out Going Delay Report</h3>
							<?php if (isset($from_date) && $from_date): ?>	
								<h4 class="centered">From <?php echo $from_date;?> To <?php echo $to_date;?></h4>
							<?php endif; ?>
						</div>
						<br>
						<div style="float: left;">
							<table class="table table-striped table-bordered table-condensed">
								<tr>
									<td style="background-color: green; width: 100px">
										
									</td>
									<td  style="background-color: red; width: 100px">
										
									</td>
								</tr>
								<tr>
									<td>
										Delivered
									</td>
									<td>
										Not Delivered
									</td>
								</tr>
							</table>
						</div>
						<div class="centered">
							<table class="table table-striped table-bordered table-condensed" style="width:1200px; margin-left: -20px !important; margin-right: 40px !important;">
								<tbody>
									<tr>
										<th style="width: 100px;" class="centered">ID#</th>
										<th style="width: 100px;" class="centered">Form ID#</th>
										<th style="width: 300px;" class="centered">Hotel Name</th>
										<th style="width: 150px;" class="centered">Department</th>
										<th style="width: 150px;" class="centered">Description</th>
										<th style="width: 150px;" class="centered">Address</th>
										<th style="width: 100px;" class="centered">Quantity</th>
										<th style="width: 650px;" class="centered">Remarks</th>
										<th style="width: 300px;" class="centered">Date</th>
										<th style="width: 250px;" class="centered">Date of Return</th>
										<th style="width: 100px;" class="centered">Reason for Changing Date of Return</th>
										<th style="width: 250px;" class="centered">Date of Actual Return</th>
										<th style="width: 250px;" class="centered">Delayed For</th>
										<th style="width: 250px;" class="centered">Attachment</th>
									</tr>
								</tbody>
								<tbody>
									<?php $total1 =0; ?>
									<?php foreach ($out_gos as $out_go): ?>
										<tr>
											<td class="centered"><?php echo $out_go['id'] ?></td>
											<td class="centered"><?php echo $out_go['out_id'] ?></td>
											<td class="centered"><?php echo $out_go['hotel_name'] ?></td>
											<td class="centered"><?php echo $out_go['department'] ?></td>
											<td class="centered">
												<?php ?>
													<div style="
														<?php if($out_go['delivered'] == 1){
															echo'background-color: green;';
														}else{
															echo'background-color: red;';
														} ?>"
													>
														<?php echo $out_go['description'] ?>
													</div>
											</td>
											<td class="centered"><?php echo $out_go['address'] ?></td>
											<td class="centered">
													<?php $total1 = $total1 + $out_go['quantity']; ?>
													<?php echo $out_go['quantity'] ?>
											</td>
											<td class="centered">
													<?php echo $out_go['remarks'] ?>
											</td>
											<td class="centered"><?php echo $out_go['date'] ?></td>
											<td class="centered">
												<div>
													<?php echo $out_go['re_date'] ?>
													<?php $re_date = 0; ?>
												</div>
												<?php foreach ($out_go['dates'] as $row): ?>
													<div>
														<?php echo $row['date'] ?>
														<?php $re_date = $row['date']; ?>
													</div>
												<?php endforeach ?>	
											</td>
											<td class="centered">
												<?php foreach ($out_go['dates'] as $row): ?>
													<div>
														<?php echo $row['reason'] ?>
													</div>
												<?php endforeach ?>	
											</td>
											<td class="centered">
													<div style="
														<?php if($out_go['delivered'] == 1){
															echo'background-color: green;';
														}else{
															echo'background-color: red;';
														} ?>"
													>
														<?php echo $out_go['del_date'] ?>
													</div>
											</td>
											<td class="centered">
												<?php 
													if ($out_go['dates']) {
														$date = $re_date;
													}else{
														$date = $out_go['re_date'];
													}
													$date .=" 00:00:00";
													$date1 = strtotime($date);
														if ($out_go['delivered'] == '1') {
															$date0 = $out_go['del_date'];
															$date0 .=" 00:00:00";
															$date2 = strtotime($date0);
														}else{
									                    	$date2 = strtotime(date("Y-m-d H:i:s"));
									                    }
	                    								$vall = 0;
									                    if ($date1 >= $date2) {
										                    $date = $date1 - $date2; 
										                    $vall = 1;
									                  	}else{
										                    $date = $date2 - $date1; 
										                    $vall = 2;
										                }
									                    $years = floor($date / (365*60*60*24));
									                    $months = floor(($date - $years * 365*60*60*24) / (30*60*60*24));
									                    $days = floor(($date - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
									                    $hours = floor(($date - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
									                    $minuts  = floor(($date - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
									                    $seconds = floor(($date - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
									                    ?>
														<div 
															<?php if($years==0){
																echo 'style="display:none;"';
															}?>
														>
															<?php echo $years?> Years
														</div>
														<div 
															<?php if($months==0){
																echo 'style="display:none;"';
															}?>
														>
															<?php echo $months?> Months
														</div>
														<div 
															<?php if($days==0){
																echo 'style="display:none;"';
															}?>
														>
															<?php echo $days?> Days
														</div>
											</td>
											<td class="centered">
												<img style="width: 100px; height: 100px;" src="/assets/uploads/files/<?php echo $out_go['fille']; ?>"/>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</body>
</html>