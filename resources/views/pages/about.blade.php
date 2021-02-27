@extends('layouts.app')

@section('content')
<div class="about-section">
    <h1>SoulTradeCo</h1>
    <p>Founded in 2020.</p>
    <p>Curbing loneliness and providing professional services.</p>
  </div>
  
  <br>

  <h2 style="text-align:center">FAQ</h2>
  <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            How can I be verified?
          </button>
        </h2>
      </div>
  
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body ml-3 mt-3 mb-3">
          If you cannot see anything other than Home or About, go to your profile and verify yourself.
        </div>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            How can I contact support?
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body ml-3 mt-3 mb-3">
          You can contact support at support@soultrade.com
        </div>
      </div>
    </div>
    <div class="card mt-3">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            How long does it take to receive my withdrawals?
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body ml-3 mt-3 mb-3">
          Within one to two business days.
        </div>
      </div>
    </div>
  </div>
@endsection