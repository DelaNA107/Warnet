<!-- Products Start -->
<div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Daftar Paket</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php foreach($pkt as $pktlist): ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?= $pktlist['nama_paket'] ?></h6>
                    </div>
                    <div class="card-footer d-flex bg-light border">
                        <a href="<?= base_url('kategoripaket/'.$pktlist['kode_paketF'].'/detail') ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            
        </div>
    </div>
    <!-- Products End -->

