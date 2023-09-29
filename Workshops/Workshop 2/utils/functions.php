<?php

function getConnection() {
  $connection = mysqli_connect('localhost', 'root', '', 'php_web');
  return $connection;
}

/**
 *  Gets the provinces from the database
 */
function getProvinces() {
  $conn = getConnection();
  $sql = "SELECT * FROM `provinces`;";

  $result = mysqli_query($conn, $sql);
  $provinces = $result->fetch_all(MYSQLI_ASSOC);
  
  return $provinces;
}

/**
 *  Get the specific name of the province from the database
 */
function getProvince($id) {
  $conn = getConnection();
  $sql = "SELECT name FROM `provinces` WHERE id = $id;";

  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();
  $provinceName = $row['name'];

  return $provinceName;
}

/**
 *  Gets the users from the database
 */
function getUsers() {
  $conn = getConnection();
  $sql = "SELECT * FROM `users`;";

  $result = mysqli_query($conn, $sql);
  $users = $result->fetch_all(MYSQLI_ASSOC);
  
  return $users;
}

/**
 * Saves an specific user into the database
 */
function saveUser($user){

  $firstName = $user['firstName'];
  $lastName = $user['lastName'];
  $email = $user['email'];
  $province = $user['province_id'];
  $password = $user['password'];

  $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `province_id`, `password`) VALUES
    ('$firstName', '$lastName', '$email', '$province', '$password')";
  $conn = getConnection();
  mysqli_query($conn, $sql);
  return true;
}