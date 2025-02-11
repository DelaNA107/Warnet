<body class="bg-black muli">
    <section id="home" class="min-h-100vh flex justify-start items-center">
        <div class="mx-5 md-mx-l5">
            <div class="inline-block br-round bg-indigo-30 indigo-lightest p-2 fs-s2 mb-5">
                <div class="inline-block bg-indigo indigo-lightest br-round px-3 py-1 mr-3 fs-s3">Join Us</div>
                Temptnya Arena Game
            </div>
            <div>
                <h1 class="white fs-l3 lh-2 md-fs-xl1 md-lh-1 fw-900 ">Welcome To <br />Trapesium E-Sport Arena</h1>

            </div>
        </div>
    </section>

    <div class="container mt-4">
        <h1 class="text-center text-white font-weight-bold mb-4">Daftar Paket</h1>
        <div class="row">
            <?php foreach ($pakets as $paket): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card bg-dark shadow-lg">
                        <div class="card-body text-center">
                            <h5 class="card-title text-white"> <?= $paket['nama_paket'] ?> </h5>
                            <p class="text-white font-weight-bold mb-2">Rp <?= number_format($paket['harga'], 0, ',', '.') ?></p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPaket<?= $paket['id'] ?>">Pilih Paket</button>
                        </div>
                    </div>
                </div>

                <!-- Modal Pilih Paket dan Komputer -->
                <div class="modal fade" id="modalPaket<?= $paket['id'] ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: black;">Pilih Komputer & Tambahkan ke Keranjang</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p style="color: black;">Silakan pilih komputer untuk menggunakan <strong><?= $paket['nama_paket'] ?></strong></p>
                                <form action="<?= site_url('cart/add') ?>" method="post">
                                    <input type="hidden" name="paket_id" value="<?= $paket['id'] ?>">
                                    <div class="form-group">
                                        <label for="komputer" style="color: black;">Pilih Komputer:</label>
                                        <select name="komputer_id" class="form-control" required>
                                            <?php foreach ($komputers as $komputer): ?>
                                                <?php if ($komputer['status'] == 'Tersedia'): ?>
                                                    <option value="<?= $komputer['id'] ?>">
                                                        <?= $komputer['nama'] ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>