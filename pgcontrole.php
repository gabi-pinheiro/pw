<?php include("conexao.php");
include("menu.php");

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:login.php');
  }

$logado = $_SESSION['login'];

    $stmt = $pdo->prepare("select count(*) from tbproduto where idCategoria='1'");	
    $stmt ->execute();
    $row = $stmt ->fetch(PDO::FETCH_NUM);
    $alimentos = $row[0];
    $stmt2 = $pdo->prepare("select count(*) from tbproduto WHERE idCategoria='2'");	
    $stmt2 ->execute();
    $row2 = $stmt2 ->fetch(PDO::FETCH_NUM);
    $plantas = $row2[0];


?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

    var data = new google.visualization.DataTable();
    var data2 = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data2.addColumn('string', 'Topping');
    data2.addColumn('number', 'Número de items');
    data.addRows([
        ['Brinquedos',<?php echo $alimentos; ?> ],          
        ['Cosméticos',<?php echo $plantas; ?>],                 
    ]);
    data2.addRows([
        ['Brinquedos',<?php echo $alimentos; ?> ],          
        ['Cosméticos',<?php echo $plantas; ?>],                 
    ]);
    var data3 = google.visualization.arrayToDataTable([
          ['Mês', 'Brinquedos', 'Cosméticos'],
          ['janeiro',  1, 0],
          ['fevereiro',  2, 4],
          ['março',  5, 1],
          ['abril',  3, 4]
        ]);

    var options = {'title':'Produtos disponíveis por categoria',
                    'width':500,
                    'height':400};

    var options2 = {'title':'Categorias mais compradas',
                    'width':600,
                    'height':400};

    var options3 = {
          title: 'Minhas compras por categoria',
          hAxis: {title: '',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
    var chart2 = new google.visualization.BarChart(document.getElementById('chart_div2'));
    chart2.draw(data2, options2);
    var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));
    chart3.draw(data3, options3);
    }
</script>
<section>
    <h2>Minha Dashboard</h2>
    <div class="graphBox">
        
        <div class="box">
            <div id="chart_div"></div>
        </div>
        <div class="box">
            <div id="chart_div2"></div>
        </div>
    </div>	
    <div id="chart_div3" style="width: 100%; height: 500px;"></div>
</section>

