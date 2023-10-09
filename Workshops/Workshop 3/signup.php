<?php
include('utils/functions.php');
$provinces = getProvinces();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container my-1">
        <div class="row">
            <div class="col-12 col-sm8 col-md-6 m-auto">
                <div class="card border-2 shadow">
                    <div class="card-body text-center bg-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                        </svg>
                        <h1>Sign Up</h1>
                        <p class="lead">This is the signup process</p>
                        <hr class="my-2">
                        <form method="post" action="registerUser.php" class="form-inline" role="form">
                            <div class="form-group ">
                                <label for="first-name">First Name (Username)</label>
                                <input id="first-name" class="form-control my-3 py-2" type="text" name="firstName">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input id="last-name" class="form-control my-3 py-2" type="text" name="lastName">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input id="email" class="form-control my-3 py-2" type="text" name="email">
                            </div>
                            <div class="form-group">
                                <label for="province">Province</label>
                                <select id="province" class="form-control my-3 py-2" name="province">
                                    <?php
                                    foreach ($provinces as $province) {
                                        $id = $province['id'];
                                        $nameProvince = $province['name'];
                                        echo "<option value=\"$id\">$nameProvince</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" class="form-control my-2 py-2" type="password" name="password">
                            </div>
                            <input type="hidden" name="role" value="user">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"> Sign up </button>
                            </div>
                            <div class="text-center my-1">
                                <a href="/Workshop%203/index.php" class="link-primary">Already have an account?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>