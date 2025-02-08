<body class="bg-black muli">
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table width="100%" border="1" cellspacing="5" cellpadding="5">
                    <thead class="white fs-9">
                        <tr>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php 
                            $total=0;
                            foreach($detail as $trklist): ?>
                        <?php
                            $subtotal=$trklist['harga']*$trklist['total'];
                            $total=$total+$subtotal;
                        ?>
                        <tr>
                            <td class="align-middle"><?= $trklist['harga'] ?></td>
                            <td class="align-middle"><?= $trklist['total'] ?></td>
                            <td class="align-middle"><?= $subtotal ?></td>
                            <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="white fs-9">Cart Summary</h4>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="white fs-9">Total</h5>
                            <h5 class="white fs-9"><?= number_to_currency($total, 'IDR', 'en_ID', 2) ?></h5>
                        </div>
                        <a href="<?= base_url('checkout') ?>" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>