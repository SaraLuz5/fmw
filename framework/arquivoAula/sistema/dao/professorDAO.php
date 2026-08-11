<?php
require_once(__DIR__."/../model/professor.php");
require_once(__DIR__."/../model/Conexao.php");
class ProfessorDAO
{
    private PDO $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }
    public function inserir(Professor $obj): bool
    {
      try{
        $sql = "insert into professor (nome,email,especialidade,data_admissao) values(?,?,?,?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$obj->getNome());
		$stmt->bindValue(2,$obj->getEmail());
		$stmt->bindValue(3,$obj->getEspecialidade());
		$stmt->bindValue(4,$obj->getData_admissao());
		
        $stmt->execute();
        return true;
        }catch (PDOException $e){
           echo $e->getMessage();
           return false;
        }
        
    }
    public function alterar(Professor $objeto): bool
    {
        $objeto=$this->buscarPorId($id);
    }
    public function excluir(int $id)
    {
        $sql = "DELETE FROM professor WHERE id_professor = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute():
        header("location : ../view/lista_professor.php);
        exit();
    }
    public function buscarPorId(int $id): ?Professor
    {
        $sql = "select * from professor where id_professor = id";
        $stmt = $this->conexao->prepare ($sql);
            $stmt->bindValue(':id' , $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchObject("Professor");
    }
    public function listar(): array
    {
        $sql="select * from professor";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    private function montarObjeto(array $dados): Professor
    {
        // Implementar
    }
}
?>