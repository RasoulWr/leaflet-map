<?php

  function insertLocation($data){
    global $pdo;
    $getLocs = getLocations();
    foreach($getLocs as $loc){
      if ($loc->lat == number_format($data['lat'],4) && $loc->lng == number_format($data['lng'],4)){ // convert input data to string for  comparison  with latData in database
        return false;
      }
    }
    //validation here ...
    $sql = "INSERT INTO `locations` (`title`, `lat`, `lng`, `types`) VALUES (:title, :lat, :lng, :typ);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':title'=>$data['title'],':lat'=>$data['lat'],':lng'=>$data['lng'],':typ'=>$data['type']]);
    return $stmt->rowCount();
}

// get all location

function getLocations($params = null){
  global $pdo;
  $condition = '';
  if($params == '1'){
    $condition = "WHERE verified = 1";
  }elseif($params == '0'){
    $condition = "WHERE verified = 0";
  }
  $sql = "SELECT * FROM locations $condition";
  $stmt = $pdo->prepare($sql);
  $stmt ->execute();
  $tupels = $stmt->fetchAll(PDO::FETCH_OBJ);
  return $tupels;
}

// get single location

function getLocation($locationId){
  global $pdo;
  $sql = "SELECT * FROM locations WHERE id =:locId;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':locId' =>$locationId]);
  $tuple = $stmt->fetch(PDO::FETCH_OBJ);
  return $tuple;
}


// toggle location status in admin panel
function toggleStatus($locId){
  global $pdo;
  $sql = 'UPDATE locations SET verified = 1-verified WHERE id = :locid;';
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':locid'=>$locId]);
  return $stmt->rowCount();
}