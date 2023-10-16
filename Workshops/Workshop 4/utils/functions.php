<?php

/**
 *  Establishes a database connection and returns the connection
 */
function getConnection()
{
  $connection = mysqli_connect('localhost', 'root', '', 'php_web');
  return $connection;
}

/**
 *  Retrieves all the provinces from the database
 */
function getProvinces()
{
  $conn = getConnection();
  $sql = "SELECT * FROM `provinces`;";

  $result = mysqli_query($conn, $sql);
  $provinces = $result->fetch_all(MYSQLI_ASSOC);
  $conn->close();

  return $provinces;
}

/**
 *  Retrieves the specific province from the database
 */
function getProvince($id)
{
  $conn = getConnection();
  $sql = "SELECT * FROM `provinces` WHERE id = $id;";

  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();
  $provinceName = $row['name'];
  $conn->close();

  return $provinceName;
}

/**
 *  Retrieves all user records from the database.
 * 
 *  @return array An array of associative arrays, each representing a user's information
 */
function getUsers()
{
  $conn = getConnection();
  $sql = "SELECT * FROM `users`;";

  $result = mysqli_query($conn, $sql);
  $users = $result->fetch_all(MYSQLI_ASSOC);
  $conn->close();

  return $users;
}

/**
 * Saves a specific user's information into the database.
 * 
 * @param $user An associative array containing user information to be saved.
 */
function saveUser($user)
{
  // Extract values from the $user array and construct the SQL query
  $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `province_id`, `password`, `role`, `status`) 
  VALUES ('{$user['firstName']}', '{$user['lastName']}', '{$user['email']}', '{$user['province_id']}', 
    '{$user['password']}', '{$user['role']}', 'active');";

  $conn = getConnection();
  mysqli_query($conn, $sql);
  $conn->close();

  return true;
}

/**
 * Delete a specific user from the database by their ID.
 * 
 * @param $idUseris the unique identifier of the user to be deleted.
 */
function deleteUser($idUser)
{
  $sql = "DELETE FROM `users` WHERE id = " . $idUser . ";";
  $conn = getConnection();
  mysqli_query($conn, $sql);
  $conn->close();
  
  return true;
}

/**
 * Retrieve a specific user's information from the database by their ID.
 *
 * @param $idUser is the unique identifier of the user.
 */
function getUser($idUser)
{
  $sql = "SELECT * FROM `users` WHERE id = " . $idUser . ";";
  $conn = getConnection();

  $result = mysqli_query($conn, $sql);
  $user = $result->fetch_all(MYSQLI_ASSOC);
  $conn->close();

  return ($user) ? $user[0] : null;
}

/**
 * Update user information in the database.
 * 
 * @param array $user is an associative array containing user information.
 */
function updateUser($user)
{
  // Extract values from the $user array and construct the SQL query
  $sql = "UPDATE `users` SET `firstname` = '{$user['firstName']}', `lastname` = '{$user['lastName']}',
  `email` = '{$user['email']}', `province_id` = {$user['province_id']}, `password` = '{$user['password']}',
  `role` = '{$user['role']}' WHERE id = {$user['id']};";

  $conn = getConnection();
  mysqli_query($conn, $sql);
  $conn->close();

  return true;
}

/**
 * Authenticates a user by first name (Username), password and if the account is active.
 */
function authenticate($firstName, $password)
{
  $conn = getConnection();
  $sql = "SELECT * FROM users WHERE `firstname` = '$firstName' AND `password` = '$password' AND `status` = 'active'";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $results = $result->fetch_array();
  $conn->close();

  return $results;
}

/*
* Set the datetime in the database when the user access
*
* @param $idUser is the unique identifier of the user.
*/
function setLoginDateTime($idUser) {
  date_default_timezone_set('America/Mexico_City');
  $dateTime = (new DateTime())->format('Y-m-d H:i:s');

  $sql = "UPDATE `users` SET `last_login_datetime` = '$dateTime' 
  WHERE id = $idUser;";
  $conn = getConnection();
  mysqli_query($conn, $sql);
  $conn->close();

  return true;
}