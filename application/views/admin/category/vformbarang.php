<?php
if($aksi=='aksi_add'){
  $id = "";
  $name = "";
  $tgl = "";
  $by = "";
  date_default_timezone_set("Asia/Jakarta");
  $date = date("Y-m-d"); ?>
  <h1 class="header">Category</h1>
  <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
    <div class="panel-heading"><b><?=$titles?></b></div>
    <div class="panel-body">
    <?=$this->session->flashdata('pesan')?>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('admin/formcat/'.$aksi.''); ?>
         <table class="table table-striped">

           <tr>
            <td style="width:15%;">Name</td>
            <td>
              <div class="col-sm-6">
                  <input type="text" name="category" class="form-control" placeholder="Masukan nama kategori ...">
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
    $id = $rowdata->category_id;
    $name = $rowdata->category_name;
    $tgl = $rowdata->created_tgl;
    $by = $rowdata->created_by;
  } ?>
  <h1 class="header">Category</h1>
  <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
    <div class="panel-heading"><b><?=$titles?></b></div>
    <div class="panel-body">
    <?=$this->session->flashdata('pesan')?>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('admin/formcat/'.$aksi.''); ?>
         <table class="table table-striped">

           <tr>
            <td style="width:15%;">Name</td>
            <td>
              <div class="col-sm-6">
                  <input type="hidden" name="id" class="form-control" value="<?=$id?>">
                  <input type="text" name="category" class="form-control" value="<?=$name?>">
              </div>
              </td>
           </tr>
           <tr>
            <td>Created on</td>
            <td>
              <div class="col-sm-6">
                  <input type="text" name="createdtgl" class="form-control" value="<?=$tgl?>" disabled>
              </div>
              </td>
           </tr>
           <tr>
            <td>Created by</td>
            <td>
            <div class="col-sm-6">
              <input type="text" name="createdby" class="form-control" value="<?=$by?>" disabled>
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
