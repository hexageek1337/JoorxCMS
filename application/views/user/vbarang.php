<!-- Section JoorxCMS -->
<h1 class="header">User</h1>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b><?=$titles?></b></div>
  <div class="panel-body">
    <p><?=$this->session->flashdata('pesan')?> </p>
      <a class="anchor" href="<?=base_url()?>user/form/add"><button class="btn btn-sm btn-custom"><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
      <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th width="200">Username</th>
         <th>Photo</th>
         <th>Role</th>
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
          foreach($qbarang as $rowbarang){ $photos = $rowbarang['photo'];?>
         <tr>
          <td><?=$rowbarang['id']?></td>
          <td><?=$rowbarang['username']?></td>
          <td><img class="img-responsive img-rounded" src="<?php echo base_url().'assets/images/user/'.$photos.''; ?>" alt="<?=$rowbarang['username']?>" title="<?=$rowbarang['username']?>" width="200" height="200"></td>
          <td><?=$rowbarang['role']?></td>
          <td>
           <a href="<?=base_url()?>user/form/edit/<?=$rowbarang['id']?>"><button class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></a>
           <a href="<?=base_url()?>user/detail/<?=$rowbarang['id']?>"><button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></button></a>
           <a href="<?=base_url()?>user/hapus/<?=$rowbarang['id']?>"><button class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></button></a>
          </td>
         </tr>
       <?php }}?>
        </tbody>
       </table>
        </div>
    </div>
</div>

<div class='center'>
<nav aria-label="Page navigation">
    <?php echo $links; ?>
</nav>
</div>
<!-- Section JoorxCMS -->
