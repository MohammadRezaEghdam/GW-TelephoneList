<?php
include "./Front/header.php";
include "./Front/navigationbar.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['name']) && isset($_POST['phone'])) {
        if (!empty($_POST['name'] && !empty($_POST['phone']))) {
             $userName = $_POST['name'];
             $phone = $_POST['phone'];
             $userId = $_SESSION['userId'];


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

            $sql = "INSERT INTO contacts (user_id, contact_name, contact_phone) VALUES ('{$userId}', '{$userName}', '{$phone}')";

            if (!mysqli_query($conn, $sql)) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            header("Location: ./myContacts.php");
        }
    }
}
?>
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="addTelephone.html">Add Telephone</a></li>
        </ol>
    </nav>
    <hr class="mt-4">
</div>

<div class="container mt-4">
    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label  for="exampleInputPassword1">Password</label>
            <input name="phone" type="number" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- <script>
    $(document).ready(function() {

        $("#submitUser").click(function() {
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var phoneNumber = $("#phoneNumber").val();
            var gerend = $("#gerend").val();
            var email = $("#userEmail").val();
            console.log(firstName + lastName + phoneNumber + gerend + email);
            $.ajax({
                url: 'http://webhook.site/5a540f85-49b5-4aa9-8ec8-811b85601c0f?id=10',
                method: 'post',
                data: {
                    "name": {
                        "first": firstName,
                        "last": lastName
                    },
                    "phone": phoneNumber,
                    "email": email,
                    "gerend": gerend,
                },
                success: function(response) {
                    console.log("success");
                }
            })
        });
    });
</script> -->
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.js"></script>
</body>

</html>