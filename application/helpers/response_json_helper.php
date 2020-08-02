<?php

function response_json($data)
{
	$data_json =  json_encode($data);
	echo '<pre>';
	print_r($data_json);
}
