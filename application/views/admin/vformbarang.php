<?php
if($aksi=='aksi_add'){
  $id = "";
  $title = "";
  $photo = "";
  $slug = "";
  $text = "";
  $publish = "";
  date_default_timezone_set("Asia/Jakarta");
  $date = date("Y-m-d"); ?>
  <h1 class="header">news</h1>
  <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
    <div class="panel-heading"><b><?=$titles?></b></div>
    <div class="panel-body">
    <?=$this->session->flashdata('pesan')?>
    <?php echo form_open_multipart('admin/form/'.$aksi.''); ?>
         <table class="table table-striped">

           <tr>
            <td style="width:15%;">Title</td>
            <td>
              <div class="col-sm-6">
                  <input type="text" name="title" class="form-control" placeholder="Masukan judul ...">
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
            <td>Text</td>
            <td>
            <div class="col-sm-6">
              <textarea name="text" cols="120" rows="30" placeholder="Masukan isi konten ..."></textarea>
              <input type="hidden" name="publish" class="form-control" value="<?=$date?>">
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
      </div>    <!-- /panel -->
      </div> <!-- /container -->
<?php } else { ?>
  <?php foreach($qdata as $rowdata){
    $id = $rowdata->id;
    $title = $rowdata->title;
    $photo = $rowdata->photo;
    $slug = $rowdata->slug;
    $text = $rowdata->text;
    $publish = $rowdata->publish;
    date_default_timezone_set("Asia/Jakarta");
    $date = date("Y-m-d");
  } ?>
  <h1 class="header">news</h1>
  <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
    <div class="panel-heading"><b><?=$titles?></b></div>
    <div class="panel-body">
    <?=$this->session->flashdata('pesan')?>
    <?php echo form_open_multipart('admin/form/'.$aksi.''); ?>
         <table class="table table-striped">

           <tr>
            <td style="width:15%;">Title</td>
            <td>
              <div class="col-sm-6">
                  <input type="hidden" name="id" class="form-control" value="<?=$id?>">
                  <input type="text" name="title" class="form-control" value="<?=$title?>">
              </div>
              </td>
           </tr>
           <tr>
            <td>Photo</td>
            <td>
              <div class="col-sm-6">
                  <img class="img-responsive img-rounded" src="<?php echo base_url().'assets/images/'.$photo.''; ?>" alt="<?=$title?>" title="<?=$title?>" width="200" height="200">
                  <input type="file" name="photo" accept="image/*" class="form-control">
              </div>
              </td>
           </tr>
           <tr>
            <td>Text</td>
            <td>
            <div class="col-sm-6">
              <textarea name="text" cols="120" rows="30"><?=$text?></textarea>
              <input type="hidden" name="publish" class="form-control" value="<?=$date?>">
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
      </div>    <!-- /panel -->
      </div> <!-- /container -->
<?php } ?>
