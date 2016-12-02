<br>
<br>
<h3><?= h($medicinal->name) ?></h3>
<br>
    <div class="col-md-6 contact-left">
	    <?php echo "$medicinal->desc" ?>
	    <br>
        <script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
            <div id="SkypeButton_Call_medicinal_1">
                 <script type="text/javascript">
                 Skype.ui({
                 "name": "call",
                 "element": "SkypeButton_Call_medicinal_1",
                 "participants": ["medicinal"],
                 "imageColor": "blue",
                 "imageSize": 32
                 });
                 </script>
            </div>
        </div>


    <form action="mailto:medicinal@medicinal.melbourne?bcc=jemimatoby@gmail.com&amp;subject=Product%20Enquiry" method="post" enctype="text/plain" id="enquireform">
        <div class="col-md-6 contact-right">
            <input type="contacttext" placeholder="Name" name="name" required/>
            <input type="contacttext" placeholder="E-mail" name="mail" required/>
            <input type="contacttext" placeholder="Phone" name="phone" required/>
            <input type="contacttext" placeholder="Product" name="product" required/>
            <input type="contacttext" placeholder="Best time to contact" name="contact me:" required/>
            <br>
            <textarea name="enquiry"
                      form="enquireform"
                      placeholder="Hi, I'd like to enquire about...">
            </textarea>
            <input type="submit" value="SEND"/>
        </div>
    </form>
    <div class="clearfix"></div>

<br>
<br>