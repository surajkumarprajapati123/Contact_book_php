<?php 
include_once "./common/header.php";
include_once "./includes/db.php";
include_once "./includes/config.php";

$userId = (!empty($_SESSION['user']) && !empty($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : 0;


if(!empty($_SESSION['success']))
{
 ?>
  <div class="alert alert-success mt-3 text-center">
    <?php echo $_SESSION['success'] ?>
  </div>
 <?php 
  unset($_SESSION['success']);
  }
    ?>

<!-- //get users contacts -->
<?php 
 if(!empty($userId)){
  $currentPage = !empty($_GET['page']) ? $_GET['page'] : 1;
  $limit = 5 ;
  $offset = ($currentPage - 1) * $limit;
  $conactSql = "SELECT * FROM `contacts2` WHERE `owner_id` = $userId ORDER BY first_name ASC LIMIT {$offset}, {$limit} ";
  $conn = db_conn();
  $contactResult = mysqli_query($conn,$conactSql);
  $constactsNumRows = mysqli_num_rows($contactResult);
  // for count
  $countSql = "SELECT id FROM `contacts2` WHERE `owner_id`= $userId";
    $countResult = mysqli_query($conn, $countSql);
    
  $contactRow = mysqli_num_rows($countResult);
   if($constactsNumRows > 0){
 
?>
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
          <?php 
          while($row = mysqli_fetch_assoc($contactResult))
          {
           $urlImage = !empty($row['photo']) ? SITEURL . "uploads/photo/" . $row['photo'] :"";
           ?>
      <tr>
      <td class="align-middle"><img src= "<?php echo $urlImage ?>" class="img-thumbnail img-list" /></td>
      <td class="align-middle"><?php echo $row['first_name']." ".$row['last_name'] ?></td>
      <td class="align-middle">
      <a href="<?php echo SITEURL . "views.php?id=". $row['id']; ?>" class="btn btn-success">View</a>
      <a href="<?php echo SITEURL . "addcontact.php?id=" . $row['id']; ?>" class="btn btn-primary">Edit</a>
      <a href="<?php echo SITEURL . "delete.php?id=" . $row['id']; ?>" class="btn btn-danger" onclick="return confirm(`Are you sure want to delete this contact?`)">Delete</a>
      </td>
    </tr>  
<?php 
} ?>

</tbody>
</table>
      <?php
        getpagination($contactRow, $currentPage);
        ?>         
  <?php 
  }
}
   ?>

<style>
   body { background-image: url("<?php echo SITEURL . "public/images/contacts2.jpg"; ?>");
    background-repeat: no-repeat; background-size:cover;
    }
</style>
<?php 

include_once "./common/fotter.php";
 ?>