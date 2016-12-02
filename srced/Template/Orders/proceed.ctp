<div>
  <h2>Payment Method</h2>

  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="businesstest@rubysgifts.com">

    <!-- Specify a Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Specify details about the item that buyers will purchase. -->

    <input type="hidden" name="item_name" value="BLACK PAVE FLAT RING">
    <input type="hidden" name="amount" value="249">
    <input type="hidden" name="currency_code" value="AUD">


    <!-- Display the payment button. -->
    <input type="image" name="submit" border="0"
           src="https://news.androidout.com/wp-content/uploads/sites/3/sites/3/2014/05/paypal.png" width="175" height="105"
           alt="Buy Now">
    <img alt="" border="0" width="1" height="1"
         src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

  </form>

</div>
