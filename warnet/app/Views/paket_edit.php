<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                    <h1>Paket</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Paket</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Paket</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <input type="hidden" name="id" value="<?= $paket['kode_paket'] ?>" />
                    <div class="form-group">
                        <label for="kode_paket">Kode Paket</label>
                        <input type="text" class="form-control" id="kode_paket" name="kode_paket" value="<?= $paket['kode_paket'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="form-control" >
                            <?php foreach ($kategori as $k) : 
                                if($k['id_kategori']==$paket['id_kategori']){
                                ?>
                                <option value="<?= $k['id_kategori'] ?>" selected><?= $k['nama_kategori'] ?></option>
                                <?php }else{  ?>
                                <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                            <?php }
                                    endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket"  value="<?= $paket['nama_paket'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_paket">Harga Paket</label>
                        <input type="text" class="form-control" id="harga_paket" name="harga_paket"  value="<?= $paket['harga_paket'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kadaluarsa_paket">Kadaluarsa Paket</label>
                        <input type="text" class="form-control" id="kadaluarsa_paket" name="kadaluarsa_paket"  value="<?= $paket['kadaluarsa_paket'] ?>" required>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
