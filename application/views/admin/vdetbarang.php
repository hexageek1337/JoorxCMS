<!-- Section JoorxCMS -->
<h1 class="header">news</h1>
<?php
  foreach($qbarang as $rowdata){
    $id = $rowdata->id;
    $title = $rowdata->title;
    $photo = $rowdata->photo;
    $slug = $rowdata->slug;
    $text = $rowdata->text;
    $publish = $rowdata->publish;
  }
?>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b><?=$titles?></b></div>
  <div class="panel-body">

     <p> <a href="<?=base_url()?>admin" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</a>
     </p>

       <table class="table table-striped">
         <tr>
          <td>Title</td>
          <td><?=$title?></td>
         </tr>
         <tr>
          <td>Photo</td>
          <td><img class="img-responsive img-rounded" src="<?php echo base_url().'assets/images/'.$photo.''; ?>" alt="<?=$title?>" title="<?=$title?>" width="200" height="200"></td>
          </tr>
         <tr>
          <td>Text</td>
          <td><?=$text?></td>
          </tr>
         <tr>
          <td>Published</td>
          <td><?=$publish?></td>
          </tr>

       </table>
        </div>
    </div>    <!-- /panel -->

    </div> <!-- /container -->
<!-- Section JoorxCMS -->
