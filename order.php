<?php
if(isset($_POST['number'])){
$number = $_POST["number"];
$number = stripslashes($number);
$number = htmlspecialchars($number);
$number = trim($number);
}else{
$number = '000101813';
}

//$url = "http://127.0.0.1:6060/dealwd_delivery_rest/deliveries/id/".$number."/RU";
$url = "http://127.0.0.1:6060/dealwd_delivery_rest/delivery/barcode/".$number."/RU";

$xml = simplexml_load_file($url);

//$from = $xml->from;
//$to = $xml->to;
$barcode = (integer) $xml->barcode;
$status = $xml->track;
$places = (integer) $xml->places;
$weight = (integer) $xml->weight;
$volume = (integer) $xml->volume;
$dateBegin = (integer) $xml->dateBegin;
$dateEnd = (integer) $xml->dateEnd;
/*
$url = "http://5.9.23.89:7070/dealwd_delivery_rest/clients/list/EN";
$xml = simplexml_load_file($url);

foreach ($xml->clients as $c) {
	if ((string) $from == (string) $c->id) {
		$from = $c->nameFirst . ' ' . $c->nameMiddle . ' ' . $c->nameLast;
	}
	if ((string) $to == (string) $c->id) {
		$to = $c->nameFirst . ' ' . $c->nameMiddle . ' ' . $c->nameLast;
	} 
}
*/
$status_arr = array();
$from = '';
$to = '';

//$url = "http://5.9.23.89:7070/dealwd_delivery_rest/deliveries/status/list/EN";
$url = "http://127.0.0.1:6060/dealwd_delivery_rest/delivery/status/list/RU";
$xml = simplexml_load_file($url);

foreach ($status->status as $st) {
	foreach ($xml->status as $s) {
		if ((string) $st->status == (string) $s->id) {
			$status_pos = (string) $s->name;
		}
	}

	$arr = array();
	array_push($arr, $status_pos);
	array_push($arr, (string) $st->date);
	array_push($status_arr, $arr);
}

/*
foreach ($xml->statuses->status as $s) {
	if ((string) $status == (string) $s->id) {
		$status_pos = (string) $s->pos;
	}
}
$status = array();
foreach ($xml->statuses->status as $s) {
	if ((string) $status_pos >= (string) $s->pos) {
		array_push($status, (string) $s->name);
	}
}

$url = "http://127.0.0.1:6060/dealwd_delivery_rest/country/list/RU";
$xml = simplexml_load_file($url);

$countries = json_encode($xml);*/
$object = (object) ['from'=>$from, 'to'=>$to, 'status'=>$status_arr, 'barcode'=>$barcode, 'places'=>$places, 'weight'=>$weight, 'volume'=>$volume, 'dateBegin'=>$dateBegin, 'dateEnd'=>$dateEnd];
$data = array();
array_push($data, $object);
$data = json_encode($data);
echo $data;
?>