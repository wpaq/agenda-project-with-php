<?php

//Connection DB
require_once 'src/controllers/connection.php';

//Page Header
include_once 'src/views/includes/header.php';
//Page Navbar
include_once 'src/views/includes/nav.php';

?>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>

        <div class="col-lg-8 my-3">
            <h1 class=" text-center">Contato</h1>
            <p class="text-center lead">Crie ou edite seu contato abaixo</p>

            <form action="/contato/edit/<%= contato._id %>" method="POST" class="my-3">

            <form action="/contato/register" method="POST" class="my-3">
                <input type="hidden" name="_csrf" value=<%= csrfToken %>
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="nome" value="<%= contato.nome %>">
                </div>
                <div class="form-group">
                    <label>Sobrenome:</label>
                    <input type="text" class="form-control"  name="sobrenome" value="<%= contato.sobrenome %>">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" value="<%= contato.email %>">
                </div>
                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="tel" class="form-control" name="telefone" value="<%= contato.telefone %>">
                </div>
                <button type="submit" class="btn btn-primary my-2">Salvar</button>
            </form>
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>

<?php

//Page Footer
include_once 'src/views/includes/footer.php';

?>
