<?php
include_once 'conectar.php';

class Livro
{
    private $codLivro;
    private $titulo;
    private $nomeAutor;
    private $dataLancamento;
    private $genero;
    private $qtdePaginas;
    private $exemplares;
    private $editora;
    private $isbn;
    private $codSetor;
    private $conn;

    public function getCodLivro()
    {
        return $this->codLivro;
    }
    public function setCodLivro($codLivro)
    {
        $this->codLivro = $codLivro;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getNomeAutor()
    {
        return $this->nomeAutor;
    }
    public function setNomeAutor($nomeAutor)
    {
        $this->nomeAutor = $nomeAutor;
    }
    public function getDataLancamento()
    {
        return $this->dataLancamento;
    }
    public function setDataLancamento($dataLancamento)
    {
        $this->dataLancamento = $dataLancamento;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
    public function getQtdePaginas()
    {
        return $this->qtdePaginas;
    }
    public function setQtdePaginas($qtdePaginas)
    {
        $this->qtdePaginas = $qtdePaginas;
    }
    public function getExemplares()
    {
        return $this->exemplares;
    }
    public function setExemplares($exemplares)
    {
        $this->exemplares = $exemplares;
    }
    public function getEditora()
    {
        return $this->editora;
    }
    public function setEditora($editora)
    {
        $this->editora = $editora;
    }
    public function getIsbn()
    {
        return $this->isbn;
    }
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }
    public function getCodSetor()
    {
        return $this->codSetor;
    }
    public function setCodSetor($codSetor)
    {
        $this->codSetor = $codSetor;
    }

    function salvar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into livro value (null,?,?,?,?,?,?,?,?,?)");
            @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getNomeAutor(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getGenero(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getQtdePaginas(), PDO::PARAM_STR);
            @$sql-> bindParam(6, $this->getExemplares(), PDO::PARAM_STR);
            @$sql-> bindParam(7, $this->getEditora(), PDO::PARAM_STR);
            @$sql-> bindParam(8, $this->getIsbn(), PDO::PARAM_STR);
            @$sql-> bindParam(9, $this->getCodSetor(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("select * from livro where Cod_livro = ?");
            @$sql-> bindParam(1, $this->getCodLivro(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("update livro set Titulo=?,Nome_Autor=?,Data_Lancamento=?,Genero=?,Qtde_Pagina=?,Exemplares=?,Editora=?,ISBN=?,Cod_Setor=? where Cod_livro = ?");
            @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getNomeAutor(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getGenero(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getQtdePaginas(), PDO::PARAM_STR);
            @$sql-> bindParam(6, $this->getExemplares(), PDO::PARAM_STR);
            @$sql-> bindParam(7, $this->getEditora(), PDO::PARAM_STR);
            @$sql-> bindParam(8, $this->getIsbn(), PDO::PARAM_STR);
            @$sql-> bindParam(9, $this->getCodSetor(), PDO::PARAM_STR);
            @$sql-> bindParam(10, $this->getCodLivro(), PDO::PARAM_STR);
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
            $sql = $this->conn->prepare("select * from livro where Titulo like ?");
            @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } 
        catch (PDOException $exc) 
        {
            echo "Erro ao executar consultar." . $exc->getMessage();
        }
    }

    function excluir() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("delete from livro where Cod_livro = ?");
            @$sql-> bindParam(1, $this->getCodLivro(), PDO::PARAM_STR);
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
            echo "Erro ao excluir o registro." . $exc->getMessage();
        }
    }

    function listar() 
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("select * from livro order by Titulo");
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
            $sql = $this->conn->prepare("select * from livro where Cod_Livro = ?");
            @$sql-> bindParam(1, $this->getCodLivro(), PDO::PARAM_STR);
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