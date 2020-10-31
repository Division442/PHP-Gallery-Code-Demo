  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Views',     <?php echo $session->count; ?>],
        ['Photos',    <?php echo Photo::count_all()?>],
        ['Comments',   <?php echo Comment::count_all()?>],
        ['Users',  <?php echo User::count_all()?>]
        ]);

        var options = {
        legend: 'none',
        pieSliceText: 'label',
        title: 'Gallery Statistics',
        backgroundColor: 'transparent',
        is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

</script>

</html>
