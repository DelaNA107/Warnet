<div class="wrapper">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="text-center">Data Transaksi</h1>

                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTransaksiModal">
                    <i class="fa fa-plus"></i> Tambah Transaksi
                </button>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Komputer</th>
                            <th>Paket</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksis as $transaksi): ?>
                            <tr>
                                <td><?= $transaksi['id'] ?></td>
                                <td><?= esc($transaksi['nama']) ?></td>
                                <td><?= esc($transaksi['komputer_nama']) ?></td>
                                <td><?= esc($transaksi['paket_nama']) ?></td>
                                <td><?= 'Rp ' . number_format($transaksi['harga'], 0, ',', '.') ?></td>
                                <td><?= esc($transaksi['created_at']) ?></td>
                                <td>
                                    <!-- <button class="btn btn-warning edit-btn"
                                        data-id="<?= $transaksi['id'] ?>"
                                        data-nama="<?= esc($transaksi['nama']) ?>"
                                        data-komputer="<?= esc($transaksi['komputer_id']) ?>"
                                        data-paket="<?= esc($transaksi['paket_id']) ?>"
                                        data-harga="<?= esc($transaksi['harga']) ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editTransaksiModal">
                                        <i class="fa fa-edit"></i> Edit
                                    </button> -->
                                    <form action="<?= base_url('/transaksi/delete/' . $transaksi['id']) ?>" method="post" class="d-inline">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Modal Tambah Transaksi -->
                <div class="modal fade" id="addTransaksiModal">
                    <div class="modal-dialog">
                        <form action="<?= base_url('/transaksi/store') ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Transaksi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="user_id" value="<?= session('kode_user') ?>">
                                    <div class="mb-3">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <select name="komputer_id" class="form-control" required>
                                            <option value="">Pilih Komputer</option>
                                            <?php foreach ($komputers as $komputer): ?>
                                                <option value="<?= $komputer['id'] ?>"> <?= esc($komputer['nama']) ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select name="paket_id" class="form-control" required>
                                            <option value="">Pilih Paket</option>
                                            <?php foreach ($pakets as $paket): ?>
                                                <option value="<?= $paket['id'] ?>"> <?= esc($paket['nama_paket']) ?> - <?= 'Rp ' . number_format($paket['harga'], 0, ',', '.') ?> </option>
                                            <?php endforeach; ?>
                                        </select>
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

                <!-- Modal Edit Transaksi -->
                <div class="modal fade" id="editTransaksiModal">
                    <div class="modal-dialog">
                        <form action="<?= base_url('/transaksi/update') ?>" method="post">
                            <input type="hidden" name="id" id="edit-id">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Transaksi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="text" name="nama" id="edit-nama" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <select name="komputer_id" id="edit-komputer" class="form-control" required>
                                            <?php foreach ($komputers as $komputer): ?>
                                                <option value="<?= $komputer['id'] ?>"> <?= esc($komputer['nama']) ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select name="paket_id" id="edit-paket" class="form-control" required>
                                            <?php foreach ($pakets as $paket): ?>
                                                <option value="<?= $paket['id'] ?>"> <?= esc($paket['nama_paket']) ?> </option>
                                            <?php endforeach; ?>
                                        </select>
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