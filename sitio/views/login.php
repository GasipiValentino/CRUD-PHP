<?= (new Alerta())->get_alertas() ?>
<div class="form-wrapper">
        <main class="form-side">
            <form class="my-form" action="admin/acciones/auth_login.php" method="post">
                <div class="form-welcome-row">
                    <h1>Bienvenido de nuevo! &#128079;</h1>
                    <h2>Inicia sesión con tu cuenta!</h2>
                </div>
                <div class="socials-row">
                    <a href="#" title="Use Apple">
                        <img src="img/apple.png" alt="Apple">
                        Continuar con Apple
                    </a>
                </div>
                <div class="socials-row">
                    <a href="#" title="Use Github">
                        <img src="img/google.png" alt="Google">
                        Continuar con Google
                    </a>
                </div>
                <div class="divider">
                    <div class="divider-line"></div>
                    O
                    <div class="divider-line"></div>
                </div>
                <div class="text-field">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" autocomplete="off" placeholder="ejemplo10"
                        required>
                    <div class="error-message">Nombre de Usuario Incorrecto</div>
                </div>
                <div class="text-field">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="pass" placeholder="Contraseña" required>
                    <div class="error-message">Mínimo 4 caracteres al menos 1 Letra y 1 Número</div>
                    <!-- pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$" -->
                </div>
                <button class="my-form__button pointer" type="submit">
                    Iniciar Sesión
                </button>
                <div class="my-form__actions">
                    <div class="my-form__row">
                        <span>No tenés cuenta?</span>
                        <a href="index.php?sec=registro" title="Reset Password">
                            Registrate ahora
                        </a>
                    </div>
                </div>
            </form>
        </main>
        <aside class="info-side">
            <div class="blockquote-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#333333" d="m11.293 17.293l1.414 1.414L19.414 12l-6.707-6.707l-1.414 1.414L15.586 11H6v2h9.586z"/></svg>
                <blockquote>
                    En FilmLens ya compre varias películas y no tengo nada para quejarme
                </blockquote>
                <div class="author">
                    <img src="img/avatar.png" alt="Avatar" class="avatar">
                    <span class="author-name">@kevin.velasco</span>
                </div>
            </div>
        </aside>
    </div>


