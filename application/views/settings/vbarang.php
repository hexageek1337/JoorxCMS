<!-- Section JoorxCMS -->
<h1 class="header">User</h1>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b><?=$titles?></b></div>
  <div class="panel-body">
    <p><?=$this->session->flashdata('pesan')?> </p>
      <a class="anchor" href="<?=base_url()?>settings/form/add"><button class="btn btn-sm btn-custom"><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
      <table class="table table-striped table-responsive">
        <thead>
         <tr>
         <th>No</th>
         <th>Username</th>
         <th>Email</th>
         <th>Photo</th>
         <th>Role</th>
         <th>Status</th>
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
          foreach($qbarang as $rowbarang){ $photos = $rowbarang['avatar'];?>
         <tr>
          <td><?=$rowbarang['id']?></td>
          <td><?=$rowbarang['username']?></td>
          <td><?=$rowbarang['email']?></td>
          <td><img class="img-responsive img-rounded" src="<?php echo base_url().'assets/images/user/'.$photos.''; ?>" alt="<?=$rowbarang['username']?>" title="<?=$rowbarang['username']?>" width="200" height="200"></td>
          <td><?php if($rowbarang['is_admin'] === "1") { echo "admin"; } else { echo "member"; } ?></td>
          <td><?php if($rowbarang['is_deleted'] === "1") { echo "Inactive"; } else { echo "Active"; } ?></td>
          <td>
           <a href="<?=base_url()?>settings/form/edit/<?=$rowbarang['id']?>"><button class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></a>
           <a href="<?=base_url()?>settings/detail/<?=$rowbarang['id']?>"><button class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></button></a>
           <a href="<?=base_url()?>settings/hapus/<?=$rowbarang['id']?>"><button class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></button></a>
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
