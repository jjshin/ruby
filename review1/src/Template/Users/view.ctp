<div class="col-md-5">
    <h3><?= h($user->fname)." ".h($user->lname) ?></h3>
    <br>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($user->fname) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($user->lname) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Number') ?></th>
            <td><?= h($user->contactno) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Property Address') ?></th>
            <td><?= h($user->address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Address') ?></th>
            <td><?= h($user->address2) ?></td>
        </tr>
        <tr>
            <th><?= __('Suburb') ?></th>
            <td><?= h($user->suburb) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($user->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($user->country->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Postcode') ?></th>
            <td><?= h($user->pcode) ?></td>
        </tr>

        <tr>
            <th><?= __('Joined') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
    </table>
</div>

<div class="col-md-2">
</div>

<div class="col-md-5">
    <br>
    <br>
    <br>

        <h4>Approved Restricted Products</h4><br>
        <?php if (!empty($user->products)): ?>
            <?php foreach ($user->products as $products): ?>
                <td><?= h($products->name) ?><br></td>
            <?php endforeach; ?>
        <?php endif; ?>

        <br>
        <br>

        <h4>Client notes</h4>
        <br>
        <td><?= "$user->notes" ?></td>

</div>
