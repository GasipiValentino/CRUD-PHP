<?php


if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION["login"]["id"];
$miCarrito = new Carrito();
$usuario = new Usuario();
$historialCompras = $miCarrito->getHistorialCompras($id_usuario);   
?>


	<!-- <img src="img/Yoel.png" alt="Descripción de la imagen" class="img-fluid rounded-circle mb-4"> -->
	<!-- <img src="<?= $_SESSION["login"]["foto_perfil"] ?>" alt="<?= $_SESSION["login"]["usuario"]?>" class="img-fluid rounded-circle mb-4"> -->


<div class="contenedor_perfil">
	<div class="row">
		<div class="col-12 col-md-6 mt-md-5 mb-md-5">
			<div class="">
			<div class="perfil">
			        <header class="perfil__header">
			            <div class="perfil_resaltado">
			                <div class="profile_highlight">
			                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24"
			                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
			                        stroke-linecap="round" stroke-linejoin="round">
			                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
			                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
			                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
			                    </svg>
                                <?= $_SESSION["login"]["roles"]?>
			                </div>
            </div>
            <div class="perfil_avatar">
				<!-- cambiar foto de perfil -->
				<a href="../index.php?sec=edit_foto&id=<?= $usuario->getId() ?>" class="">
					<img src="../img/usuario.webp" loading="lazy" alt="Mentor profile">
				</a>

            </div>
        </header>
        <div class="perfil__nombre">
            <h2><?= $_SESSION["login"]["usuario"]?><img src="../img/iconos/verified.svg" alt="Verified Ticker"></h2>
        </div>
        <ul class="social-links">
            <li>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                        <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M16.5 7.5l0 .01" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                        <path d="M10 9l5 3l-5 3z" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-link" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 15l6 -6" />
                        <path d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                        <path d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                    </svg>
                </a>
            </li>
        </ul>
        <div class="main">
            <div id="tab1-content" class="tab-content tab-content--activo">
                <p>
                    Hola soy <?= $_SESSION["login"]["usuario"]?>, soy un entusiasta de las peliculas! mis favoritas son las dirigidas por Tim Burton y mi categoria favorita es la de accion. Elijo esta plataforma para comprar peliculas porque son muy confiables y no encontre una de mejor calidad en el mercado. 🎬 ✔
                </p>

                <ul class="content-links">
                    <li>
                        <a href="#career">Tim Burton</a>
                    </li>
                    <li><a href="#interview">Accion</a></li>
                    <li><a href="#web-development">Marvel</a></li>
                    <li><a href="#web-development">Dc Comics</a></li>
                </ul>
            </div>
		</div>
		<a href="index.php?seccion=logout" class="boton_perfil boton_perfil--primary">
			Cerrar sesión
		</a> 
    </div>
</div>


		</div>
		<div class="col-12 col-md-6 mt-md-5 mb-md-5">
		<div class="contenido">
                <article class="table-widget">
		            <div class="caption">
		            	<h2>
		            	Historial Compras
		            	</h2>	
		            </div>
					<?php if (!empty($historialCompras)) { ?>
		        <table>
			            <thead>
			            	<tr>
			            		<th scope="col">Portada</th>
                                <th scope="col">Nombre Película</th>
                                <th scope="col">cantidad</th>
                                <th scope="col">Total</th>
			            	</tr>
			            </thead>
			        <tbody id="team-member-rows">
			        <?php foreach ($historialCompras as $compra) { ?>
			        	    <tr>
							<td>
			        			<div class="img_portada">
			        				<img src="../img/<?= htmlspecialchars($compra["img"]) ?>" alt="<?= htmlspecialchars($compra["nombre"]); ?>" class="img-fluid rounded shadow-sm">
			        			</div>
			        		</td>
			        		<td><?= htmlspecialchars($compra["nombre"]); ?></td>
			        		<td>
			        			<div class="tags">
			        				<div class="tag tag--marketing">
			        				<?= htmlspecialchars($compra["cantidad"]); ?>
			        				</div>
			        			</div>
			        		</td>
			        		<td>
			        		<div class="tags">
			        		<div class="tag tag--design">
			        				$<?= htmlspecialchars($compra["total"]); ?>
			        				</div>
			        		</div>
			        		</td>
			        	</tr>
			        	<?php } ?>
			        </tbody>
		    </table>
                <?php } else { ?>   
                    <p>No has realizado ninguna compra.</p>
                <?php } ?>
	        </article>
                </div>
		</div>
	</div>
</div>



