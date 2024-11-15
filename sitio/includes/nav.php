<nav class="navbar navbar-expand-lg navbar-light background">
    <div class="container">
                    <a
                        href="index.php?sec=home"
                        title="Logo"
                        class="logo"
                    >
                        <img src="img/logo.webp" alt="">
                    </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                    <?php if(isset($_SESSION["login"]) && $_SESSION["login"]["roles"] === "superadmin" /*|| $_SESSION["login"]["roles"] === "admin"*/){ ?>       
                        <li class="nav-item">
                    <a class="nav-link text-light" href="admin/index.php">
                        ADMIN
                    </a>
                </li>
                     <?php }?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?sec=home">
                        <?= (!isset($_GET["sec"]) || (isset($_GET["sec"]) && $_GET["sec"] == "home")) ? "<b>Home</b>" : "Home" ?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light btn btn-secondary" href="index.php?sec=productos"><?php if (isset($_GET["sec"]) && $_GET["sec"] == "productos" || isset($_GET["categoria"]) || isset($_GET["id"])) {
                        echo "<b>Productos</b>";
                    } else {
                        echo "Productos";
                    } ?></a>
                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split visually-hidden" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php?sec=productos" class="dropdown-item text-decoration-none "><?= isset($_GET["sec"]) && $_GET["sec"] == "productos" ? "<b>Todos</b>" : "Todos" ?></a>
                        </li>
                        <li>
                            <a href="index.php?sec=filtros&categoria=3" class="dropdown-item text-decoration-none "><?php if (isset($_GET["sec"]) && isset($_GET["categoria"]) && $_GET["sec"] == "filtros" && $_GET["categoria"] == "3") {
                                echo "<b>Terror</b>";
                            } else {
                                echo "Terror";
                            } ?></a>
                        </li>
                        <li>
                            <a href="index.php?sec=filtros&categoria=2" class="dropdown-item text-decoration-none "><?php if (isset($_GET["sec"]) && isset($_GET["categoria"]) && $_GET["sec"] == "filtros" && $_GET["categoria"] == "2") {
                                echo "<b>Comedia</b>";
                            } else {
                                echo "Comedia";
                            } ?></a>
                        </li>
                        <li>
                            <a href="index.php?sec=filtros&categoria=1" class="dropdown-item text-decoration-none "><?php if (isset($_GET["sec"]) && isset($_GET["categoria"]) && $_GET["sec"] == "filtros" && $_GET["categoria"] == "1") {
                                echo "<b>Suspenso</b>";
                            } else {
                                echo "Suspenso";
                            } ?></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-light" href="index.php?sec=quienes_somos"><?= isset($_GET["sec"]) && $_GET["sec"] == "quienes_somos" ? "<b>¿Quienes Somos?</b>" : "¿Quienes Somos?" ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?sec=envios"><?= isset($_GET["sec"]) && $_GET["sec"] == "envios" ? "<b>Envios</b>" : "Envios" ?></a>
                </li>
                <?php if(isset($_SESSION["login"])){ ?>       
                    <a class="nav-link text-light" href="index.php?sec=carrito">
                    <?= (isset($_GET["sec"]) && (isset($_GET["sec"]) && $_GET["sec"] == "carrito")) ? "<b>Carrito</b>" : "Carrito" ?>
                </a>    
                <?php }?>
                
                <?php if( isset($_SESSION['login']) ){ ?>       
                    <li class="nav-item">
                        <a class="nav-link text-light d-flex align-items-center ms-lg-4" href="index.php?sec=perfil"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none"><path stroke="#ffffff" stroke-width="1.5" d="M21 12a8.958 8.958 0 0 1-1.526 5.016A8.991 8.991 0 0 1 12 21a8.991 8.991 0 0 1-7.474-3.984A9 9 0 1 1 21 12Z"/><path fill="#ffffff" d="M13.25 9c0 .69-.56 1.25-1.25 1.25v1.5A2.75 2.75 0 0 0 14.75 9zM12 10.25c-.69 0-1.25-.56-1.25-1.25h-1.5A2.75 2.75 0 0 0 12 11.75zM10.75 9c0-.69.56-1.25 1.25-1.25v-1.5A2.75 2.75 0 0 0 9.25 9zM12 7.75c.69 0 1.25.56 1.25 1.25h1.5A2.75 2.75 0 0 0 12 6.25zM5.166 17.856l-.719-.214l-.117.392l.267.31zm13.668 0l.57.489l.266-.31l-.117-.393zM9 15.75h6v-1.5H9zm0-1.5a4.752 4.752 0 0 0-4.553 3.392l1.438.428A3.252 3.252 0 0 1 9 15.75zm3 6a8.23 8.23 0 0 1-6.265-2.882l-1.138.977A9.73 9.73 0 0 0 12 21.75zm3-4.5c1.47 0 2.715.978 3.115 2.32l1.438-.428A4.752 4.752 0 0 0 15 14.25zm3.265 1.618A8.23 8.23 0 0 1 12 20.25v1.5a9.73 9.73 0 0 0 7.403-3.405z"/></g></svg> <?= $_SESSION["login"]["usuario"]?></a>
                    </li>    
                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="index.php?sec=login">Login</a>
                    </li>   
                <?php } ?> 
            </ul>
        </div>
    </div>
</nav>
