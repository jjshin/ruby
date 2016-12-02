<div class="col-md-1"></div>
<div class="col-md-10">
    <center>
        <h1><?php echo "Hello ".$username."!" ?></h1>
    </center>
        <br>
        <br>
        <br>
        <br>
        <tr>
            <td>
            <?php
                foreach ($medicinal as $row) {
                    echo $row->desc;
                }
            ?>
            </td>
        </tr>
    <br>
    <br>
    <br>
</div>
<div class="col-md-1"></div>
