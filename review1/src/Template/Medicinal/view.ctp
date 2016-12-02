<div class="col-md-1"></div>
<div class="col-md-10">
    <h3><?= h($medicinal->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($medicinal->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Content') ?></th>
            <td><?= "$medicinal->desc" ?></td>
        </tr>
    </table>
</div>
<div class="col-md-1"></div>
