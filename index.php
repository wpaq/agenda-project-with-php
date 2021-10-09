<?php

include './routers.php';

//Page Header
include_once 'src/views/includes/header.php';
//Page Navbar
include_once 'src/views/includes/nav.php';


if(isset($_SESSION['email'])) {
    $logado = $_SESSION['email'];
    echo "Bem vindo: $logado";
}

?>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>

            <div class="col-lg-8 my-3">
                <?php if(isset($_GET['contatoIndex'])) { include 'F:\Programs\xampp\htdocs\projeto_agenda_php\src\views\includes\messages.php'; } ?>

                <h1 class="text-center">Agenda</h1>
                <p class="text-center lead">Seus contatos estão abaixo</p>

                <?php if(!empty($contatos)) { ?>
                    <div class="responsive-table">
                        <table class="table my-3">
                            <?php foreach($contatos as $value) { ?>
                            <tr>
                                <td id="contato_nome"><?php echo $value['nome'] ?></td>
                                <td id="contato_sobrenome"><?php echo $value['sobrenome'] ?></td>
                                <td id="contato_telefone"><?php echo $value['telefone']; ?></td>
                                <td id="contato_email"><?php echo $value['email']; ?></td>                                
                                <td><a href="./cadastro_contatos.php">Editar</a></td>
                                <td><a class="text-danger" href="/contato/delete/<%= contato._id %>">Excluir</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                <?php } else { ?>
                    <p class="text-center lead">Não existem contatos na sua agenda.</p>
                <?php } ?>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>

<?php

//Page Footer
include_once 'src/views/includes/footer.php';

?>
