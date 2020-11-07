<?php
include("includes/header.php");
?>
<?php
session_start();
if (isset($_SESSION['user_role'])) {
  if ($_SESSION['user_role'] != "admin") {
    header('Location: ../index.php');
  }
} else {
  header('Location: ../index.php');
}

?>

<?php
include("includes/navigation.php");
?>

<?php
if (isset($_POST['submit'])) {
  $id = $_GET['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone_no = $_POST['phone_no'];
  $status = $_POST['status'];
  $user_type = $_POST['user_type'];
  $dob = $_POST['dob'];

  $sql = " UPDATE `logina` SET `name`='$name',`email`='$email',`phone`='$phone_no',`password`='$password',`usertype`='$user_type',`status`='$status',`dob`='$dob' WHERE `id` = '$id' ";

  mysqli_query($con, $sql);

  header('Location: users.php');
}


?>

<div class="container-fluid">
  <div class="row">
    <?php include("includes/sidebar.php"); ?>






    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>

      </div>

      <div id="admin-index-form">



        <form method="post" enctype="multipart/form-data">
          <div class="col-md-10 mx-5">


            <?php
            global $con;
            $id = $_GET['id'];
            $sql = " SELECT * FROM logina WHERE id = '$id' ";
            $resul = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($resul)) {

            ?>
              <label for="first_name_id">Name : </label>

              <input type="text" id="first_name_id" name="name" class="form-control" value="<?php echo $row['name']; ?>"><br>

              <label for="email_id">Email : </label>

              <input type="text" id="email_id" name="email" class="form-control" value="<?php echo $row['email']; ?>"><br>

              <label for="password_id">Password : </label>

              <input type="password" id="password_id" name="password" class="form-control" value="<?php echo $row['password']; ?>"><br>

              <label for="phone_no_id">Phone Number : </label>

              <input type="text" id="phone_no_id" name="phone_no" class="form-control" value="<?php echo $row['phone']; ?>"><br>

              <label for="user_type_id">Status: </label>
              <select name="status" class="form-control" id="user_type_id">
                <option value="Approved">Approved</option>
                <option value="notApproved" select>notApproved</option>

              </select><br>





              <label for="user_type_id">Usertype: </label>
              <select name="user_type" class="form-control" id="user_type_id">
            <option value="wholesaler" <?php if($row['usertype']=='wholesaler'):?> selected='selected'<?php endif;?> >Wholesaler</option>
                <option value="retailer" <?php if($row['usertype']=='retailer'):?> selected='selected'<?php endif;?> >Retailer</option>
                <option value="admin"<?php if($row['usertype']=='admin'):?> selected='selected'<?php endif;?> >Admin</option>

              </select><br>

              <label for="dob_id">DOB : </label>

              <input type="date" id="dob_id" name="dob" class="form-control" value="<?php echo $row['dob']; ?>"><br>






              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      <?php } ?>


      </div>

  </div>
  </main>
</div>
</div>


<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ey5ln3e6qq2sq6u5ka28g3yxtbiyj11zs8l6qyfegao3c0su"></script>

<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
<?php
include("includes/footer.php");
?>