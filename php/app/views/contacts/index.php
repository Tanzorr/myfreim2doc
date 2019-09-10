<?php $this->start('header');?>
<h2 class="text-center">My contacts</h2>
    <table class="table table-striped table-condensed table-bordered table-hover">
        <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Cell Phone</th>
        <th>Home Phone</th>
        <th>Work Phone</th>
        <th></th></thead>
        <tbody>
            <?php foreach ($this->contacts as $contact): ?>
                <tr>
                    <td>
                        <a href="/contacts/details/<?=$contact->id?>">
                            <?= $contact->displayName();?>
                        </a>
                    </td>
                    <td><?= $contact->email;?></td>
                    <td><?= $contact->cell_phone;?></td>
                    <td><?= $contact->home_phone;?></td>
                    <td><?= $contact->city;?></td>
                    <td>
                        <a href="/contacts/edit/<?=$contact->id;?>" class="btn btn-info btn-xs">eit</a>
                        <a href="/contacts/delete/<?=$contact->id ?>" class="btn btn-danger btn-xs" onclick="if (!confirm('Are you sure that item')){confirm('Are you sure that item')}"> delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
<?php $this->end();?>