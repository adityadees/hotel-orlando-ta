<!DOCTYPE html>
<html lang="en">
<head>

	<?php 
	$b=$invoice->row_array(); 
	$datetime1 = new DateTime($b['booking_awal']);
	$datetime2 = new DateTime($b['booking_akhir']);
	$difference = $datetime1->diff($datetime2);
	?>
	<meta charset="utf-8">
	<title>Invoice : <?php echo $b['booking_kode']; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/invoice/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/bootstrap.min.css" />
	<style type="text/css">

</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="invoice-title">
					Logo
				</div>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td class="no-line" rowspan="3">
											<b>Invoice: <?php echo $b['booking_kode']; ?></b><br>
											Customer: <?php echo $b['customer_nama']; ?><br>
											Telepon: <?php echo $b['customer_tel']; ?><br>
											Email: <?php echo $b['customer_email']; ?><br>
											Alamat: <?php echo $b['customer_alamat']; ?><br>
										</td>
										<td class="no-line text-right" rowspan="3">
											
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Booking Info</strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<td class="text-center"><strong>Room No.</strong></td>
										<td><strong>Room Type</strong></td>
										<td><strong>Arival</strong></td>
										<td><strong>Departure</strong></td>
										<td><strong>Price / Day</strong></td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center"><?php echo $b['kamar_id']; ?></td>
										<td><?php echo $b['tipe_nama']; ?></td>
										<td><?php echo date('d-m-Y',strtotime($b['booking_awal']));?></td>
										<td><?php echo date('d-m-Y',strtotime($b['booking_akhir']));?></td>
										<td><?php echo "Rp ".number_format($b['tipe_harga']); ?></td>
									</tr>

									<tr>
										<td class="thick-line"></td>
										<td class="thick-line"></td>
										<td class="thick-line"></td>
										<td class="thick-line"><strong>Total Day</strong></td>
										<td class="thick-line"><?php echo $difference->days." Hari"; ?></td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"><strong>Subtotal</strong></td>
										<td class="no-line">
											<?php 
											$subtot=($difference->days*$b['tipe_harga']); 
											echo "Rp. ".number_format($subtot);
											?>

										</td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"><strong>Discount</strong></td>
										<td class="no-line">


											<?php 
											$kode=$b['tipe_kode']; 
											$cdsk=$this->m_padmin->get_promo_by_kode($kode);
											$gdsk=$cdsk->row_array();
											$pstart=$gdsk['promo_start'];
											$pend=$gdsk['promo_end'];
											$date=date('Y-m-d');
											if($date>=$pstart || $date<=$pend){
												if($difference->days>=$gdsk['promo_min_hari']){
													$total=(($subtot*$gdsk['promo_diskon'])/100);
													$stot=$subtot-$total;
													echo $gdsk['promo_diskon']."%";

												}
												else {
													echo "Rp. 0";
													$stot=$difference->days*$subtot;
												}
											}
											else {
												echo "Rp. 0";
												$stot=$difference->days*$subtot;
											}
											
											?>
										</td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line"><strong>Total</strong></td>
										<td class="no-line"><?php echo "Rp. ".number_format($stot); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>
</html>