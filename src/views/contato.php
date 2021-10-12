<?php

include 'F:\Programs\xampp\htdocs\projeto_agenda_php\routers.php';

//Page Header
include_once 'includes/header.php';
//Page Navbar
include_once 'includes/nav.php';

//Verifica se o usuário está logado
if(!isset($_SESSION['email'])) {
    $errors = contatoIndex();
    //Verifica se não existem erros
    if(!empty($errors)) {
        header('Location: \projeto_agenda_php\index.php');
        return $errors;
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>

        <div class="col-lg-8 my-3">
            <?php include 'F:\Programs\xampp\htdocs\projeto_agenda_php\src\views\includes\messages.php'; ?>

            <h1 class=" text-center">Contato</h1>
            <p class="text-center lead">Crie ou edite seu contato abaixo</p>

            <?php if(!empty($idContatos)) { ?>
                <form action="#" method="POST" class="my-3">
                <?php foreach($idContatos as $value) { ?>
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $value['nome'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Sobrenome:</label>
                        <input type="text" class="form-control"  name="sobrenome" value="<?php echo $value['sobrenome'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $value['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="tel" class="form-control" name="telefone" maxlength="10" value="<?php echo $value['telefone'] ?>">
                    </div>
                    <button type="submit" name="updateContato" class="btn btn-primary my-2">Salvar</button>
                </form>
                <?php } ?>
            <?php } else { ?>
                <!-- Cadastro -->
                <form action="#" method="POST" class="my-3">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" name="nome" value="">
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
                        <input type="tel" class="form-control" name="telefone" value="" maxlength="10">
                    </div>
                    <button type="submit" name="sendContato" class="btn btn-primary my-2">Salvar</button>
                </form>
            <?php } ?>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>

<?php

//Page Footer
include_once 'includes/footer.php';

?>
