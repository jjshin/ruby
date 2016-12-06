
<?php
$this->set('title', 'Bulk-load');
?>
<div class="container">
    <?php if (isset($conflict_list)){ ?>
        <table>
            <tr>
                <th>Conflict name in the csv file</th>
            </tr>
            <?php foreach ($conflict_list as $name): ?>
                <tr>
                    <td><?= $name ?></td></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php } else {
        echo '<p> Processing ... </p>';
    }
    ?>
</div>
