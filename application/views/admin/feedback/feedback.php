<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data <small>Feedback</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div id="piechart_3d" style=" height: 500px;"></div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Kuis', 'Ya', 'Tidak'],
      <?php  foreach ($data->result_array() as $i) : ?>
        ['<?php echo $i['kuisioner_pertanyaan']; ?>',<?php echo $i['ya']; ?>,<?php echo $i['tidak']; ?>],
      <?php endforeach; ?>
      ]);

    var options = {
      title: 'Feedback',
      is3D: true,
    };
    var options = {
      width: '100%',
      height: '100%'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script>