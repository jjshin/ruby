<br>
<br>
    <h3><?= h($medicinal->name) ?></h3>
<br>
    <div class="col-md-6 contact-right">
        <form action="mailto:medicinal@medicinal.melbourne?bcc=jemimatoby@gmail.com&amp;subject=General%20Enquiry" method="post" enctype="text/plain" id="enquireform">

            <input type="contacttext" placeholder="Name" name="name" required/>
            <input type="contacttext" placeholder="E-mail" name="mail" required/>
            <input type="contacttext" placeholder="Phone" name="phone" required/>
            <br>
            <textarea name="enquiry"
            	        form="enquireform"
            			placeholder="Hello...">
            </textarea>
            <input type="submit" value="SEND"/>
        </form>
    </div>

	<div class="col-md-6 contact-right">
	    <?php echo "$medicinal->desc" ?>
	</div>
	<div class="clearfix"></div>
<br>
<br>
