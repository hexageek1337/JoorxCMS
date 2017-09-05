<!-- Form Login JoorxCMS -->
<h2 id="news" class="header">Edit News</h2>

<div class="container">
    <table class="table table-hover">
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('admin/edit_data/'.$id.''); ?>
            <tr>
                <td class="center">ID</td>
                <td><input type="text" name="id" value="<?php echo $id; ?>" disabled></td>
            </tr>
            <tr>
                <td class="center">Judul</td>
                <td><input type="text" name="title" placeholder="Masukan judul ..." value="<?php echo $title; ?>"></td>
            </tr>
            <tr>
                <td class="center">Konten</td>
                <td><textarea name="text" placeholder="Masukan konten ..."><?php echo $text; ?></textarea></td>
            </tr>
            <tr>
                <td class="center">Gambar</td>
                <td><input type="file" name="images" accept="image/*"><img src='<?php echo base_url('images/gallery/'.$images.''); ?>' width='300' height='200'></td>
            </tr>
            <tr>
                <td class="center" colspan="2"><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        <?php echo form_close(); ?>
    </table>
</div>
<!-- Form Login JoorxCMS -->