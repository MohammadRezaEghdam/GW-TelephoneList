<?php
include "./Front/header.php";
include "./Front/navigationbar.php";
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
 // ! delete method here 
if (isset($_GET['method']) == "delete") {

    $contactId = $_GET['id'];
    $sql = "DELETE FROM contacts WHERE id=$contactId";

if (!$conn->query($sql) === TRUE) {
    echo "Error deleting record: " . $conn->error;
}
header("Location: ./myContacts.php");
}
?>


<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="list.html">list</a></li>
        </ol>
    </nav>
</div>

<!-- !fromgroup -->
<div class="container-fluid">
    <div class="row">

        <div class="col-md-3 mt-4">
            <div class="card">
                <img src="https://i.pravatar.cc/300" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">User fullname :<?= $_SESSION['fullname'] ?></h5>
                    <p class="card-text">User id :<span class="badge badge-pill badge-info"><?= $_SESSION['userId'] ?? "" ?></span></p>
                    <p class="card-text">User Email Address :<?= $_SESSION['email'] ?? "" ?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <table class="table mt-4 text-center table-striped">
                <thead class="table-primary bg-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody id="list">

                    <?php


                    $sql = "SELECT * FROM contacts WHERE user_id = {$_SESSION['userId']}";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $id = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td>
                                    <?= ++$id?>
                                </td>
                                <td>
                                    <?= $row['contact_name'] ?>
                                </td>
                                <td>
                                    <?= $row['contact_phone'] ?>
                                </td>
                                <td>
                                    <a href="./editContact.php?id=<?= $row['id'] ?>" class="btn btn-info">Edit</a>
                                    <a href="./myContacts.php?method=delete&id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php

                        }
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($conn);
                    ?>

                </tbody>
            </table>
            <!-- ! pagination  -->
            
        </div>
    </div>

    <!-- ! btns here -->

    <?php
    include "./Front/footer.php";
    ?>