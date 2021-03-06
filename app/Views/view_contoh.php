<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <title>CRUD Datatable Server Side Codeigniter 4title>
</head>

<body>
    <div class="container">
        <h1>CRUD Datatable Server Side Codeigniter 4h1>
        <hr>
        <button class="btn btn-primary" onclick="tambah()">Tambah Userbutton>
        <hr>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th width="1%">Noth>
                    <th>Nama Userth>
                    <th>Alamatth>
                    <th>Actionth>
                tr>
            thead>
        table>
    div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal titleh5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Ã—span>
                    button>
                div>
                <div class="modal-body">
                    <form id="form-users">
                        <div class="form-group">
                            <label for="nama_user">Nama Userlabel>
                            <input type="hidden" name="id_user" id="id_user">
                            <input type="text" class="form-control" id="nama_user" name="nama_user">
                        div>
                        <div class="form-group">
                            <label for="alamat">Alamatlabel>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        div>
                    form>
                div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Closebutton>
                    <button type="button" class="btn btn-primary" onclick="proses()">Save changesbutton>
                div>
            div>
        div>
    div>

    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js">  </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">  </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">  </script>
    
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js">  </script>
    <script>
        let url;
        let status = 'tambah';
        $(document).ready(function() {
            tampil_table_users();
        });

        function tambah() {
            status = 'tambah';
            $('#exampleModal').modal('show');
            $('#form-users')[0].reset();
        }

        function edit(id_user) {
            status = 'edit';
            $('#exampleModal').modal('show');
            $('#id_user').val(id_user);
            $.ajax({
                url: " echo base_url('home/edit'); ?>",
                type: 'POST',
                dataType: 'JSON',
                data: $('#form-users').serialize(),
                success: function(x) {
                    if (x.sukses == true) {
                        $('#nama_user').val(x.data.nama_user);
                        $('#alamat').val(x.data.alamat);
                    }
                }
            });
        }

        function hapus(id_user) {
            $.ajax({
                url: " echo base_url('home/hapus'); ?>",
                type: 'POST',
                dataType: 'JSON',
                data: {
                    id_user: id_user
                },
                success: function(x) {
                    if (x.sukses == true) {
                        tampil_table_users();
                    }
                }
            });
        }

        function proses() {
            if (status == 'tambah') {
                url = " echo base_url('home/tambah'); ?>";
            } else if (status == 'edit') {
                url = " echo base_url('home/update'); ?>";
            } else {
                url = " echo base_url('home/hapus'); ?>";
            }

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'JSON',
                data: $('#form-users').serialize(),
                success: function(x) {
                    if (x.sukses == true) {
                        $('#exampleModal').modal('hide');
                        tampil_table_users();
                    }
                }
            });
        }

        function tampil_table_users() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                bDestroy: true,
                responsive: true,
                ajax: {
                    url: " echo base_url('home/dt_users'); ?>",
                    type: "POST",
                    data: {},
                },
                columnDefs: [{
                        targets: [0, -1],
                        orderable: false,
                    },
                    {
                        width: "1%",
                        targets: [0, -1],
                    },
                    {
                        className: "dt-nowrap",
                        targets: [-1],
                    }
                ],

            });
        }
    </script>
</body>

</html>