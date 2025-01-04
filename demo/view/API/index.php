<?php 
  if(!isset($data) or !($data))
    http_response_code(404);
  else
    header("Content-Type: application/json; charset=UTF-8");
  $jsonData = json_encode($data, JSON_INVALID_UTF8_IGNORE);
  echo $jsonData;
