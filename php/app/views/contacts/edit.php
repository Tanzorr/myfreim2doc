<?php $this->setSiteTitle('Edit Contact')?>
<?php $this->start('body');?>
    <div class="container">
        <h2 class="text-center">Edit <?=$this->contact->fname; ?></h2>
        <?php $this->partial('contacts','form');?>
    </div>
<?php $this->end()?>

