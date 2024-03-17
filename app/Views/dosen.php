<?= include ('layout/lib.php');?>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Main Content Here -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Your Main Content Goes Here -->
                    <?php if(!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('message');?>
                    </div>
                    <?php endif ?>
                    <button type="button" id="tambahData" class="btn btn-md btn-success mb-3" data-toggle="modal" data-target="#addDataModal">TAMBAH DATA</button>
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>KODE</th>
                                <th>NAMA</th>
                                <th>STATUS</th>
                                <th style="width: 100px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($DataDosen as $key => $dosen) : ?>
                            <tr>
                                <td><?php echo $dosen['kode_dosen'] ?></td>
                                <td><?php echo $dosen['nama_dosen'] ?></td>
                                <td><?php echo $dosen['status_dosen'] ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-primary edit-dosen" data-id="<?= $dosen['id_dosen']; ?>" data-kode="<?= $dosen['kode_dosen']; ?>" data-nama="<?= $dosen['nama_dosen']; ?>" data-status="<?= $dosen['status_dosen']; ?>">Edit</button>
                                    <a href="/dosen/delete/<?= $dosen['id_dosen'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus data ini ?')">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Tambah Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for adding data -->
                <form action="/dosen/tambah" method="post">
                    <div class="form-group">
                        <label for="kode_dosen">Kode Dosen</label>
                        <input type="text" class="form-control" id="kode_dosen" name="kode_dosen">
                    </div>
                    <div class="form-group">
                        <label for="nama_dosen">Nama Dosen</label>
                        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen">
                    </div>
                    <div class="form-group">
                        <label for="status_dosen">Status Dosen</label>
                        <select class="form-control" id="status_dosen" name="status_dosen">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $('#dataTable').DataTable();
        });
    </script>
<!-- script tambah -->
<script>
    $(document).ready(function(){
        // Menangkap klik tombol tambah data
        $("#tambahData").click(function(){
            // Mengosongkan nilai input di modal
            $("#addDataModal #id_dosen").val('');
            $("#addDataModal #kode_dosen").val('');
            $("#addDataModal #nama_dosen").val('');
            $("#addDataModal #status_dosen").val('');

            // Mengubah action form
            $("#addDataModal form").attr("action", "/dosen/tambah");

            // Mengubah label tombol
            $("#addDataModal button[type=submit]").text("Tambah");

            // Mengubah caption
            $("#addDataModalLabel").text("Tambah Data Dosen");

            // Menampilkan modal
            $("#addDataModal").modal("show");
        });
    });
</script>

<!-- script update  -->
<script>
    $(document).ready(function(){
        // Menangkap klik tombol edit
        $(".edit-dosen").click(function(){
            // Mengambil data dosen dari atribut data
            var idDosen = $(this).data('id');
            var kodeDosen = $(this).data('kode');
            var namaDosen = $(this).data('nama');
            var statusDosen = $(this).data('status');
            
            // Mengisi nilai input di modal dengan data yang sesuai
            $("#addDataModal #id_dosen").val(idDosen);
            $("#addDataModal #kode_dosen").val(kodeDosen);
            $("#addDataModal #nama_dosen").val(namaDosen);
            $("#addDataModal #status_dosen").val(statusDosen);

            //ubah form action
            $("#addDataModal form").attr("action", "/dosen/update/" + idDosen);

            //ubah label button
            $("#addDataModal button[type=submit]").text("Update");

            //ubah caption
            $("#addDataModalLabel").text("Edit Data Dosen");

            
            // Menampilkan modal
            $("#addDataModal").modal("show");
        });
    });
</script>

</body>
</html>
