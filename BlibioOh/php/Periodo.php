<?php

include_once 'conectar.php';

class Periodo {
    private $codPeriodo;
    private $descricao;
    private $horaEntrada;
    private $horaSaida;
    private $conn;

    public function getHoraSaida()
    {
        return $this->horaSaida;
    }
    public function setHoraSaida($horaSaida)
    {
        $this->horaSaida = $horaSaida;
    }
    public function getHoraEntrada()
    {
        return $this->horaEntrada;
    }
    public function setHoraEntrada($horaEntrada)
    {
        $this->horaEntrada = $horaEntrada;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function getCodPeriodo()
    {
        return $this->codPeriodo;
    }
    public function setCodPeriodo($codPeriodo)
    {
        $this->codPeriodo = $codPeriodo;
    }

    function salvar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into periodo value (null,?,?,?)");
            @$sql->bindParam(1, $this->getDescricao(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getHoraEntrada(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getHoraSaida(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
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
            $sql = $this->conn->prepare("select * from periodo where Cod_Periodo = ?");
            @$sql->bindParam(1, $this->getCodPeriodo(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("update periodo set Descricao = ?, Hora_Entrada = ?, Hora_Saida = ? where Cod_Periodo = ?");
            @$sql->bindParam(1, $this->getDescricao(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getHoraEntrada(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getHoraSaida(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getCodPeriodo(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("select * from periodo where Descricao like ?");
            @$sql->bindParam(1, $this->getDescricao(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("delete from periodo where Cod_Periodo = ?");
            @$sql->bindParam(1, $this->getCodPeriodo(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Registro excluido com sucesso!";
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
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from periodo order by Cod_Periodo");
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