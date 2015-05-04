<?php
// report all errors
error_reporting(-1);

$json = preProcess();

require_once 'connect.php';

submitQuery($json);

mysql_close($db_server);

/**
 * Check the form before connecting to the database
 */
function preProcess() {
  $json = array();
  $errors = array();

  // species select is required
  array_key_exists('species',$_REQUEST)
  and $species = $_REQUEST['species']
  or $errors['species'] = 'missing value';
  switch($species) {
    case 'cat':
    case 'dog':
      break;

    default:
      $errors['species'] = 'incorrect value: ' . $species;
  };

  // breed select is required
    array_key_exists('breed',$_REQUEST)
    and $breed = $_REQUEST['breed']
    or $errors['breed'] = 'missing value';
    switch($breed) {
      case 'chihuahua':
      case 'terrier':
      case 'labrador':
      case 'shepard':
      case 'miniature pinscher':
      case 'beagle':
      case 'bulldog':
      case 'cocker spaniel':
      case 'boxer':
      case 'pit bull':
      case 'pug':
      case 'pomeranian':
      case 'mixed':
        break;

      default:
        $errors['breed'] = 'incorrect value: ' . $breed;
    };

  // sex select is required
    array_key_exists('sex',$_REQUEST)
    and $sex = $_REQUEST['sex']
    or $errors['sex'] = 'missing value';
    switch($sex) {
      case 'male':
      case 'female':
        break;

      default:
        $errors['sex'] = 'incorrect value: ' . $sex;
     };

  // size select is required
    array_key_exists('size',$_REQUEST)
    and $size = $_REQUEST['size']
    or $errors['size'] = 'missing value';
    switch($size) {
      case 'small':
      case 'medium':
      case 'large':
        break;

      default:
        $errors['size'] = 'incorrect value: ' . $size;
    };

  $json['errors'] = $errors;

  $json['submitted'] = array(
    'species' => $species,
    'breed' => $breed,
    'sex' => $sex,
    'size' => $size
  );;

  if(count($errors) > 0) {
    die(json_encode($json, 128) . "\n");
  }

  return $json;
}

/**
 * Check the form before connecting to the database
 */
function submitQuery($json) {
  // print_r($json);

  $columns = '';
  $values = '';
  $comma = '';    // omit the first comma

  $species = $json['submitted']['species'];
  $breed = $json['submitted']['breed'];
  $sex = $json['submitted']['sex'];
  $size = $json['submitted']['size'];

  $query = "select animalID, status, name, species, breed, sex, size, description, picURL from available where species like '%$species%' AND breed like '%$breed%' AND sex like '%$sex%' AND size like '%$size%' limit 100;";
  $json['query'] = $query;

  $result = mysql_query($query);
  if($result == null) {
    $json['errors'] = array(
      "MySQL error: " . mysql_error(),
      "Query: " . $query,
    );
    die(json_encode($json, 128) . "\n");
  }

  $json['result'] = array();
  while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $json['result'][] = $row;
  }

  $json['success'] = true;
  print(json_encode($json, 128) . "\n");
}
?>