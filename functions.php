<?php
include 'cnct.php';
// prepare and bind
$stmt = $link->prepare("INSERT INTO product_tbl (P_ID, P_CAT, P_SUB, P_PARTNO, P_DESC) VALUES (null, ?, ?, ?, ?)");
$stmt->bind_param('ssss', $cat, $subcat, $partno, $desc);

require_once('PHPExcel.php');
date_default_timezone_set('Europe/London');

include 'PHPExcel/IOFactory.php';
$inputFileName = 'test_data.xlsx';
if(file_exists($inputFileName)){
	//  Read your Excel workbook
	try {
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
	} catch (Exception $e) {
		die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) 
		. '": ' . $e->getMessage());
	}

	//  Get worksheet dimensions
	$sheet = $objPHPExcel->getSheet(0);
	$highestRow = $sheet->getHighestRow();
	$highestColumn = $sheet->getHighestColumn();

	//  Loop through each row of the worksheet in turn
	for ($row = 2; $row <= $highestRow; $row++) {
		//  Read a row of data into an array
		$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
		foreach($rowData[0] as $k=>$v){
			if ($k==0){$cat = $v;}
			if ($k==1){$subcat = $v;}
			if ($k==2){$partno = $v;}
			if ($k==3){$desc = $v;}
		}
		$stmt->execute();
	}
	$stmt->close();
	$link->close();
	rename($inputFileName, $inputFileName."backup");
}

function getUserIP(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    } elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    return $ip;
}

function getDBinfo(){
	include 'cnct.php';
	$ret = "<h3>Information</h3>";
	$numcats = "SELECT DISTINCT(P_CAT) FROM product_tbl";
	if ($nc=mysqli_query($link,$numcats)){
		$catcount = mysqli_num_rows($nc);
	} else {$catcount = "Can't read from database";}
	$ret .= "<p><b>Number of Categories: </b>".$catcount;
	$totalrows = "SELECT * FROM product_tbl";
	$totalrows=mysqli_num_rows(mysqli_query($link,$totalrows));
	$ret .= "<br /><b>Total entries: </b>".$totalrows."</p>";
	$ret .= "<p><b>Visitor IP: </b>".getUserIP();
		include("geoip.inc");
		include("geoipcity.inc");
		include("geoipregionvars.php");
		$gi = geoip_open("GeoLiteCity.dat", GEOIP_STANDARD);
		$rsGeoData = geoip_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
		$ret .= "<br /><b>Country: </b>".$rsGeoData->country_name." (".$rsGeoData->country_code."/".$rsGeoData->country_code3.")";
		$ret .= "<br /><b>Region: </b>".$rsGeoData->region;
		$ret .= "<br /><b>City: </b>".$rsGeoData->city;
		$ret .= "<br /><b>Postal code: </b>".$rsGeoData->postal_code;
		$ret .= "<br /><b>Latitude: </b>".$rsGeoData->latitude;
		$ret .= "<br /><b>Longitude: </b>".$rsGeoData->longitude;
		$ret .= "<br /><b>Area code: </b>".$rsGeoData->area_code;
		$ret .= "<br /><b>Dma code: </b>".$rsGeoData->dma_code;
		$ret .= "<br /><b>Metro code: </b>".$rsGeoData->metro_code;
		$ret .= "<br /><b>Continent code: </b>".$rsGeoData->continent_code."</p>";
		geoip_close($gi);
		
		$msstat = mysqli_stat($link); 
		$msinfo = mysqli_get_host_info($link); 
		$ret .= "<p><b>MySql client info: </b>".mysqli_get_client_info();
		$ret .= "<br /><b>MySql connection info: </b>".$msinfo;
		$ret .= "<br /><b>MySql status: </b>".$msstat."</p>"; /* */
	
	$ret .= " <a class='btn btn-success btn-sm hideStats'>Hide</a>";
echo $ret;
}

?>