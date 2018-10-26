<?php
$cpem=$pembayaran->row_array();
$cin=$checkin->row_array();
$tinap=$twaitcheck->row_array();
?>
<style type="text/css">
.chart {
  width: 100%; 
  min-height: 450px;
}
</style>
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12">
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12 text-danger">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-clock-o text-danger"></i></div>
          <div class="count"><?php echo $cpem['cpembayaran']; ?></div>
          <h3>Menunggu </h3>
          <p>Pembayaran</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12 text-info">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-cart-arrow-down text-info"></i></div>
          <div class="count"><?php echo $cin['ccheckin']; ?></div>
          <h3>Total</h3>
          <p>Checkin</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12 text-success">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-check text-success"></i></div>
          <div class="count"><?php echo $tinap['cwait']; ?></div>
          <h3>Menunggu</h3>
          <p>Checkin</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-6">
        <div class="x_panel">
          <div class="x_title">
            <h2>Grafik Penginap</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Bulan', 'Penginap'],
                  <?php foreach ($gbooking->result_array() as $i) : ?>
                    ['<?php echo $i['bulan']; ?>',  <?php echo $i['jumlah']; ?>],
                  <?php endforeach; ?>

                  ]);

                var options = {
                  title: 'Grafik Tahunan',
                  curveType: 'none',
                  legend: { position: 'bottom' },
                  hAxis: {
                    title: 'Bulan',
                  },
                  vAxis: { 
                    title: 'Jumlah',
                  } ,
                  pointSize: 4,

                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
              }
            </script>
            <div id="curve_chart" style="width: 100%"></div>

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="x_panel">
          <div class="x_title">
            <h2>Grafik Pendapatan</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Bulan', 'Penginap'],
                  <?php foreach ($sumonth->result_array() as $i) : ?>
                    ['<?php echo $i['bulan']; ?>',  <?php echo $i['jumlah']; ?>],
                  <?php endforeach; ?>

                  ]);

                var options = {
                  title: 'Grafik Tahunan',
                  curveType: 'none',
                  legend: { position: 'bottom' },
                  hAxis: {
                    title: 'Bulan',
                  },
                  vAxis: { 
                    title: 'Pendapatan (Rp.)',
                  } ,
                  pointSize: 4,

                };

                var chart = new google.visualization.LineChart(document.getElementById('sumonth'));

                chart.draw(data, options);
              }
            </script>
            <div id="sumonth" style="width: 100%"></div>

          </div>
        </div>
      </div>




    </div>

  </div>
</div>
