<?php include_once './src/controllers/errors.php'; ?>


<?php if($arr.count() > 0) { ?>
    <div class="row">
        <div class="col my-3">
            <div class="alert alert-danger">
                <?php $arr.forEach($erro => { ?>
                    <?php = $erro ?><br>
                <?php }); ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(success.length > 0) { ?>
    <div class="row">
        <div class="col my-3">
            <div class="alert alert-success">
                <?php success.forEach(success => { ?>
                    <?php= success ?><br>
                <?php }); ?>
            </div>
        </div>
    </div>
<?php } ?>
