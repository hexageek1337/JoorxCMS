<!-- Form Login JoorxCMS -->
<h2 id="news" class="header">News</h2>

<div class="container">
    <div class="admin">
    <table id="table" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Images</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
    <script type="text/javascript">
    var save_method; //for save method string
    var table;

    $(document).ready(function() {
        //datatables
        table = $('#table').dataTable( {
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": '<?php echo site_url('admin/json'); ?>',
                "dataType": "json",
                "cache": false,
                "contentType": "application/json; charset=utf-8"
            },
            "columns": [
                {"aaData": "id"},
                {"aaData": "title"},
                {"aaData": "images"},
                {"aaData": "action"}
            ],
        } );
    });
    </script>
    <a href="<?php echo base_url()."admin/add_data";?>"><button class="btn btn-primary">Insert</button></a>
    </div>
</div>
<!-- Form Login JoorxCMS -->