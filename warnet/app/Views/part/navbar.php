<nav class="navbar navbar-expand-md navbar-dark bg-black py-3 px-4">
    <a class="navbar-brand" href="#">
        <img src="<?= base_url('template/images/cover.jpg') ?>" alt="Logo" width="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/cart">Keranjang</a>
            </li>
            <?php if (session()->get('username') == ''): ?>
                <li class="nav-item">
                    <a class="btn btn-light text-dark mx-2" href="/login">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light text-dark mx-2" href="/register">Register</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <span class="nav-link text-white">Halo, <?= session()->get('username') ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/logout">[ Logout ]</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>