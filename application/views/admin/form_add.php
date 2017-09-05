<!-- Form Login JoorxCMS -->
<h2 id="news" class="header">Add News</h2>

<div class="container">
    <table class="table table-hover">
        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('admin/insert'); ?>
            <tr>
                <td class="center">Judul</td>
                <td><input type="text" name="title" placeholder="Masukan judul ..."></td>
            </tr>
            <tr>
                <td class="center">Konten</td>
                <td><textarea name="text" placeholder="Masukan konten ..."></textarea></td>
            </tr>
            <tr>
                <td class="center">Gambar</td>
                <td><input type="file" name="images" accept="image/*"></td>
            </tr>
            <tr>
                <td class="center" colspan="2"><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        <?php echo form_close(); ?>
    </table>
</div>
<!-- Form Login JoorxCMS -->