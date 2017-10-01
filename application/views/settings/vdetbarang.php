<!-- Section JoorxCMS -->
<h1 class="header">news</h1>
<?php
  foreach($qbarang as $rowdata){
    $id = $rowdata->id;
    $username = $rowdata->username;
    $email = $rowdata->email;
    $avatar = $rowdata->avatar;
    $password = $rowdata->password;
    $role = $rowdata->is_admin;
    $status = $rowdata->is_deleted;
  }
?>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b><?=$titles?></b></div>
  <div class="panel-body">

     <p> <a href="<?=base_url()?>settings" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a>
     </p>

       <table class="table table-striped">
         <tr>
          <td>Email</td>
          <td><?=$email?></td>
         </tr>
         <tr>
          <td>Username</td>
          <td><?=$username?></td>
         </tr>
         <tr>
          <td>Photo</td>
          <td><img class="img-responsive img-rounded" src="<?php echo base_url().'assets/images/user/'.$avatar.''; ?>" alt="<?=$username?>" title="<?=$username?>" width="200" height="200"></td>
          </tr>
         <tr>
          <td>Role</td>
          <td><?php if($role === "1") { echo "admin"; } else { echo "member"; } ?></td>
          </tr>
         <tr>
          <td>Status</td>
          <td><?php if($status === "1") { echo "Inactive"; } else { echo "Active"; } ?></td>
          </tr>

       </table>
        </div>
    </div>
    </div>
<!-- Section JoorxCMS -->
