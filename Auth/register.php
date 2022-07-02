<?php
include "../Front/header.php";
include "../Front/navigationbar.php";



$servername = "localhost";
$username = "root";
$password = "";
$dbName = "telephonelist";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['fullname']) && isset($_POST['email'])  && isset($_POST['password'])) {
        if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $userPassword = md5($_POST['password']);

            $checkerQuery = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$_POST['email']}'");
            if (!mysqli_num_rows($checkerQuery) > 0) {

                $sql = "INSERT INTO users (fullname, email, password) VALUES ('{$fullname}', '{$email}', '{$userPassword}')";

                if (!mysqli_query($conn, $sql)) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                } else {
                    $_SESSION["fullname"] = $fullname;
                    $_SESSION["email"] = $email;
                    header("Location: ../dashbord.php");
                }
            } else {
                die("<div class=\"alert alert-danger\" role=\"alert\">
                    This user alredy exists! <a href=\"./register.php\">Register</a>
                </div>");
            }
        }
    }
}
?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form action="" method="POST" class="mx-1 mx-md-4">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">fullname</label>
                                            <input type="text" id="form3Example1c" class="form-control" name="fullname" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                            <input type="email" id="form3Example3c" class="form-control" name="email" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4c">Password</label>
                                            <input type="password" id="form3Example4c" class="form-control" name="password" />
                                        </div>
                                    </div>


                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href="#!">Terms of service</a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://picsum.photos/seed/picsum/800/700" class="img-fluid rounded" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

include "../Front/footer.php";
?>