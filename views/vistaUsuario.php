<?php
function mostrarUsuario($usuarios)
{
?>

    <link rel="stylesheet" href="<?php echo get_urlBase("css/verdatos.css"); ?>">
    <h1 class="titulo">DATOS DE LOS USUARIOS</h1>
    <table class="table-datos">
        <tr>
            <th> id </th>
            <th> username </th>
            <th> password </th>
            <th> perfil </th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) {



        ?>
            <tr>
                <td> <?php echo $usuario["id"] ?> </td>
                <td> <?php echo $usuario["username"] ?> </td>
                <td> <?php echo $usuario["password"] ?> </td>
                <td> <?php echo $usuario["perfil"] ?> </td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}

?>