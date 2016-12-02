<div class="col-md-1"></div>
<div class="col-md-10">
<br>
<br>
<br>

    <h3><?= h($medicinal->name) ?></h3>
        <br>
        <br>
        <tr>
            <td><?php echo "$medicinal->desc" ?></td>
        </tr>
<br>
    <form action="mailto:medicinal@medicinal.melbourne?bcc=jemimatoby@gmail.com&amp;subject=Returns" method="post" enctype="text/plain" id="enquireform">
        <div class="col-md-6 contact-right">
            <input type="contacttext" placeholder="Name" name="name" required/>
            <input type="contacttext" placeholder="E-mail" name="mail" required/>
            <input type="contacttext" placeholder="Phone" name="phone" required/>
            <br>
            <textarea name="enquiry"
                	  form="enquireform"
                	  placeholder="Hello...">
            </textarea>
            <input type="submit" value="SEND"/>
        </div>
    </form>
<br>
<br>
<div class="col-md-1">
</div>
