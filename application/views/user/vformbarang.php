<?php
if($aksi=='aksi_add'){
  $id = "";
  $username = "";
  $password = "";
  $photo = "";
  $role = ""; ?>
  <h1 class="header">User Management</h1>
  <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
    <div class="panel-heading"><b><?=$titles?></b></div>
    <div class="panel-body">
    <?=$this->session->flashdata('pesan')?>
    <?php echo form_open_multipart('user/form/'.$aksi.''); ?>
         <table class="table table-striped">

           <tr>
            <td>Username</td>
            <td>
              <div class="col-sm-6">
                  <input type="text" name="username" class="form-control" placeholder="Masukan username ...">
              </div>
              </td>
           </tr>
           <tr>
            <td>Password</td>
            <td>
              <div class="col-sm-6">
                  <input type="password" name="password" class="form-control" placeholder="Masukan password ...">
              </div>
              </td>
           </tr>
           <tr>
            <td>Photo</td>
            <td>
              <div class="col-sm-6">
                  <input type="file" name="photo" accept="image/*" class="form-control">
              </div>
              </td>
           </tr>
           <tr>
            <td>Role</td>
            <td>
            <div class="col-sm-6">
              <select name="role" class="form-control">
                <<option selected>-- Select Role --</option>
                <option value="admin">Admin</option>
                <option value="member">Member</option>
              </select>
            </div>
            </td>
           </tr>
           <tr>
            <td colspan="2">
              <input type="submit" class="btn btn-success" value="Simpan">
              <button type="reset" class="btn btn-default">Batal</button>
            </td>
           </tr>
         </table>
       <?php echo form_close(); ?>
          </div>
      </div>
      </div>
<?php } else { ?>
  <?php foreach($qdata as $rowdata){
    $id = $rowdata->id;
    $username = $rowdata->username;
    $photo = $rowdata->photo;
    $password = $rowdata->password;
    $role = $rowdata->role;
  } ?>
  <h1 class="header">User Management</h1>
  <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
    <div class="panel-heading"><b><?=$titles?></b></div>
    <div class="panel-body">
    <?=$this->session->flashdata('pesan')?>
    <?php echo form_open_multipart('user/form/'.$aksi.''); ?>
         <table class="table table-striped">

           <tr>
            <td>Username</td>
            <td>
              <div class="col-sm-6">
                  <input type="hidden" name="id" class="form-control" value="<?=$id?>">
                  <input type="text" name="username" class="form-control" value="<?=$username?>">
              </div>
              </td>
           </tr>
           <tr>
            <td>Password</td>
            <td>
              <div class="col-sm-6">
                  <input type="password" name="password" class="form-control" value="<?=$password?>">
              </div>
              </td>
           </tr>
           <tr>
            <td>Photo</td>
            <td>
              <div class="col-sm-6">
                  <img class="img-responsive img-rounded" src="<?php echo base_url().'assets/images/user/'.$photo.''; ?>" alt="<?=$username?>" title="<?=$username?>" width="200" height="200">
                  <input type="file" name="photo" accept="image/*" class="form-control">
              </div>
              </td>
           </tr>
           <tr>
            <td>Role</td>
            <td>
            <div class="col-sm-6">
              <select name="role" class="form-control">
                <<option>-- Select Role --</option>
                <option value="admin" <?php if ($role == 'admin') { echo 'selected'; } ?>>Admin</option>
                <option value="member" <?php if ($role == 'member') { echo 'selected'; } ?>>Member</option>
              </select>
            </div>
            </td>
           </tr>
           <tr>
            <td colspan="2">
              <input type="submit" class="btn btn-success" value="Simpan">
              <button type="reset" class="btn btn-default">Batal</button>
            </td>
           </tr>
         </table>
       <?php echo form_close(); ?>
          </div>
      </div>
      </div>
<?php } ?>
