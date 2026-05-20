<?php 
class Arquivos{
    public $arquivo = "index.html";
    public $diretorio = "pasta/";

    public function criarArquivos(){
        $atributos = ["nome", "idade", "curso"];
        $gets = ""; $sets = ""; $atr = "";
        foreach ($atributos as $atributos){
            $atr .= "public $" . $atributos . ";\n\t";
            $gets .= "function get" . ucfirst($atributos) . "(){}\n\t";
            $sets .= "function set" . ucfirst($atributos) . "(){}\n\t";
        }
        $conteudo =  <<<CLASS
<?php
class Pessoa{
    $atr
    $gets
    $sets
}
?>
CLASS;
        file_put_contents($this->diretorio.$this->arquivo, $conteudo);
        echo "Arquivo criado com sucesso";
    }

    function criaDiretorio(){
        if(!is_dir($this->diretorio)){
            mkdir($this->diretorio, 0777, true);
        }
    }
    function lerArquivo(){
        $conteudo = file_get_contents($this->diretorio.$this->arquivo);
        echo "Conteúdo do arquivo" . $this->arquivo;
        echo "<hr>" . $conteudo;
        }
    }

$obj = new Arquivos();
$obj->criaDiretorio();
$obj->criarArquivos();
$obj->lerArquivo();

