var button = document.querySelector('#payment-submit');
  braintree.dropin.create({
    // Insert your tokenization key here
    authorization: 'sandbox_w3dfnx46_6hqm567rbwp58h5h',
    container: '#dropin-container'
  }, function (createErr, instance) {
    button.addEventListener('click', function () {
      instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
        // When the user clicks on the 'Submit payment' button this code will send the
        // encrypted payment information in a variable called a payment method nonce
        $.ajax({
          type: 'POST',
          url: 'http:localhost:8000/upr/payments/checkout',
          data: {'paymentMethodNonce': payload.nonce}
        }).done(function(result) {
          // Tear down the Drop-in UI
          instance.teardown(function (teardownErr) {
            if (teardownErr) {
              console.error('Could not tear down Drop-in UI!');
            } else {
              console.info('Drop-in UI has been torn down!');
              // Remove the 'Submit payment' button
              $('#payment-submit').remove();
            }
          });
          if (result.success) {
            $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
          } else {
            console.log(result);
            $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
          }
        });
      });
    });
  });