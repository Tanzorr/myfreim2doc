
<?php $this->setSiteTitle('Add a Contact'); ?>
<?php $this->start('body');?>

<div class="container">
    <div class="col-md-8  well">
        <h2 class="test-center">Ass a Contact</h2>
        <hr>
        <?php $this->partial('contacts','form');?>
    </div>
</div>


<?php $this->end(); ?>