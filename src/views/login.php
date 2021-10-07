<?php

//Connection DB
require_once '../models/ConnectionModel.php';


//Page Header
include_once 'includes/header.php';
//Page Navbar
include_once 'includes/nav.php';
include '../controllers/loginController.php';

//include '../models/LoginModel.php';
//include '../controllers/loginController.php';

?>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>

        <div class="col-lg-8 my-3">
            <h1 class=" text-center">Criar conta ou entrar</h1>
            <p class="text-center lead">Faça login ou crie sua conta abaixo</p>

            <?php include 'includes/messages.php'; ?>

            <div class="row">
                <!--Cadastro-->
                <div class="col-lg my-3">
                    <h4>Cadastrar</h4>
                    <p>Se ainda não tiver uma conta, crie abaixo:</p>
                    <form action="#" method="POST" class="my-3 form-cadastro">
                        <input type="hidden" name="_csrf" value=<%= csrfToken %>
                        <div class="form-group">
                          <label>Endereço de Email</label>
                          <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Insira o email" name="email">
                        </div>
                        <div class="form-group">
                          <label>Senha</label>
                          <input type="password" class="form-control" placeholder="Insira a senha" name="senha">
                        </div>
                        <button type="submit" name="cadastro" class="btn btn-primary my-2">Criar conta</button>
                      </form>
                </div>
                
                <!--Login-->
                <div class="col-lg my-3">
                    <h4>Fazer login</h4>
                    <p>Se já tiver uma conta, faça login abaixo:</p>
                    <form action="#" method="POST" class="form-login">
                        <div class="form-group">
                          <label>Endereço de Email</label>
                          <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Insira o email" name="email">
                        </div>
                        <div class="form-group">
                          <label>Senha</label>
                          <input type="password" class="form-control" placeholder="Insira a senha" name="senha">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary my-2">Entrar na conta</button>
                      </form>
                </div>
            </div>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>

<?php

//Page Footer
include_once 'includes/footer.php';

?>
