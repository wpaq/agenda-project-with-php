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
                <h1 class=" text-center">Agenda</h1>
                <p class="text-center lead">Seus contatos estão abaixo</p>

                <div class="responsive-table">
                    <table class="table my-3">
                        <tr>
                            <td id="contato_nome"></td>
                            <td id="contato_email"></td>
                            <td><a href="/contato/index/<%= contato._id %>">Editar</a></td>
                            <td><a class="text-danger" href="/contato/delete/<%= contato._id %>">Excluir</a></td>
                        </tr>
                    </table>
                </div>
                    <p class="text-center lead">Não existem contatos na sua agenda.</p>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>

<?php

//Page Footer
include_once 'src/views/includes/footer.php';

?>
