<?php

//Connection DB
require_once __DIR__.'/src/models/ConnectionModel.php';
$db = new DBConnection();
$conn = $db->startConnection();

require_once '/projeto_agenda_php/src/controllers/cadastro_contatos.php';

//Page Header
include_once '/projeto_agenda_php/src/views/includes/header.php';
//Page Navbar
include_once '/projeto_agenda_php/src/views/includes/nav.php';

?>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>

        <div class="col-lg-8 my-3">
            <h1 class=" text-center">Contato</h1>
            <p class="text-center lead">Crie ou edite seu contato abaixo</p>

            <form action="./src/controllers/cadastro_contatos.php" method="POST" class="my-3">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $_SESSION['email']; ?>">
                </div>
                <div class="form-group">
                    <label>Sobrenome:</label>
                    <input type="text" class="form-control"  name="sobrenome" value="">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" value="">
                </div>
                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="tel" class="form-control" name="telefone" value="">
                </div>
                <button type="submit" name="sendContato" class="btn btn-primary my-2">Salvar</button>
            </form>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>

<?php

//Page Footer
include_once '/projeto_agenda_php/src/views/includes/footer.php';

?>
