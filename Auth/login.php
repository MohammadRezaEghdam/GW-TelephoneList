<?php
include "../Front/header.php";
include "../Front/navigationbar.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['fullname']) && isset($_POST['password'])) {
        if (!empty($_POST['fullname']) && !empty('password')) {

            $fullname = $_POST['fullname'];
            $userPassword = $_POST['password'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "telephonelist";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT fullname, password FROM users";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['fullname'] == $fullname && $row['password'] == $userPassword) {
                        $_SESSION['fullname'] = $fullname;
                        header("Location: ../dashbord.php");
                    }
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
        }
    }
}
?>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">
                            <form action="" method="POST">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" id="typeEmailX" class="form-control form-control-lg" name="fullname" />
                                    <label class="form-label" for="typeEmailX">fullname</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </form>

                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                        </div>

                        <div>
                            <p class="mb-0">Don't have an account? <a href="./register.php" class="text-white-50 fw-bold">Sign Up</a>
                            </p>
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