<?php
require_once(__DIR__ . "/../model/curso.php");
require_once(__DIR__ . "/../model/Conexao.php");
class CursoDAO
{
    private PDO $conexao;
    public function __construct()
    {
        $this->conexao = Conexao::conectar();
    }
    public function inserir(Curso $obj): bool
    {
        try {
            $sql = "insert into curso (nome,carga_horaria,descricao,id_professor) values(?,?,?,?)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $obj->getNome());
            $stmt->bindValue(2, $obj->getCarga_horaria());
            $stmt->bindValue(3, $obj->getDescricao());
            $stmt->bindValue(4, $obj->getId_professor());

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function alterar(Curso $objeto): bool
    {
        //
    }
    public function excluir(int $id)
    {
        $sql = "DELETE FROM curso WHERE id_curso = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header("location : ../view/lista_curso.php");
        exit();
    }
    public function buscarPorId(int $id): ?Curso
    {
        $sql = "select * from curso where id_curso = id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject("Curso");
    }
    public function listar(): array
    {
        $sql = "select * from curso";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    private function montarObjeto(array $dados): Curso
    {
        // Implementar
    }
}
