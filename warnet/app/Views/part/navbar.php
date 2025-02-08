<nav class="w-100pc flex flex-column md-flex-row md-px-10 py-5 bg-black">
        <div class="flex justify-between">
            <a href="#" class="flex items-center p-2 mr-4 no-underline">
                <img class="max-h-10 w-auto" src="template/images/cover.jpg" />
            </a>
            <a data-toggle="toggle-nav" data-target="#nav-items" href="#"
                class="flex items-center ml-auto md-hidden indigo-lighter opacity-50 hover-opacity-100 ease-300 p-1 m-3">
                <i data-feather="menu"></i>
            </a>
        </div>
        <div id="nav-items" class="hidden flex sm-w-100pc flex-column md-flex md-flex-row md-justify-end items-center">
            <a href="#home" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Home</a>
            <a href="Kategori.php" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Kategori</a>
            <a href="cart" class="fs-s1 mx-3 py-3 indigo no-underline hover-underline">Keranjang (<span class="badge"><?= $total ?></span>)</a>
            <?php
                if (session()->get('username') == ''){
                    echo "<a href='/login' class='button bg-white black fw-600 no-underline mx-5'>Log In</a>";
                    echo "<a href='/register' class='button bg-white black fw-600 no-underline mx-5'>Register</a>";
                }else{
                    echo "<a href='#' class='nav-item nav-link'>Halo, ".session()->get('username')."</a>";
                    echo "<a href='logout' class='nav-item nav-link'>[ Logout ]</a>";
                }
            ?>
        </div>
    </nav>