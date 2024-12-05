<?php

include_once 'conectar.php';

class Cargo 
{
    private $codCargo;
    private $descricao;
    private $NomeCargo;
    private $salario;
    private $conn;

    public function getCodCargo()
    {
        return $this->codCargo;
    }
    public function setCodCargo($codCargo)
    {
        $this->codCargo = $codCargo;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getNomeCargo()
    {
        return $this->NomeCargo;
    }
    public function setNomeCargo($NomeCargo)
    {
        $this->NomeCargo = $NomeCargo;
    } 
    public function getSalario()
    {
        return $this->salario;
    } 
    public function setSalario($salario)
    {
        $this->salario = $salario;
    }

    function salvar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into cargo values (null,?,?,?)");
            @$sql->bindParam(1, $this->getDescricao(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getNomeCargo(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getSalario(), PDO::PARAM_STR);
            if ($sql->execute() == 1) 
            {
                return "Registro salvo com sucesso!";
            }
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao salvar o registro." . $exc->getMessage();
        }
    }

    function alterar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from cargo where Cod_Cargo = ?");
            @$sql->bindParam(1, $this->getCodCargo(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("update cargo set Descricao=?,Nome_Cargo=?,Salario=? where Cod_Cargo=?");
            @$sql->bindParam(1, $this->getDescricao(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getNomeCargo(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getSalario(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getCodCargo(), PDO::PARAM_STR);
            if ($sql->execute() == 1) 
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
            $sql = $this->conn->prepare("select * from cargo where Nome_Cargo like ?");
            @$sql->bindParam(1, $this->getNomeCargo(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao consultar." . $exc->getMessage();
        }
    }

    function excluir() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from cargo where Cod_Cargo=?");
            @$sql->bindParam(1, $this->getCodCargo(), PDO::PARAM_STR);
            if ($sql->execute() == 1) 
            {
                return "Registro excluido com sucesso!";
            }
            else
            {
                return "Erro na esclusão !";
            }
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao excluir o registro." . $exc->getMessage();
        }
    }

    function listar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from cargo order by Cod_Cargo");
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