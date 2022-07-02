<?php
include "./Front/header.php";
include "./Front/navigationbar.php";
// * sql connection here
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





if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['name']) && isset($_POST['phone'])) {
        if (!empty($_POST['name'] && !empty($_POST['phone']))) {
            $userName = $_POST['name'];
            $phone = $_POST['phone'];
            $userId = $_SESSION['userId'];

            $filename = $_FILES["imageFile"]["name"] ;
            
            $tempname = $_FILES["imageFile"]["tmp_name"];
            $target_dir =  __DIR__  . "/images/" . $filename;
            if (move_uploaded_file($tempname, $target_dir)) {

                $sql = "INSERT INTO contacts (user_id, contact_name, contact_phone, avatar) VALUES ('{$userId}', '{$userName}', '{$phone}', '{$filename}')";

                if (!mysqli_query($conn, $sql)) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                // header("Location: ./myContacts.php");
            }
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
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Contact Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Contact Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">thelephone Number</label>
            <input name="phone" type="number" class="form-control" id="exampleInputPassword1" placeholder="Telephone number">
        </div>
        <label for="inputGroupFileAddon01"> Choose file for upload:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input name="imageFile" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
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