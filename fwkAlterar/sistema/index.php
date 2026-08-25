<style>
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;    

    .brand-dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }
    
    #conteudo {
        flex: 1;
    }
        
    #conteudo iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
</style>
<html>
    <head>
        <title>Cadastro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <base target="principal">
    </head>
    <body>
        <div class="dropdown brand-dropdown">
            <a class="navbar-brand dropdown-toggle" href="#" role="button" id="dropdownBrand" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastro
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownBrand">
                <li><a class="dropdown-item" href="view/form_aluno.php">aluno</a></li><li><a class="dropdown-item" href="view/form_curso.php">curso</a></li><li><a class="dropdown-item" href="view/form_professor.php">professor</a></li>
            </ul>
        </div>
        
        <div class="dropdown brand-dropdown">
            <a class="navbar-brand dropdown-toggle" href="#" role="button" id="dropdownBrand" data-bs-toggle="dropdown" aria-expanded="false">
            Relatório
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownBrand">
                <li><a class="dropdown-item" href="view/lista_aluno.php">aluno</a></li><li><a class="dropdown-item" href="view/lista_curso.php">curso</a></li><li><a class="dropdown-item" href="view/lista_professor.php">professor</a></li>
            </ul>
        </div>
        
        <div id="conteudo">
            <iframe name="principal"></iframe>
        </div>
    </body>
</html>