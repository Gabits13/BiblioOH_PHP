<?php
include_once 'conectar.php';

class Usuario{
    private $idUsuario;
    private $nome;
    private $endereco;
    private $rg;
    private $cpf;
    private $telefone;
    private $email;
    private $senha;
    private $conn;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function getRg()
    {
        return $this->rg;
    }
    public function setRg($rg)
    {
        $this->rg = $rg;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    function salvar()
    {
        try
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into usuario value(null,?,?,?,?,?,?,?)");
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getEndereco(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getRg(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getCpf(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getTelefone(), PDO::PARAM_STR);
            @$sql->bindParam(6, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(7, $this->getSenha(), PDO::PARAM_STR);
            if($sql->execute() == 1)
            {
                return "Registro salvo com sucesso!";
            }
            $this->conn = null;
        }
        catch(PDOException $exc)
        {
            echo "Erro ao salvar o registro. " . $exc->getMessage();
        }
    }

    function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from usuario where Id_Usuario = ?");
            @$sql->bindParam(1, $this->getIdUsuario(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao alterar." . $exc->getMessage();
        }
    }

    function alterar2()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("update usuario set Nome = ?, Endereco = ?, RG = ?, CPF = ?, Telefone = ?, Email = ?, Senha = ? where Id_Usuario = ?");
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getEndereco(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getRg(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getCpf(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getTelefone(), PDO::PARAM_STR);
            @$sql->bindParam(6, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(7, $this->getSenha(), PDO::PARAM_STR);
            @$sql->bindParam(8, $this->getIdUsuario(), PDO::PARAM_STR);
            if($sql->execute() == 1)
            {
                return "Registro alterado com sucesso!";
            }
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao salvar o registro." . $exc->getMessage();
        }
    }

    function consultar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from usuario where Nome like ?");
            @$sql->bindParam(1, $this->getNome(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao executar consulta." . $exc->getMessage();
        }
    }

    function excluir()
    {
        try
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from usuario where Id_Usuario = ?");
            @$sql->bindParam(1, $this->getIdUsuario(), PDO::PARAM_STR);
            if($sql->execute() == 1)
            {
                return "Registro excluido com sucesso!";
            }
            else
            {
                return "Erro na exclusão!";
            }
            $this->conn = null;
        }
        catch(PDOException $exc)
        {
            echo "Erro ao excluir o registro. " . $exc->getMessage();
        }
    }

    function listar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from usuario order by Id_Usuario");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao executar consulta." . $exc->getMessage();
        }
    }

    function listarEmail() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from usuario where Email like ? and Senha like ?");
            @$sql->bindParam(1, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenha(), PDO::PARAM_STR); 
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao executar consulta." . $exc->getMessage();
        }
    }

    function listarEmprestimo() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from usuario where Id_Usuario = ?");
            @$sql->bindParam(1, $this->getIdUsuario(), PDO::PARAM_STR); 
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao executar consulta." . $exc->getMessage();
        }
    }

    function logar() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
            @$sql->bindParam(1, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenha(), PDO::PARAM_STR); 
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
}

?>