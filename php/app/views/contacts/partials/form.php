<form action="<?=$this->postAction;?>" method="post" class="form">
    <div class="form-errord"><?php echo $this->displayErrors;  ?></div>
    <?= inputBlok('text', 'Firs Name','fname', $this->contact->fname);?>
    <?= inputBlok('text', 'Last Name','lname', $this->contact->lname);?>
    <?= inputBlok('text', 'Adress ','adres1', $this->contact->adres1);?>
    <?= inputBlok('text', 'Adress2','adres2', $this->contact->adres2);?>
    <?= inputBlok('text', 'City','city', $this->contact->city);?>
    <?= inputBlok('text', 'State','state', $this->contact->state);?>
    <?= inputBlok('text', 'Zip','zip', $this->contact->zip);?>
    <?= inputBlok('text', 'Email','email', $this->contact->email);?>
    <?= inputBlok('text', 'Cell Phone','cell_phone', $this->contact->fname);?>
    <?= inputBlok('text', 'Home Phone','home_phone', $this->contact->home_phone);?>
    <?= inputBlok('text', 'Work Phone','work_phone', $this->contact->word_phone);?>
    <div class="row">
        <a href="/<?=PROOT?>/contacts" class="btn btn-primary"> contacts</a>
        <?= inputBlok('submit', '','submit','submit');?>
    </div>
</form>