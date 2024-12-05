<?php
include_once 'conectar.php';

class Admin {
    private $email;
    private $senha;
    private $conn;

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    function logar() {
        try {
            $this->conn = new Conectar(); 
            $sql = $this->conn->prepare("
                SELECT f.* 
                FROM funcionario f 
                INNER JOIN conta_administrador c ON f.Id_Funcionario = c.Id_Funcionario 
                WHERE f.Email = ? AND c.Senha = ?
            ");
           
            @$sql->bindParam(1, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenha(), PDO::PARAM_STR); 
            $sql->execute();

      
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta: " . $exc->getMessage();
            return false; 
        }
    }
}
?>
