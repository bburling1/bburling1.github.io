<?php
  //start session management
  session_start();
  //connect to the database
  require('../model/database.php');
  require('../model/functions_users.php');

  //manually retrieve unique api key
  $apikey = "RGAPI-12409ba4-3bb9-44d8-abd3-46263eecc0f1";
  //retrieve post data
  $lolusername = $_POST['lolusername'];
  $region = $_POST['region'];
  $user_id = $_POST['user_id'];

  //retrieve League of Legends ID
  $json = @file_get_contents("https://$region.api.riotgames.com/lol/summoner/v3/summoners/by-name/$lolusername?api_key=$apikey");
  if($json === FALSE){
    $_SESSION['error'] = "Unable to find username";
    header('location:../view/profile.php');
  } else {
    $data = json_decode($json, TRUE);
    $riotid = $data['id'];
    if(isset($riotid)){
      //insert riot summoner id into users database entry
      $result = save_riot_id($riotid, $user_id);
      $json = @file_get_contents("https://$region.api.riotgames.com/lol/league/v3/positions/by-summoner/$riotid?api_key=$apikey");
      if($json === FALSE){
        $_SESSION['error'] = "Error retrieving data";
        header('location:../view/profile.php');
      } else {
        $data = json_decode($json, TRUE);
        $rank = $data[0];
        $rank = $rank['tier'] . $rank['rank'];
        $result = save_stats($rank, $user_id, $lolusername, $region);
        $_SESSION['success'] = "Account data successfully retrieved. View your rank now!";
        $_SESSION['acclinked'] = TRUE;
        header("location:../view/profile.php");
      }
    }
  }



?>
