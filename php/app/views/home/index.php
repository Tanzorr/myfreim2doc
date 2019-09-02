
<?php  $this->start('head');?>
<h1 class="text-center red">Welcom to MVC Fraimvork!</h1>
<div class="container">
    <div class="row">
        <?= inputBlok('text', 'Favorite Color', 'favorite color', ' ',['class'=>'form-control'],['class'=>'form-group']); ?>
        <?= submitTag('save');?>
    </div>
</div>

<?php  $this->end();?>


