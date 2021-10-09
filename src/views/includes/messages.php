<?php if(!empty($errors)) { ?>
    <div class="row">
        <div class="col my-3">
            <div class="alert alert-danger">
                <?php foreach($errors as $erro) { ?>
                    <?php  echo $erro; ?><br>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } else unset($errors); ?>
