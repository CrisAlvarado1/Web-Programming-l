<?php
    include("utils/functions.php");
    $users = getUsers();    // Get the users of the query
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <h1 class="h1">Registered Users</h1>
        <br>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Province</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <th scope="row"> <?php echo "".$user['id']; ?> </th>
                        <td> <?php echo "".$user['firstname']; ?> </td>
                        <td> <?php echo "".$user['lastname']; ?> </td>
                        <td> <?php echo "".$user['email']; ?> </td>
                        <td> <?php echo "".getProvince($user['province_id']); ?> </td>
                        <td> <?php echo "".$user['password']; ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </div>
    <div class="container">
        <a class="btn btn-primary" href="index.php" role="button">Return to main page</a>
    </div>
</body>
</html>