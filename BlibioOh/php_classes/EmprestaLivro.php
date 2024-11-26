<?php 

include_once 'conectar.php';

class EmprestaLivro 
{
    private $idUsuario;
    private $codLivro;
    private $dataEmissao;
    private $dataDevolucao;
    private $conn;

    public function getDataDevolucao()
    {
        return $this->dataDevolucao;
    } 
    public function setDataDevolucao($dataDevolucao)
    {
        $this->dataDevolucao = $dataDevolucao;
    } 
    public function getDataEmissao()
    {
        return $this->dataEmissao;
    } 
    public function setDataEmissao($dataEmissao)
    {
        $this->dataEmissao = $dataEmissao;
    } 
    public function getCodLivro()
    {
        return $this->codLivro;
    } 
    public function setCodLivro($codLivro)
    {
        $this->codLivro = $codLivro;
    } 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    } 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    function salvar()
    {
        try
        {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into empresta_livro value(?, ?, ?, ?)");
            @$sql->bindParam(1, $this->getIdUsuario(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodLivro(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getDataEmissao(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getDataDevolucao(), PDO::PARAM_STR);
            if($sql->execute() == 1)
            {
                return "Registro inserido com sucesso!";
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
            $sql = $this->conn->prepare("select * from empresta_livro where Id_Usuario = ? and Cod_livro = ?");
            @$sql->bindParam(1, $this->getIdUsuario(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodLivro(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("update empresta_livro set Data_Emissao = ?, Data_Devolucao = ? where Id_Usuario = ? and Cod_livro = ?");
            @$sql->bindParam(1, $this->getDataEmissao(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getDataDevolucao(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getIdUsuario(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getCodLivro(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("select * from empresta_livro where Id_Usuario = ? and Cod_livro = ?");
            @$sql->bindParam(1, $this->getIdUsuario(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodLivro(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("delete from empresta_livro where Id_Usuario = ? and Cod_livro = ?");
            @$sql->bindParam(1, $this->getIdUsuario(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCodLivro(), PDO::PARAM_STR);
            if($sql->execute() == 1)
            {
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
            //code...
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from empresta_livro order by Id_Usuario");
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
            //code...
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from empresta_livro where Id_Usuario = ?");
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
}

?>