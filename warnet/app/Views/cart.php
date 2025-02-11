<body class="bg-black muli">
    <div class="container mt-4">
        <h1 class="text-center text-white font-weight-bold mb-4">Keranjang Belanja</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($keranjang as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['harga'] ?></td>
                        <td>
                            <a href="<?= site_url('cart/remove/' . $item['id']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Tombol Checkout -->
        <?php if (!empty($keranjang)): ?>
            <form action="<?= site_url('cart/checkout') ?>" method="post">
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
        <?php endif; ?>

        <hr>

        <!-- Riwayat Belanja -->
        <h2 class="text-white mt-4">Riwayat Belanja</h2>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($history as $item): ?>
                    <tr>
                        <td><?= $item['nama'] ?></td>
                        <td><?= $item['harga'] ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($item['created_at'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>