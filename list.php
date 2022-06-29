<?php
include "./Front/header.php";
include "./Front/navigationbar.php";
?>

<!-- ! breadcrumb -->
<div class="container-fluid">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item"><a href="list.html">list</a></li>
    </ol>
  </nav>
</div>
<!-- ! buttons -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6"><a href="index.html" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <a href="addTelephone.html" class="btn btn-success ml-3" id="addTelephone">Add Telephone <i class="fa fa-plus" aria-hidden="true"></i></a>
      <a href="#" class="btn btn-info" id="printTable">Print Contacts <i class="fa fa-print" aria-hidden="true"></i></a>
    </div>
  </div>
</div>
<!-- !fromgroup -->
<div class="container-fluid">
  <div class="row">

    <div class="col-md-2 mt-4">
      <ul class="list-group">
        <li class="list-group-item active">Content group <i class="fa fa-user" aria-hidden="true"></i></li>
        <li class="list-group-item"><a href="Contents/PublicContentGroup.html">Public group</a></li>
        <li class="list-group-item"><a href="Contents/PrivateContentGroup.html">Private group</a></li>
        <li class="list-group-item"><a href="Contents/Family.html">Family</a></li>
        <li class="list-group-item"><a href="Contents/etc.html">etc</a></li>
      </ul>
    </div>
    <div class="col-md-10">

      <table class="table mt-4 text-center table-striped">
        <thead class="table-primary bg-primary">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Gender</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Profile Avatar</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody id="list">

        </tbody>
      </table>
      <!-- ! pagination  -->
      <div class="text-center">
        <nav aria-label="...">
          <ul class="pagination pagination-sm">
            <li class="page-item">
              <p class="page-link" href="" id="firstPage">1</p>
            </li>
            <li class="page-item">
              <p class="page-link" href="" id="secondPage">2</p>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <!-- ! btns here -->
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-3 block">
      </div>
      <div class="col-md-3">
        <button id="deleteUserBtn" class="btn btn-danger">delete <i class="fas fa-edit" onclick="deleteUser()"></i></button>
      </div>
    </div>
  </div>
  <!-- ! Module Here -->
  <!-- <div class="modal fade" id="DeleteModule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Contact</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure about deleting this contact?!!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>
    </div> -->
</div>
<?php
include "./Front/scripts.php";
include "./Front/footer.php";
?>