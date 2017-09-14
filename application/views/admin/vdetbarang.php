<!-- Section JoorxCMS -->
<h1 class="header">news</h1>
<?php
  foreach($qbarang as $rowdata){
    $id = $rowdata->id;
    $title = $rowdata->title;
    $photo = $rowdata->photo;
    $slug = $rowdata->slug;
    $text = $rowdata->text;
    $created = $rowdata->created;
    $tags = $rowdata->tags;
    $publish = $rowdata->publish;
  }
?>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b><?=$titles?></b></div>
  <div class="panel-body">

     <p><a href="<?=base_url('admin/berita')?>"><button class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> Kembali</button></a> <a href="<?=base_url('blog/'.$slug)?>"><button class="btn btn-sm btn-info"><i class="glyphicon glyphicon-repeat"></i> View Article</button></a>
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
          <td><?=word_limiter($text, 200)?></td>
          </tr>
         <tr>
           <td>Created</td>
           <td><?=$created?></td>
         </tr>
         <tr>
          <td>Tags</td>
          <td><?php $all_tags = explode(',' ,$tags); foreach ($all_tags as $one_tag){ echo '<a href="/blog/tag/'.$one_tag.'"><span class="label label-info">'.$one_tag.'</span></a> '; } ?></td>
          </tr>
         <tr>
          <td>Published</td>
          <td><?=$publish?></td>
          </tr>

       </table>
        </div>
    </div>
    </div>
<!-- Section JoorxCMS -->
