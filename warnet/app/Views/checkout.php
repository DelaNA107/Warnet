<body class="bg-black muli">
<form method="post" action="<?= base_url('cart/'.$idtrans.'/finishTrans') ?>">
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="white fs-9">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-12 form-group white fs-9">
                            <label>Username</label>
                            <input class="form-control" type="text" name="username">
                        </div>
                        <div class="col-md-6 form-group white fs-9">
                            <label>Password</label>
                            <input class="form-control" type="text" name="password">
                        </div>
                        <div class="col-md-6 form-group white fs-9">
                            <label>Duration</label>
                            <input class="form-control" type="text" name="duration">
                        </div>
                        <div class="col-md-12 form-group white fs-9">
                            <label>Type of Paket</label>
                            <input class="form-control" type="text" name="grup">
                        </div>
                        <div class="col-md-6 form-group white fs-9">
                            <label>Date</label>
                            <input class="form-control" type="text" name="date">
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="white fs-9">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="white fs-9">Paket</h5>
                        <?php 
                            $total=0;
                            foreach($transaksi as $trklist): ?>
                        <?php
                            $subtotal=$trklist['harga']*$trklist['jumlah'];
                            $total=$total+$subtotal;
                        ?>
                        <div class="d-flex justify-content-between">
                            <p><?= $trklist['nama_paket'] ?></p>
                            <p><?= $subtotal ?></p>
                        </div>
                        <?php endforeach ?>
                        <hr class="mt-0">
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="white fs-9">Total</h5>
                            <h5 class="white fs-9"><?= number_to_currency($total, 'IDR', 'en_ID', 2) ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="white fs-9">Payment</h4>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <input type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" value="Place Order">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
