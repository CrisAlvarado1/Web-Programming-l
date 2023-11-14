<?php

class databaseManager
{
    private $connection;
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';
    private const DB_NAME = 'php_web';

    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    /**
     *  Establishes a database connection and returns the connection
     */
    private function getConnection()
    {
        return mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
    }

    /**
     *  Retrieves all user records from the database.
     * 
     *  @return array An array of associative arrays, each representing a user's information
     */
    public function getUsers()
    {
        $sql = "SELECT * FROM `users`;";

        $result = mysqli_query($this->connection, $sql);
        $users = $result->fetch_all(MYSQLI_ASSOC);

        return $users;
    }


    /**
     * Saves a specific user's information into the database.
     * 
     * @param $user An associative array containing user information to be saved.
     */
    public function saveUser($user)
    {
        // Extract values from the $user array and construct the SQL query
        $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `province_id`, `password`, `role`, `status`, `url_image`) 
            VALUES ('{$user['firstName']}', '{$user['lastName']}', '{$user['email']}', '{$user['province_id']}', 
            '{$user['password']}', '{$user['role']}', 'active', '{$user['urlImage']}');";

        mysqli_query($this->connection, $sql);

        return true;
    }

    /**
     * Delete a specific user from the database by their ID.
     * 
     * @param $idUseris the unique identifier of the user to be deleted.
     */
    public function deleteUser($id)
    {
        $sql = "DELETE FROM `users` WHERE id = " . $id . ";";
        mysqli_query($this->connection, $sql);

        return true;
    }

    /**
     * Update user information in the database.
     * 
     * @param array $user is an associative array containing user information.
     */
    public function updateUser($user)
    {
        // Extract values from the $user array and construct the SQL query
        $sql = "UPDATE `users` SET `firstname` = '{$user['firstName']}', `lastname` = '{$user['lastName']}',
            `email` = '{$user['email']}', `province_id` = {$user['province_id']}, `password` = '{$user['password']}',
            `role` = '{$user['role']}' WHERE id = {$user['id']};";

        mysqli_query($this->connection, $sql);

        return true;
    }

    /**
     * Authenticates a user by first name (Username), password and if the account is active.
     */
    function authenticate($firstName, $password)
    {
        $sql = "SELECT * FROM users WHERE `firstname` = '$firstName' AND `password` = '$password' AND `status` = 'active'";
        $result = $this->connection->query($sql);

        if ($this->connection->connect_errno) {
            return false;
        }
        $results = $result->fetch_array();

        return $results;
    }

    /**
     * Set the datetime in the database when the user access
     *
     * @param $idUser is the unique identifier of the user.
     */
    function setLoginDateTime($idUser)
    {
        date_default_timezone_set('America/Mexico_City');
        $dateTime = (new DateTime())->format('Y-m-d H:i:s');

        $sql = "UPDATE `users` SET `last_login_datetime` = '$dateTime' 
            WHERE id = $idUser;";
        mysqli_query($this->connection, $sql);

        return true;
    }

    /**
     * Close the connection of the database
     */
    public function closeConnection()
    {
        mysqli_close($this->connection);
    }

    /**
     * Retrieve the image URL associated with a specific user.
     *
     * @param int $userId The unique identification of the user in the database.
     *
     * @return string|null The image URL if it exists, or null if no image URL is found.
     */
    public function getUserPathImage($userId)
    {
        $sql = "SELECT url_image FROM `users` WHERE id = '{$userId}';";
        $result = $this->connection->query($sql);

        if ($this->connection->connect_errno) {
            return false;
        }

        $row = $result->fetch_row();

        return $row ? $row[0] : null;
    }

    /**
     *  Retrieves all the provinces from the database
     */
    function getProvinces()
    {
        $sql = "SELECT * FROM `provinces`;";
        $result = mysqli_query($this->connection, $sql);
        $provinces = $result->fetch_all(MYSQLI_ASSOC);

        return $provinces;
    }

    /**
     *  Retrieves the specific province name from the database
     */
    function getProvince($id)
    {
        $sql = "SELECT * FROM `provinces` WHERE id = $id;";
        $result = mysqli_query($this->connection, $sql);
        $row = $result->fetch_assoc();
        $provinceName = $row['name'];

        return $provinceName;
    }

    /**
     * Retrieve a specific user's information from the database by their ID.
     *
     * @param $idUser is the unique identifier of the user.
     */
    function getUser($idUser)
    {
        $sql = "SELECT * FROM `users` WHERE id = " . $idUser . ";";
        $result = mysqli_query($this->connection, $sql);
        $user = $result->fetch_all(MYSQLI_ASSOC);

        return ($user) ? $user[0] : null;
    }
}
