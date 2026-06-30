<?php
require_once ("utils.php");
class ClassesDAO{
private $entidades;
private $caminho = "sistema/dao/";
    function __construct($e) {
        if (!is_dir($this->caminho)) {
              mkdir($this->caminho, 0777, true);
        }
        $this->entidades = $e;
        $this->criaClasse();
    }
    function criaClasse() {
            $util = new Utils();
            $listaEntidades = array_keys($this->entidades);
            foreach ($listaEntidades as $entidade) {
                $listaAtributos = $this->entidades[$entidade];
                $bindings="";
                $atributo="";
                $placeholders="";
                $i=1;
                foreach ($listaAtributos as $key => $atributo) {
                  if($atributo["primary"]){
                    $bindings .= "\$smtm->bindingValue($i , \$obj->get".ucfirst($key)."());\n\t\t";
                  }
               }
                $nomeClasse=ucfirst($entidade);
                $conteudo = <<<CLASS
                <?php
                require_once("../model/{$entidade}.php");
                class {$nomeClasse}DAO
                {
                    private PDO \$conexao;
                    public function __construct(PDO \$conexao)
                    {
                        \$this->conexao =\$conexao;
                    }
                    public function inserir($nomeClasse \$objeto): bool
                    {
                        // Implementar
                    }
                    public function alterar($nomeClasse \$objeto): bool
                    {
                        // Implementar
                    }
                    public function excluir(int \$id): bool
                    {
                        // Implementar
                    }
                    public function buscarPorId(int \$id): ?$nomeClasse
                    {
                        // Implementar
                    }
                    public function listar(): array
                    {
                        // Implementar
                    }
                    private function montarObjeto(array \$dados): $nomeClasse
                    {
                        // Implementar
                    }
                }
                ?>
                CLASS;
                file_put_contents("{$this->caminho}{$entidade}DAO.php", $conteudo);
        }
    }
}
?>