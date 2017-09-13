<!-- Section JoorxCMS -->
<h1 class="header">news</h1>
<?php
  foreach($qbarang as $rowdata){
    $id = $rowdata->id;
    $username = $rowdata->username;
    $photo = $rowdata->photo;
    $password = $rowdata->password;
    $role = $rowdata->role;
  }
?>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b><?=$titles?></b></div>
  <div class="panel-body">

     <p> <a href="<?=base_url()?>user" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a>
     </p>

       <table class="table table-striped">
         <tr>
          <td>Username</td>
          <td><?=$username?></td>
         </tr>
         <tr>
          <td>Photo</td>
          <td><img class="img-responsive img-rounded" src="<?php echo base_url().'assets/images/user/'.$photo.''; ?>" alt="<?=$username?>" title="<?=$username?>" width="200" height="200"></td>
          </tr>
         <tr>
          <td>Role</td>
          <td><?=$role?></td>
          </tr>

       </table>
        </div>
    </div>
    </div>
<!-- Section JoorxCMS -->
