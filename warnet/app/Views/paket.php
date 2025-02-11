<div class="wrapper">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="text-center">Data Paket</h1>

                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPaketModal">
                    <i class="fa fa-plus"></i> Tambah Paket
                </button>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pakets as $paket): ?>
                            <tr>
                                <td><?= $paket['id'] ?></td>
                                <td><?= esc($paket['nama_paket']) ?></td>
                                <td><?= 'Rp ' . number_format($paket['harga'], 0, ',', '.') ?></td>
                                <td>
                                    <button class="btn btn-warning edit-btn"
                                        data-id="<?= $paket['id'] ?>"
                                        data-nama="<?= esc($paket['nama_paket']) ?>"
                                        data-harga="<?= esc($paket['harga']) ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editPaketModal">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <form action="<?= base_url('/paket/delete/' . $paket['id']) ?>" method="post" class="d-inline">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Modal Tambah Paket -->
                <div class="modal fade" id="addPaketModal">
                    <div class="modal-dialog">
                        <form action="<?= base_url('/paket/store') ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Paket</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Edit Paket -->
                <div class="modal fade" id="editPaketModal">
                    <div class="modal-dialog">
                        <form action="<?= base_url('/paket/update') ?>" method="post">
                            <input type="hidden" name="id" id="edit-id">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Paket</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="text" name="nama_paket" id="edit-nama" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" name="harga" id="edit-harga" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script untuk Edit Modal -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let editButtons = document.querySelectorAll(".edit-btn");
        editButtons.forEach(button => {
            button.addEventListener("click", function() {
                document.getElementById("edit-id").value = this.dataset.id;
                document.getElementById("edit-nama").value = this.dataset.nama;
                document.getElementById("edit-harga").value = this.dataset.harga;
            });
        });
    });
</script>