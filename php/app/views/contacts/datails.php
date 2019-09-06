<?php  $this->setSiteTitle($this->contact->displayName()); ?>
<?php $this->start('body');?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/contacts" class="btn btn-default btn-xs">Back</a>
            <h2 class="text-center"><?= $this->contact->displayName();?></h2>
            <div class="row">
                <div class="col-md-6">
                    <p><span class="text-bold">Email:</span><?= $this->contact->email;?></p>
                    <p><span class="text-bold">Cell phone:</span><?= $this->contact->cell_phone;?></p>
                    <p><span class="text-bold">Home Phone:</span><?= $this->contact->home_phone;?></p>
                    <p><span class="text-bold">Work phone:</span><?= $this->contact->word_phone;?></p>
                </div>
                <div class="col-md-6">
                    <?=$this->contact->displeyAddressLaabel() ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->end();?>

