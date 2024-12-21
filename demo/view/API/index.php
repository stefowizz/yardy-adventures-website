<?php 
  header("Content-type: application/json");
  $jsonData = json_encode($data, JSON_INVALID_UTF8_IGNORE);
  echo $jsonData;
