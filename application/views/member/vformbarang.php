<?php
if($aksi=='aksi_add'){
  $id = "";
  $title = "";
  $photo = "";
  $slug = "";
  $text = "";
  $tags = "";
  $category = "";
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
    <?php echo form_open_multipart('member/form/'.$aksi.''); ?>
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
              <textarea name="text" id="content"></textarea>
              <?php echo display_ckeditor($ckeditor); ?>
              <input type="hidden" name="publish" class="form-control" value="<?=$date?>">
            </div>
            </td>
           </tr>
           <tr>
            <td>Tags</td>
            <td>
              <div class="col-sm-6">
                  <input type="text" name="tags" class="form-control" placeholder="Masukan tag yang dipisahkan dengan koma ...">
              </div>
              </td>
           </tr>
           <tr>
            <td>Category</td>
            <td>
            <div class="col-sm-6">
              <select name="category" class="form-control">
                <option selected>-- Select Category --</option>
                <?php foreach ($cdata as $categoryid) { ?>
                <option value="<?=$categoryid['category_name']?>"><?=$categoryid['category_name']?></option>
                <?php } ?>
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
    $title = $rowdata->title;
    $photo = $rowdata->photo;
    $slug = $rowdata->slug;
    $text = $rowdata->text;
    $tags = $rowdata->tags;
    $category = $rowdata->category;
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
    <?php echo form_open_multipart('member/form/'.$aksi.''); ?>
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
              <textarea name="text" id="content"><?=$text?></textarea>
              <?php echo display_ckeditor($ckeditor); ?>
              <input type="hidden" name="publish" class="form-control" value="<?=$date?>">
            </div>
            </td>
           </tr>
           <tr>
            <td>Tags</td>
            <td>
              <div class="col-sm-6">
                  <input type="text" name="tags" class="form-control" value="<?=$tags?>">
              </div>
              </td>
           </tr>
           <tr>
            <td>Category</td>
            <td>
            <div class="col-sm-6">
              <select name="category" class="form-control">
                <option>-- Select Category --</option>
                <?php foreach ($cdata as $categoryid) { ?>
                <option value="<?=$categoryid['category_name']?>" <?php if ($categoryid['category_name'] == $category) { echo 'selected'; } ?>><?=$categoryid['category_name']?></option>
                <?php } ?>
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
