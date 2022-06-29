<?php
include "./Front/header.php";
include "./Front/navigationbar.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "telephonelist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id']) and !empty($_GET['id'])) {
    $contactId = $_GET['id'];



    $sql = "SELECT * FROM contacts WHERE id = {$contactId}";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $contactName = $row['contact_name'];
            $contactPhone = $row['contact_phone'];
        }
    }
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['name']) and $_POST['phone']) {
        if (!empty($_POST['name']) and !empty($_POST['phone'])) {

            $newContactName = $_POST['name'];
            $newContacPhone = $_POST['phone'];
            $sql = "UPDATE contacts SET contact_name ='{$newContactName}',contact_phone ='{$newContacPhone}' WHERE id={$_GET['id']}";

            if (!$conn->query($sql) === TRUE) {
                echo "Error updating record: " . $conn->error;
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
            <li class="breadcrumb-item"><a href="list.html">List</a></li>
            <li class="breadcrumb-item"><a href="edit.html">Edit Content</a></li>
        </ol>
    </nav>
    <hr class="mt-4">
</div>

<div class="container mt-4">

    <form action="" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Contact Name</label>
            <input name="name" value="<?= $contactName ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone Number</label>
            <input name="phone" value="<?= $contactPhone ?>" type="number" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Update Contact</button>
    </form>

</div>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.js"></script>
</body>

</html>