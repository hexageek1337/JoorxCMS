<!-- Section JoorxCMS -->
<h1 class="header">Category</h1>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-default">
  <div class="panel-heading"><b><?=$titles?></b></div>
  <div class="panel-body">
    <p><?=$this->session->flashdata('pesan')?> </p>
      <a class="anchor" href="<?=base_url()?>admin/formcat/add"><button class="btn btn-sm btn-custom"><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
      <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th width="520">Name</th>
         <th>Created on</th>
         <th>Created by</th>
         <th>Action</th>
         </tr>
        </thead>
        <tbody>
        <?php if(empty($qbarang)){ ?>
         <tr>
          <td colspan="6">Data tidak ditemukan</td>
         </tr>
       <?php }else{
          $no=0;
          foreach($qbarang as $rowbarang){ ?>
         <tr>
          <td><?=$rowbarang['category_id']?></td>
          <td><?=$rowbarang['category_name']?></td>
          <td><?=$rowbarang['created_tgl']?></td>
          <td><?=$rowbarang['created_by']?></td>
          <td>
           <a href="<?=base_url()?>admin/formcat/edit/<?=$rowbarang['category_id']?>"><button class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></button></a>
           <a href="<?=base_url()?>admin/formcat/delete/<?=$rowbarang['category_id']?>"><button class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></button></a>
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
