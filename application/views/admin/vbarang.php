<!-- Section JoorxCMS -->
<h1 class="header">news</h1>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b>Daftar Berita</b></div>
  <div class="panel-body">
    <p><?=$this->session->flashdata('pesan')?> </p>
      <a href="<?=base_url()?>admin/form/add" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
      <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th>Title</th>
         <th>Photo</th>
         <th>Published</th>
         <th colspan="2">Action</th>
         </tr>
        </thead>
        <tbody>
        <?php if(empty($qbarang)){ ?>
         <tr>
          <td colspan="6">Data tidak ditemukan</td>
         </tr>
       <?php }else{
          $no=0;
          foreach($qbarang as $rowbarang){ $no++; $photos = $rowbarang->photo;?>
         <tr>
          <td><?=$no?></td>
          <td><?=$rowbarang->title?></td>
          <td><img class="img-responsive img-rounded" src="<?php echo base_url().'assets/images/'.$photos.''; ?>" alt="<?=$rowbarang->title?>" title="<?=$rowbarang->title?>" width="200" height="200"></td>
          <td><?=$rowbarang->publish?></td>
          <td>
           <a href="<?=base_url()?>admin/form/edit/<?=$rowbarang->id?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
           <a href="<?=base_url()?>admin/detail/<?=$rowbarang->id?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
           <a href="<?=base_url()?>admin/hapus/<?=$rowbarang->id?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
          </td>
         </tr>
       <?php }}?>
        </tbody>
       </table>
        </div>
    </div>    <!-- /panel -->
    </div> <!-- /container -->
<!-- Section JoorxCMS -->
