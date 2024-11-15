        <div class="background">
            <nav class="menu__wrapper container">
                <div class="menu__bar">
                    <a
                        href="index.php?seccion=principal"
                        title="Logo"
                        class="logo"
                    >
                        <img src="../img/logo.webp" alt="">
                    </a>
                    <ul class="navigation hide">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../index.php?sec=home">Home</a>  
                        </li>

                        <li class="nav-item">
                        <a class="nav-link text-light btn btn-secondary" href="index.php?seccion=principal"><?php if (!isset($_GET["seccion"]) || $_GET["seccion"] == "principal") {
                                echo "<b>Principal</b>";
                            } else {
                                echo "Principal";
                            } ?></a>
                        </li>

                        <li>
                            <button>
                                Productos
                                <svg opacity="0.5" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-chevron-down HeaderMenu-icon ml-1">
                                    <path d="M12.78 5.22a.749.749 0 0 1 0 1.06l-4.25 4.25a.749.749 0 0 1-1.06 0L3.22 6.28a.749.749 0 1 1 1.06-1.06L8 8.939l3.72-3.719a.749.749 0 0 1 1.06 0Z"></path>
                                </svg>
                            </button>
                            <div class="dropdown">
                                <ul class="list-items-with-description">
                                    <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24"><path fill="#ffd45e" d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2m.001 6c-.001 0-.001 0 0 0h-.466l-2.667-4H20zM9.535 9L6.868 5h2.597l2.667 4zm5 0l-2.667-4h2.597l2.667 4zM4 5h.465l2.667 4H4zm0 14v-8h16l.002 8z"/></svg>
                                    <div class="item-title">

                                        <a class="" href="index.php?seccion=admin_pelicula"><?php if (isset($_GET["seccion"]) && $_GET["seccion"] == "admin_pelicula") {
                                            echo "<b>Películas</b>";
                                        } else {
                                        echo "Películas";
                                        } ?></a>
                                        <p>Editar Películas</p>

                                        </div>
                                    </li>
                                   
                                    <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 48 48"><g fill="none" stroke="#ffd45e" stroke-width="4"><path stroke-linejoin="round" d="M24 44c11.046 0 20-8.954 20-20S35.046 4 24 4S4 12.954 4 24s8.954 20 20 20Z"/><path stroke-linejoin="round" d="M24 18a3 3 0 1 0 0-6a3 3 0 0 0 0 6Zm0 18a3 3 0 1 0 0-6a3 3 0 0 0 0 6Zm-9-9a3 3 0 1 0 0-6a3 3 0 0 0 0 6Zm18 0a3 3 0 1 0 0-6a3 3 0 0 0 0 6Z"/><path stroke-linecap="round" d="M24 44h20"/></g></svg>
                                    <div class="item-title">
                                        <a class="" href="index.php?seccion=admin_director"><?php if (isset($_GET["seccion"]) && $_GET["seccion"] == "admin_director") {
                                            echo "<b>Directores</b>";
                                        } else {
                                            echo "Directores";
                                        } ?></a>

                                        <p>Editar Directores</p>
                                        </div>
                                    </li>
                                    <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24"><path fill="#ffd45e" d="M7.425 9.475L11.15 3.4q.15-.25.375-.363T12 2.925t.475.113t.375.362l3.725 6.075q.15.25.15.525t-.125.5t-.35.363t-.525.137h-7.45q-.3 0-.525-.137T7.4 10.5t-.125-.5t.15-.525M17.5 22q-1.875 0-3.187-1.312T13 17.5t1.313-3.187T17.5 13t3.188 1.313T22 17.5t-1.312 3.188T17.5 22M3 20.5v-6q0-.425.288-.712T4 13.5h6q.425 0 .713.288T11 14.5v6q0 .425-.288.713T10 21.5H4q-.425 0-.712-.288T3 20.5m14.5-.5q1.05 0 1.775-.725T20 17.5t-.725-1.775T17.5 15t-1.775.725T15 17.5t.725 1.775T17.5 20M5 19.5h4v-4H5zM10.05 9h3.9L12 5.85zm7.45 8.5"/></svg>
                                        <div class="item-title">
                                        <a class="" href="index.php?seccion=admin_categoria"><?php if (isset($_GET["seccion"]) && $_GET["seccion"] == "admin_categoria") {
                                            echo "<b>Categorías</b>";
                                        } else {
                                            echo "Categorías";
                                        } ?></a>
                                        <p>Editar Categorías</p>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link text-light btn btn-secondary" href="index.php?seccion=usuarios"><?php if (!isset($_GET["seccion"]) || $_GET["seccion"] == "usuarios") {
                                echo "<b>Usuarios</b>";
                            } else {
                                echo "Usuarios";
                            } ?></a>
                        </li>

                    </ul>
                </div>
                <div class="action-buttons">
                <?php if( isset($_SESSION["login"]) ){ ?>       
                        <li class="nav-item">
                            <a href="index.php?seccion=perfil" title="Sign up" class="primary "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="me-2 mb-1"><g fill="none"><path stroke="#ffffff" stroke-width="1.5" d="M21 12a8.958 8.958 0 0 1-1.526 5.016A8.991 8.991 0 0 1 12 21a8.991 8.991 0 0 1-7.474-3.984A9 9 0 1 1 21 12Z"/><path fill="#ffffff" d="M13.25 9c0 .69-.56 1.25-1.25 1.25v1.5A2.75 2.75 0 0 0 14.75 9zM12 10.25c-.69 0-1.25-.56-1.25-1.25h-1.5A2.75 2.75 0 0 0 12 11.75zM10.75 9c0-.69.56-1.25 1.25-1.25v-1.5A2.75 2.75 0 0 0 9.25 9zM12 7.75c.69 0 1.25.56 1.25 1.25h1.5A2.75 2.75 0 0 0 12 6.25zM5.166 17.856l-.719-.214l-.117.392l.267.31zm13.668 0l.57.489l.266-.31l-.117-.393zM9 15.75h6v-1.5H9zm0-1.5a4.752 4.752 0 0 0-4.553 3.392l1.438.428A3.252 3.252 0 0 1 9 15.75zm3 6a8.23 8.23 0 0 1-6.265-2.882l-1.138.977A9.73 9.73 0 0 0 12 21.75zm3-4.5c1.47 0 2.715.978 3.115 2.32l1.438-.428A4.752 4.752 0 0 0 15 14.25zm3.265 1.618A8.23 8.23 0 0 1 12 20.25v1.5a9.73 9.73 0 0 0 7.403-3.405z"/></g></svg><?= $_SESSION["login"]["usuario"]?></a>
                        </li>    
                        <?php }else{ ?>
                        <li class="nav-item">
                            <a title="Sign in" class="secondary hide" href="index.php?sec=login">><?php if (isset($_GET["seccion"]) && $_GET["seccion"] == "login") {
                                echo "<b>Login</b>";
                            } else {
                                echo "Login";
                            } ?></a>
                        </li>
                    <?php } ?> 
                </div>
                <button class="burger-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 6l16 0"></path>
                        <path d="M4 12l16 0"></path>
                        <path d="M4 18l16 0"></path>
                    </svg>
                </button>
            </nav>
        </div>
