<h1>Hi there</h1>rrr

		  <a class="btn pull-right" data-toggle="modal" href="#my-modal">Feedback</a>
<div id="my-modal"  class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
	<form action="" method="POST" class="form-horizontal" id="payment-form">
	  <span class="payment-errors"></span>

	  <div class="form-row">
	  	<div class="control-group">
              <label class="control-label">Card Number</label>
              <div class="controls">
                <input type="text" size="20" data-stripe="number"/>
              </div>
            </div>
	  	<div class="control-group">
              <label class="control-label" >CVC</label>
              <div class="controls">
                <input type="text" size="4" data-stripe="cvc"/>
              </div>
            </div>


	  <div class="form-row">
	    <label>
	      <span>CVC</span>
	      <input type="text" size="4" data-stripe="cvc"/>
	    </label>
	  </div>

	  <div class="form-row">
	    <label>
	      <span>Expiration (MM/YYYY)</span>
	      <input type="text" size="2" data-stripe="exp-month"/>
	    </label>
	    <span> / </span>
	    <input type="text" size="4" data-stripe="exp-year"/>
	  </div>

	  <button type="submit">Submit Payment</button>
	</form>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">Close</a>
    <a href="#" class="btn btn-primary">Save changes</a>
  </div>
</div>
<script type="text/javascript">
  // This identifies your website in the createToken call below
  Stripe.setPublishableKey('pk_test_5zburddCuXacBwyAHH3hliH5');
	jQuery(function($) {
	  $('#payment-form').submit(function(event) {
	    var $form = $(this);

	    // Disable the submit button to prevent repeated clicks
	    $form.find('button').prop('disabled', true);

	    Stripe.createToken($form, stripeResponseHandler);

	    // Prevent the form from submitting with the default action
	    return false;
	  });
	});
</script>