<div class="wrapper">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="text-center">Data Komputer</h1>
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addKomputerModal">
                    <i class="fa fa-plus"></i> Tambah Komputer
                </button>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Komputer</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($komputers as $komputer): ?>
                            <tr>
                                <td><?= $komputer['id'] ?></td>
                                <td><?= esc($komputer['nama']) ?></td>
                                <td><?= esc($komputer['status']) === 'Tersedia' ? '✅ Tersedia' : '❌ Tidak Tersedia' ?></td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editKomputerModal<?= $komputer['id'] ?>">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                    <form action="<?= base_url('/komputer/delete/' . $komputer['id']) ?>" method="post" class="d-inline">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Tambah Komputer Modal -->
                            <div class="modal fade" id="addKomputerModal" tabindex="-1" aria-labelledby="addKomputerModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addKomputerModalLabel">Tambah Komputer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('/komputer/store') ?>" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <input type="text" name="nama" placeholder="Nama Komputer" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <select name="status" class="form-control">
                                                        <option value="tersedia">Tersedia</option>
                                                        <option value="tidak tersedia">Tidak Tersedia</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit Komputer -->
                            <div class="modal fade" id="editKomputerModal<?= $komputer['id'] ?>" tabindex="-1" aria-labelledby="editKomputerModalLabel<?= $komputer['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editKomputerModalLabel<?= $komputer['id'] ?>">Edit Komputer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('/komputer/update/' . $komputer['id']) ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $komputer['id'] ?>">

                                                <!-- Nama Komputer -->
                                                <div class="mb-3">
                                                    <label for="edit_nama<?= $komputer['id'] ?>" class="form-label">Nama Komputer</label>
                                                    <input type="text" id="edit_nama<?= $komputer['id'] ?>" name="nama" value="<?= esc($komputer['nama']) ?>" class="form-control">
                                                </div>

                                                <!-- Status -->
                                                <div class="mb-3">
                                                    <label for="edit_status<?= $komputer['id'] ?>" class="form-label">Status</label>
                                                    <select id="edit_status<?= $komputer['id'] ?>" name="status" class="form-control">
                                                        <option value="Tersedia" <?= $komputer['status'] === 'Tersedia' ? 'selected' : '' ?>>✅ Tersedia</option>
                                                        <option value="Tidak Tersedia" <?= $komputer['status'] === 'Tidak Tersedia' ? 'selected' : '' ?>>❌ Tidak Tersedia</option>
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>