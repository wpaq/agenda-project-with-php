  <?php //include_once 'src/controllers/deslogar.php'; ?>  
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/projeto_agenda_php/index.php">Agenda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="/projeto_agenda_php/src/views/cadastro_contatos.php">Cadastrar contatos</a>
            </li>

            <?php if(isset($_SESSION['email'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="?logout">Sair</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="/projeto_agenda_php/src/views/login.php">Entrar</a>
              </li>
            <?php } ?>
            
          </ul>
        </div>
      </div>
  </nav>
