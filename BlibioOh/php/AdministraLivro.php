<?php

include_once 'conectar.php';

class AdministraLivro 
{
    private $idFuncionario;
    private $codLivro;
    private $conn;

    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }
    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;
    }
    public function getCodLivro()
    {
        return $this->codLivro;
    }
    public function setCodLivro($codLivro)
    {
        $this->codLivro = $codLivro;
    }

    function salvar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into administra_livro value (?,?)");
            @$sql->bindParam(1, $this->getIdFuncionario(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodLivro(), PDO::PARAM_STR);
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

    function consultar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from administra_livro where Cod_Livro like ?");
            @$sql->bindParam(1, $this->getCodLivro(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("delete from administra_livro where Id_Funcionario = ? and Cod_Livro = ?");
            @$sql->bindParam(1, $this->getIdFuncionario(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodLivro(), PDO::PARAM_STR);
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
            echo "Erro ao exluir." . $exc->getMessage();
        }
    }

    function listar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from administra_livro");
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