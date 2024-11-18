<?php
include_once 'conectar.php';

class Funcionario {
    private $idFuncionario;
    private $nome;
    private $rg;
    private $cpf;
    private $dataNascimento;
    private $dataAdmissao;
    private $endereco;
    private $telefone;
    private $email;
    private $codPeriodo;
    private $codCargo;
    private $conn;
     
    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    } 
    public function setIdFuncionario($idFuncionario)
    {
        $this->idFuncionario = $idFuncionario;
    }
    public function getNome()
    {
        return $this->nome;
    } 
    public function setNome($nome)
    {
        $this->nome = $nome;
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
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }
    public function getDataAdmissao()
    {
        return $this->dataAdmissao;
    } 
    public function setDataAdmissao($dataAdmissao)
    {
        $this->dataAdmissao = $dataAdmissao;
    } 
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
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
    public function getCodPeriodo()
    {
        return $this->codPeriodo;
    }
    public function setCodPeriodo($codPeriodo)
    {
        $this->codPeriodo = $codPeriodo;
    } 
    public function getCodCargo()
    {
        return $this->codCargo;
    } 
    public function setCodCargo($codCargo)
    {
        $this->codCargo = $codCargo;
    }

    function salvar() 
    {
        try 
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("insert into funcionario value (null,?,?,?,?,?,?,?,?,?,?)");
            @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getRg(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getCpf(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getDataNascimento(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getDataAdmissao(), PDO::PARAM_STR);
            @$sql-> bindParam(6, $this->getEndereco(), PDO::PARAM_STR);
            @$sql-> bindParam(7, $this->getTelefone(), PDO::PARAM_STR);
            @$sql-> bindParam(8, $this->getEmail(), PDO::PARAM_STR);
            @$sql-> bindParam(9, $this->getCodPeriodo(), PDO::PARAM_STR);
            @$sql-> bindParam(10, $this->getCodCargo(), PDO::PARAM_STR);
            if($sql->execute() == 1)
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
        try 
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("select * from funcionario where Id_Funcionario = ?");
            @$sql-> bindParam(1, $this->getIdFuncionario(), PDO::PARAM_STR);
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
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("update funcionario set Nome = ?, RG = ?, CPF = ?, Data_Nasc = ?, Data_Admissao = ?, Endereco = ?, Telefone = ?, Email = ?, Cod_Periodo = ?, Cod_Cargo = ? where Id_Funcionario = ?");
            @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
            @$sql-> bindParam(2, $this->getRg(), PDO::PARAM_STR);
            @$sql-> bindParam(3, $this->getCpf(), PDO::PARAM_STR);
            @$sql-> bindParam(4, $this->getDataNascimento(), PDO::PARAM_STR);
            @$sql-> bindParam(5, $this->getDataAdmissao(), PDO::PARAM_STR);
            @$sql-> bindParam(6, $this->getEndereco(), PDO::PARAM_STR);
            @$sql-> bindParam(7, $this->getTelefone(), PDO::PARAM_STR);
            @$sql-> bindParam(8, $this->getEmail(), PDO::PARAM_STR);
            @$sql-> bindParam(9, $this->getCodPeriodo(), PDO::PARAM_STR);
            @$sql-> bindParam(10, $this->getCodCargo(), PDO::PARAM_STR);
            @$sql-> bindParam(11, $this->getIdFuncionario(), PDO::PARAM_STR);
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
        try 
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("select * from funcionario where Nome like ?");
            @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR);
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
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("delete from funcionario where Id_Funcionario = ?");
            @$sql-> bindParam(1, $this->getIdFuncionario(), PDO::PARAM_STR);
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
        catch (PDOException $exc) 
        {
            echo "Erro ao excluir." . $exc->getMessage();
        }
    }

    function listar() 
    {
        try {
            $this-> conn = new Conectar();
            $sql = $this->conn->prepare("select * from funcionario order by Nome");
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