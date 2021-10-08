    
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="?indexHome">Agenda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="?contatoIndex">Cadastrar contatos</a>
            </li>

            <?php if(isset($_SESSION['email'])) { ?>
              <li class="nav-item">
                <a class="nav-link" href="?logout">Sair</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="?loginIndex">Entrar</a>
              </li>
            <?php } ?>
            
          </ul>
        </div>
      </div>
  </nav>
