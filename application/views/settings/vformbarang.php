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
    <?php echo form_open_multipart('settings/form/'.$aksi.''); ?>
         <table class="table table-striped">

           <tr>
            <td>Email</td>
            <td>
              <div class="col-sm-6">
                  <input type="text" name="email" class="form-control" placeholder="Masukan email ...">
              </div>
              </td>
           </tr>
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
                  <input type="file" name="avatar" accept="image/*" class="form-control">
              </div>
              </td>
           </tr>
           <tr>
            <td>Role</td>
            <td>
            <div class="col-sm-6">
              <select name="role" class="form-control">
                <<option selected>-- Select Role --</option>
                <option value="1">Admin</option>
                <option value="0">Member</option>
              </select>
            </div>
            </td>
           </tr>
           <tr>
            <td>Status</td>
            <td>
            <div class="col-sm-6">
              <select name="status" class="form-control">
                <<option selected>-- Select Status --</option>
                <option value="0">Active</option>
                <option value="1">InActive</option>
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
    $email = $rowdata->email;
    $username = $rowdata->username;
    $avatar = $rowdata->avatar;
    $role = $rowdata->is_admin;
    $status = $rowdata->is_deleted;
  } ?>
  <h1 class="header">User Management</h1>
  <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
    <div class="panel-heading"><b><?=$titles?></b></div>
    <div class="panel-body">
    <?=$this->session->flashdata('pesan')?>
    <?php echo form_open_multipart('settings/form/'.$aksi.''); ?>
         <table class="table table-striped">

           <tr>
            <td>Email</td>
            <td>
              <div class="col-sm-6">
                  <input type="text" name="email" class="form-control" value="<?=$email?>">
              </div>
              </td>
           </tr>
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
                  <input type="password" name="password" class="form-control" placeholder="Masukan password anda ...">
              </div>
              </td>
           </tr>
           <tr>
            <td>Photo</td>
            <td>
              <div class="col-sm-6">
                  <img class="img-responsive img-rounded" src="<?php echo base_url().'assets/images/user/'.$avatar.''; ?>" alt="<?=$username?>" title="<?=$username?>" width="200" height="200">
                  <input type="file" name="avatar" accept="image/*" class="form-control">
              </div>
              </td>
           </tr>
           <tr>
            <td>Role</td>
            <td>
            <div class="col-sm-6">
              <select name="role" class="form-control">
                <<option>-- Select Role --</option>
                <option value="1" <?php if ($role === '1') { echo 'selected'; } ?>>Admin</option>
                <option value="0" <?php if ($role === '0') { echo 'selected'; } ?>>Member</option>
              </select>
            </div>
            </td>
           </tr>
           <tr>
            <td>Status</td>
            <td>
            <div class="col-sm-6">
              <select name="status" class="form-control">
                <<option>-- Select Status --</option>
                <option value="0" <?php if ($status === '0') { echo 'selected'; } ?>>Active</option>
                <option value="1" <?php if ($status === '1') { echo 'selected'; } ?>>InActive</option>
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
