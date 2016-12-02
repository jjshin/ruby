<div class="col-md-1"></div>
<div class="col-md-10">
    <br>
    <br>
    <h3><?= "Current Account Details"; ?></h3>
    <br>
    <br>
    <table class="vertical-table">
        <tr>
            <th><?= __('Customer ID:') ?></th>
            <td><?= h($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name:') ?></th>
            <td><?= h($user->fname) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name:') ?></th>
            <td><?= h($user->lname) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Number:') ?></th>
            <td><?= h($user->contactno) ?></td>
        </tr>
        <tr>
            <th><?= __('Email:') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Property Address:') ?></th>
            <td><?= h($user->address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Address:') ?></th>
            <td><?= h($user->address2) ?></td>
        </tr>
        <tr>
            <th><?= __('Suburb:') ?></th>
            <td><?= h($user->suburb) ?></td>
        </tr>
        <tr>
            <th><?= __('State:') ?></th>
            <td><?= h($user->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Country:') ?></th>
            <td><?= h($user->country->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Postcode:') ?></th>
            <td><?= h($user->pcode) ?></td>
        </tr>

        <tr>
            <th><?= __('Joined:') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Approved Restricted Products:') ?></th>

                <?php if (!empty($user->products)): ?>
                    <?php foreach ($user->products as $products): ?>
                        <td><?= h($products->name) ?></td>
                    <?php endforeach; ?>
                <?php endif; ?>

        </tr>
    </table>
</div>
<div class="col-md-1"></div>

