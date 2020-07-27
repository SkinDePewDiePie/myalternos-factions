<?php
require(dirname(__FILE__)."/config.inc.php");
$curl = extension_loaded("curl") ? curl_init() : false;
$protocol = $ssl ? "https://" : "http://";
$url = "$protocol$url:$port";

if(!$curl){
  echo json_encode(array("error" => true, "message" => "You need to enable cURL extension !"));
  return false;
}

function getFactionInfos($id){
  $id = is_int($id);
  if(!$id){
    echo json_encode(array("error" => true, "message" => "You need to set ID (int) !"));
    return false;
  }
 
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_URL, "$url/getAllFactionInfos?id=$id");

  $result = curl_exec($ch);
  curl_close($ch);

  return $result;
}

function getAllFactionsInfos(){
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_URL, "$url/getAllFactionsInfos");

  $result = curl_exec($ch);
  curl_close($ch);

  return $result;
}
