<?php

include_once 'conectar.php';

class ContaAdm 
{
    private $idFuncionario;
    private $senha;
    private $conn;

    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }
    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;
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
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into conta_administrador value (?,?)");
            @$sql->bindParam(1, $this->getIdFuncionario(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenha(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
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
            $sq = $this->conn->prepare("select * from conta_administrador where Id_Funcionario = ? and Senha = ?");
            @$sq->bindParam(1, $this->getIdFuncionario(), PDO::PARAM_STR);
            @$sq->bindParam(2, $this->getSenha(), PDO::PARAM_STR);
            $sq->execute();
            return $sq->fetchAll();
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
            $sql = $this->conn->prepare("update conta_administrador set Senha = ? where Id_Funcionario = ?");
            @$sql->bindParam(1, $this->getSenha(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getIdFuncionario(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
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
            $sql = $this->conn->prepare("select * from conta_administrador where Id_Funcionario like ?");
            @$sql->bindParam(1, $this->getIdFuncionario(), PDO::PARAM_STR);
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
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from conta_administrador where Id_Funcionario = ?");
            @$sql->bindParam(1, $this->getIdFuncionario(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Registro excluido com sucesso!";
            }
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao exluir." . $exc->getMessage();
        }
    }

    function listar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from conta_administrador order by Id_Funcionario");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao executar consulta." . $exc->getMessage();
        }
    }
}

?>