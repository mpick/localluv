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

	  	<div class="control-group">
              <label class="control-label" >Expiration (MM/YYYY)</label>
              <div class="controls">
	      		<input type="text" class="span2" size="2" data-stripe="exp-month"/>
			    <span> / </span>
			    <input type="text" class="span2" size="4" data-stripe="exp-year"/>
              </div>
            </div>
	</form>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">Close</a>
    <a href="#" class="btn btn-primary">Submit Payment</a>
  </div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
	  Stripe.setPublishableKey('pk_test_5zburddCuXacBwyAHH3hliH5');
		jQuery(function($) {
		  $('#payment-form').submit(function(event) {
		  	alert("1");
		    var $form = $(this);
		    console.log($form);
		    // Disable the submit button to prevent repeated clicks
		    $form.find('button').prop('disabled', true);

		    Stripe.createToken($form, stripeResponseHandler);

		    // Prevent the form from submitting with the default action
		    return false;
		  });
		});

	var stripeResponseHandler = function(status, response) {
	  var $form = $('#payment-form');

	  if (response.error) {
	    // Show the errors on the form
	    $form.find('.payment-errors').text(response.error.message);
	    $form.find('button').prop('disabled', false);
	  } else {
	    // token contains id, last4, and card type
	    var token = response.id;
	    // Insert the token into the form so it gets submitted to the server
	    console.log(token);
	    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
	    // and submit
	    $form.get(0).submit();
	  }
	};	
</script>