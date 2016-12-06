<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer Details'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <!-- <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li> -->
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->firstname),' ',($user->lastname) ?></h3>
    <table class="vertical-table">
        <!-- <tr>
            <th scope="row"><?= __('First Name: ') ?></th>
            <td><?= h($user->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name: ') ?></th>
            <td><?= h($user->lastname) ?></td> -->
        <!-- <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <!-- <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr> -->
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= $user->phone ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= $user->gender ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('D.O.B') ?></th>
            <td><?= $user->dob ?></td>
        </tr>
        <!-- <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $this->Number->format($user->role) ?></td>
        </tr> -->

        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $user->address1.' '.$user->address2.', '.$user->suburb.' '.$user->state.' '.$user->postcode.' '.$user->country; ?></td>
        </tr>

    </table>
</div>
