<?php
//create a function to retrieve the total number of matching usernames
function count_username($username)
{
  global $conn;
  $sql = 'SELECT * FROM users WHERE username = :username';
  $statement = $conn->prepare($sql);
  $statement->bindValue(':username', $username);
  $statement->execute();
  $result = $statement->fetchAll();
  $statement->closeCursor();
  $count = $statement->rowCount();
  return $count;
}

function count_email($email)
{
  global $conn;
  $sql = 'SELECT * FROM users WHERE email = :email';
  $statement = $conn->prepare($sql);
  $statement->bindValue(':email', $email);
  $statement->execute();
  $result = $statement->fetchAll();
  $statement->closeCursor();
  $count = $statement->rowCount();
  return $count;
}

function add_user($username, $email, $password, $salt)
{
 global $conn;
 $sql = "INSERT INTO users (username, email, password, salt) VALUES (:username, :email, :password, :salt)";
 $statement = $conn->prepare($sql);
 $statement->bindValue(':username', $username);
 $statement->bindValue(':email', $email);
 $statement->bindValue(':password', $password);
 $statement->bindValue(':salt', $salt);
 $result = $statement->execute();
 $statement->closeCursor();
 return $result;
}

function get_username_by_user_id($user_id)
{
  global $conn;
  $sql = "SELECT username FROM users WHERE user_id = :user_id";
  $statement = $conn->prepare($sql);
  $statement->bindValue(':user_id', $user_id);
  $statement->execute();
  //use the fetch() method to retrieve a single row
  $username = $statement->fetch();
  $statement->closeCursor();
  return $username;
}

//create a function to retrieve salt
function retrieve_salt($username)
{
  global $conn;
  $sql = 'SELECT * FROM users WHERE username = :username';
  $statement = $conn->prepare($sql);
  $statement->bindValue(':username', $username);
  $statement->execute();
  $result = $statement->fetch();
  $statement->closeCursor();
  return $result;
}

//create a function to login
function login($username, $password)
{
  global $conn;
  $sql = 'SELECT * FROM users WHERE username = :username AND password = :password';
  $statement = $conn->prepare($sql);
  $statement->bindValue(':username', $username);
  $statement->bindValue(':password', $password);
  $statement->execute();
  $result = $statement->fetchAll();
  $statement->closeCursor();
  $count = $statement->rowCount();
  return $count;
}

function user_permissions($username)
{
  global $conn;
  $sql = 'SELECT * FROM users WHERE username = :username';
  $statement = $conn->prepare($sql);
  $statement->bindValue(':username', $username);
  $statement->execute();
  $result = $statement->fetch();
  $statement->closeCursor();
  return $result;
}
 function get_user_information(){
   $user_id = $_SESSION['user_id'];
   global $conn;
   $sql = 'SELECT * FROM users WHERE user_id = :user_id';
   $statement = $conn->prepare($sql);
   $statement->bindValue(':user_id', $user_id);
   $statement->execute();
   $result = $statement->fetch();
   $statement->closeCursor();
   return $result;
 }

 function save_riot_id($riotid, $user_id){
   global $conn;
   $sql = "UPDATE users SET riotid = :riotid WHERE user_id = :user_id";
   $statement = $conn->prepare($sql);
   $statement->bindValue(':riotid', $riotid);
   $statement->bindValue(':user_id', $user_id);
   $result = $statement->execute();
   $statement->closeCursor();
   return $result;
 }

 function save_stats($rank, $user_id, $lolusername, $region){
   global $conn;
   $sql = "INSERT INTO userstats (rank, user_id, lolusername, region) VALUES (:rank, :user_id, :lolusername, :region)";
   $statement = $conn->prepare($sql);
   $statement->bindValue(':rank', $rank);
   $statement->bindValue(':user_id', $user_id);
   $statement->bindValue(':lolusername', $lolusername);
   $statement->bindValue(':region', $region);
   $result = $statement->execute();
   $statement->closeCursor();
   return $result;
 }

 function get_league_stats(){
   $user_id = $_SESSION['user_id'];
   global $conn;
   $sql = "SELECT * FROM userstats WHERE user_id = :user_id";
   $statement = $conn->prepare($sql);
   $statement->bindValue(':user_id', $user_id);
   $statement->execute();
   $result = $statement->fetch();
   $statement->closeCursor();
   return $result;
 }

 function saveimagepath($imagename, $user_id){
   global $conn;
   $sql = "UPDATE users SET avatar = :avatar WHERE user_id = :user_id";
   $statement = $conn->prepare($sql);
   $statement->bindValue(':avatar', $imagename);
   $statement->bindValue(':user_id', $user_id);
   $result = $statement->execute();
   $statement->closeCursor();
   return $result;
 }
?>
