<?php 
require_once $_SERVER["DOCUMENT_ROOT"]."/models/connect/conexion.php";
class modeloUsuario{

    private $conexion;

    public function __construct(){
        $this->conexion = conexion::obtenerConexion() ;
    } 


    //metodo select
    public function obtenerUsuarios(){
        $query = $this->conexion->query("select id, username, password, perfil from usuarios");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    //metodo insert
    public function insertarUsuario($username, $password, $perfil){
        try {
            $query = $this->conexion->prepare('INSERT INTO usuarios (username, password, perfil) VALUES (?, ?, ?)');
            $query->execute([$username, $password, $perfil]);
            return true;
        } catch (PDOException $e) {
            throw new Exception('Error al registrar usuario: ' . $e->getMessage());
        }
    }

    //metodo update
    public function actualizarUsuario($username, $password, $perfil) {
        if (!$this->perfilExiste($perfil)) {
            throw new Exception("El perfil especificado no existe.");
        }
        try {
            $query = $this->conexion->prepare('UPDATE usuarios SET password = ?, perfil = ? WHERE username = ?');
            $query->execute([$password, $perfil, $username]);
            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception('Error al actualizar usuario: ' . $e->getMessage());
        }
    }
    
    // Método para verificar si un perfil existe
    public function perfilExiste($nombrePerfil) {
        try {
            $query = $this->conexion->prepare('SELECT COUNT(*) FROM perfiles WHERE nombre = ?');
            $query->execute([$nombrePerfil]);
            return $query->fetchColumn() > 0;
        } catch (PDOException $e) {
            throw new Exception('Error al verificar perfil: ' . $e->getMessage());
        }
    }
    

    //metodo delete
    public function eliminarUsuario($username){
        try {
            $query = $this->conexion->prepare('DELETE FROM usuarios WHERE username = ?');
            $query->execute([$username]);
            return $query->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception('Error al eliminar usuario: ' . $e->getMessage());
        }
    }

    //metodo para verificar si el usuario existe
    public function usuarioExiste($username) {
        try {
            $query = $this->conexion->prepare('SELECT COUNT(*) FROM usuarios WHERE username = ?');
            $query->execute([$username]);
            return $query->fetchColumn() > 0;
        } catch (PDOException $e) {
            throw new Exception('Error al verificar usuario: ' . $e->getMessage());
        }
    }

    public function obtenerPerfiles() {
        try {
            $query = $this->conexion->query("SELECT nombre FROM perfiles");
            return $query->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            throw new Exception('Error al obtener perfiles: ' . $e->getMessage());
        }
    }

    public function insertarPerfil($nombrePerfil) {
        try {
            $query = $this->conexion->prepare("INSERT INTO perfiles (nombre) VALUES (?)");
            $query->execute([$nombrePerfil]);
            return true;
        } catch (PDOException $e) {
            throw new Exception('Error al agregar perfil: ' . $e->getMessage());
        }
    }

    public function validarUsuario($username, $password) {
            $query = $this->conexion->prepare('SELECT COUNT(*) FROM usuarios WHERE username = ? AND password = ?');
            $query->execute([$username, $password]);
            return $query->fetchColumn() > 0;
    }
    
    
    
}
?>