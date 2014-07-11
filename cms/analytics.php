<?php
$today = date("Y-m-d");
// Load zend loader
require_once("Zend/Loader.php");
Zend_Loader::loadClass('Zend_Gdata');
Zend_Loader::loadClass('Zend_Gdata_Analytics');
Zend_Loader::loadClass('Zend_Gdata_Query');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
$email = 'pedrosimao@gmail.com';
$password = '4f0n5051m40';
$client = Zend_Gdata_ClientLogin::getHttpClient($email, $password, Zend_Gdata_Analytics::AUTH_SERVICE_NAME);
$service = new Zend_Gdata_Analytics($client);

//Total
$query = $service->newDataQuery()
    ->setProfileId('45738541')
    ->addMetric(Zend_Gdata_Analytics_DataQuery::METRIC_BOUNCES)
    ->addMetric(Zend_Gdata_Analytics_DataQuery::METRIC_VISITS)
	->addMetric(Zend_Gdata_Analytics_DataQuery::METRIC_PAGEVIEWS)
    ->setStartDate('2010-01-01')
    ->setEndDate($today)
    ->setSort(Zend_Gdata_Analytics_DataQuery::METRIC_VISITS, true)
    ->setMaxResults(25);
$result = $service->getDataFeed($query);
?>

<div>
	<div class="modal_header">
		<span>Analise </span>
	</div>
	<div class="modal_content">
<?php
$i = 0;
foreach($result as $row){
	echo "<div>";
	echo "<p>Total de Visitas: <b>" . $row->getMetric('ga:visits')."</b></p>";
    echo "<p>Total de Pageviews: <b>" . $row->getMetric('ga:pageviews')."</b></p>";
	echo "</div>";
}

//Por referencia
$query2 = $service->newDataQuery()
    ->setProfileId('45738541')
    ->addDimension(Zend_Gdata_Analytics_DataQuery::DIMENSION_MEDIUM)
    ->addDimension(Zend_Gdata_Analytics_DataQuery::DIMENSION_SOURCE)
    ->addMetric(Zend_Gdata_Analytics_DataQuery::METRIC_BOUNCES)
    ->addMetric(Zend_Gdata_Analytics_DataQuery::METRIC_VISITS)
    ->setFilter(Zend_Gdata_Analytics_DataQuery::DIMENSION_MEDIUM."==referral")
    ->setStartDate('2010-01-01')
    ->setEndDate($today)
    ->setSort(Zend_Gdata_Analytics_DataQuery::METRIC_VISITS, true)
    ->setMaxResults(25);
$result = $service->getDataFeed($query2);

echo "<br>";
echo "<div>Visitas por referencia:</div>";
echo "<div><table><tr><td><b>Referencia</b></td><td><b>Visitas</b></td></tr>";
foreach($result as $row){
	echo "<tr>";
    echo "<td>" . $row->getDimension(Zend_Gdata_Analytics_DataQuery::DIMENSION_SOURCE) . "</td>"; // default dimension
    echo "<td style='text-align:right'>" . $row->getMetric('ga:visits') . "</td>"; // metrics only
	echo "</tr>";
}
echo "</table></div>";
?>
	<div><br><br>API <a href="http://www.google.com/analytics/">Google&copy; Analytics&trade;</a><br><?php echo $today; ?></div>
	</div>
</div>