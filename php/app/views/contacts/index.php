<?php $this->start('header');?>
<h2 class="text-center">My contacts</h2>
    <table class="table table-striped table-condensed table-bordered">
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
<<<<<<< HEAD
<<<<<<< HEAD
                    <td></td>
=======
                    <td>
                        <a href="/contacts/delete/<?=$contact->id ?>" class="btn btn-danger btn-xs">delete</a>
                    </td>
>>>>>>> parent of 18391db... refactor db
=======
                    <td></td>
>>>>>>> 21431d4a9b4a5c3da1ec156028a0859312d60c58
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
<?php $this->end();?>