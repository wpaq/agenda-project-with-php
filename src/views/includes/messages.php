<?php 

require_once '../models/LoginModel.php';

$login = new Login();
?>


<?php if(count($login->errors) > 0) { ?>
    <div class="row">
        <div class="col my-3">
            <div class="alert alert-danger">
                <?php foreach($login->errors as $erro) { ?>
                    <?php print_r($erro); echo 'aaa'; ?><br>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>


