<?php

include_once 'conectar.php';

class Setor {
    private $codSetor;
    private $andar;
    private $genero;
    private $conn;

    public function getCodSetor()
    {
        return $this->codSetor;
    }
    public function setCodSetor($codSetor)
    {
        $this->codSetor = $codSetor;
    }
    public function getAndar()
    {
        return $this->andar;
    }
    public function setAndar($andar)
    {
        $this->andar = $andar;
    } 
    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    function salvar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into setor value(null,?,?)");
            @$sql->bindParam(1, $this->getAndar(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getGenero(), PDO::PARAM_STR);
            if ($sql->execute() == 1) 
            {
                return "Registro Salvo com sucesso!";
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
        try 
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from setor where Cod_Setor = ?");
            @$sql->bindParam(1, $this->getCodSetor(), PDO::PARAM_STR);
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
        try 
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("update setor set Andar = ?, Genero = ? where Cod_Setor = ?");
            @$sql->bindParam(1, $this->getAndar(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getGenero(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getCodSetor(), PDO::PARAM_STR);
            if ($sql->execute() == 1) 
            {
                return "Alterado com sucesso!";
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
        try 
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from setor where Genero like ?");
            @$sql->bindParam(1, $this->getGenero(), PDO::PARAM_STR);
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
        try 
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from setor where Cod_Setor = ?");
            @$sql->bindParam(1, $this->getCodSetor(), PDO::PARAM_STR);
            if ($sql->execute() == 1) 
            {
                return "Excluido com sucesso!";
            }
            else
            {
                return "Erro na exclusão!";
            }
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao excluir." . $exc->getMessage();
        }
    }

    function listar()
    {
        try 
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from setor order by Cod_Setor");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao listar." . $exc->getMessage();
        }
    }
}

?>