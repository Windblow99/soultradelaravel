<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'SoulTradeCo.') }}</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('inc.navbar')  
<div class="container py-4">  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center">
                <h3>Payment Details</h3>
            </div>                    

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif

            <form role="form" action="{{ route('make-payment') }}" method="post" class="validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf 
                <div class='form-row row mt-4'>
                    <label class='col-form-label'>Card Number</label> 
                    <div class='col-xs-12 form-group required'>  
                        <input class='form-control card-num' type='text' inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="16" value="4242424242424242">
                    </div>

                    <label class='col-form-label ml-3'>Amount (RM)</label>
                    <div class='col-xs-12 form-group required'>  
                        <input class='form-control' type='number' name="amount" id="amount" min="20" max="500">
                    </div>    
                </div>

                <div class='form-row row'>
                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label> 
                        <input autocomplete='off' class='form-control card-cvc' size='4' type='number' value="123">
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Month</label> <input
                            class='form-control card-expiry-month' size='2' type='number' value="11">
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Year</label> <input
                            class='form-control card-expiry-year' size='4' type='number' value="2021">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg" type="submit">Pay Now</button>
                    </div>
                </div>
                    
            </form>      
        </div>
    </div>
</div>
  
</body>
  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".validation");
  $('form.validation').bind('submit', function(e) {
    var $form         = $(".validation"),
        inputVal = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputVal),
        $errorStatus = $form.find('div.error'),
        valid         = true;
        $errorStatus.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorStatus.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-num').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeHandleResponse);
    }
  
  });
  
  function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
</html>