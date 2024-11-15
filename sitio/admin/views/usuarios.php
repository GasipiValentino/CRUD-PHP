<?php
$usuarios = (new Usuario())->getAllUsuarios();
// $roles = ['usuario', 'admin', 'superadmin'];
$roles = (new Usuario())->getAllRoles();
?>

    <h1 class="text-center m-4">Listado de Usuarios</h1>

    <div class="contenido">
    <article class="table-widget mt-5 mb-5">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
            <th>Usuario</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody id="team-member-rows">
        <?php foreach ($usuarios as $usuario) { ?>
            <tr>
                <td>
                    <div class="status">
                        <div class="status__circle status--active"></div>
                        <?= $usuario->getId() ?>
                    </div>
                </td>
                <td><?= $usuario->getUsuario() ?></td>
                <td>
                    <form method="post" action="acciones/actualizar_rol_acc.php">
                        <input type="hidden" name="usuario_id" value="<?= $usuario->getId() ?>">
                        <select class="form-select" name="rol" id="rol">
                            <option value="<?= $usuario->getRoles() ?>" selected disabled><?= $usuario->getRoles() ?></option>
                            <?php foreach ($roles as $rol) {
                                if ($rol != $usuario->getRoles()) { ?>
                                    <option value="<?= $rol ?>"><?= $rol ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                                <button type="submit" class="text-light fs-7 text-end">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
</table>


    </article>
    </div>