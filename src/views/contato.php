<?php

include 'F:\Programs\xampp\htdocs\projeto_agenda_php\routers.php';

//Page Header
include_once 'includes/header.php';
//Page Navbar
include_once 'includes/nav.php';

?>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>

        <div class="col-lg-8 my-3">
            <h1 class=" text-center">Contato</h1>
            <p class="text-center lead">Crie ou edite seu contato abaixo</p>

            <?php if(!empty($idContato)) { ?>
                <form action="#" method="POST" class="my-3">
                <?php foreach($idContato as $value) { ?>
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
                        <input type="email" class="form-control" name="email" value="">
                    </div>
                    <div class="form-group">
                        <label>Telefone:</label>
                        <input type="tel" class="form-control" name="telefone" value="">
                    </div>
                    <button type="submit" name="sendContato" class="btn btn-primary my-2">Salvar</button>
                </form>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>

<?php

//Page Footer
include_once 'includes/footer.php';

?>
