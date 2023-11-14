<?php
include_once("../inc/validateSession.php");
include_once("../utils/database.php");

$database = new databaseManager();
$users = $database->getUsers();;    // Get the users of the query

// Variables for the navbar:
$message = "Usuario";
$activePage = "users";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include('../inc/nav.php'); ?>
    <div class="container">
        <div class="container py-4 text-center">
            <h1 class="h1">Registered Users</h1>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Province</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <!-- Obtain basic information of the users -->
                        <td> <?php echo "" . $user['firstname']; ?> </td>
                        <td> <?php echo "" . $user['lastname']; ?> </td>
                        <td> <?php echo "" . $user['email']; ?> </td>
                        <td> <?php echo "" . $database->getProvince($user['province_id']); ?> </td>
                        <td> <?php echo "" . ucfirst($user['role']); ?> </td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <!--Link to edit or delete the user, using the user's ID -->
                                <a class="btn btn-secondary btn-sm" href="edit.php?id=<?php echo "" . $user['id']; ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo "" . $user['id']; ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php
                endforeach;
                $database->closeConnection();
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <div class="container">
        <a class="btn btn-primary" href="add.php" role="button">Add new user</a>
    </div>
    <br>
</body>

</html>