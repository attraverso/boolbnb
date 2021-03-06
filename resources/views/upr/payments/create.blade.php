@extends('layouts.app')

@section('content')
    <div class="sponsor-wrapper">
        <div class="container">
            <div class="row">

                <div class="sponsor-title col-12">
                    <h1>Sponsor Apartment {{ $house->id }}</h1>
                    <hr>
                </div>
                
                <div class="sponsor-plan sponsor-price col-12">
                    {{-- PAYMENT MESSAGES  --}}
                    @if (session('success_message'))
                        <div>
                            <div class="alert alert alert-success">
                                {{ session('success_message') }}
                            </div>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div>
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif

                        {{-- END PAYMENT MESSAGES --}}
                    <p>1 - Scegli il piano di sponsorizzazione</p>
                    <div >
                        @foreach ($adverts as $advert)
                            <div class="price">
                                <button class="advert-type" value="{{ $advert->price }}">
                                    {{ $advert->price }}€ per {{ $advert->duration_in_days * 24 }} ore di sponsorizzazione
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="information-payments">
                    <p>2 - Inserisci i tuoi dati di pagamento</p>
                    {{-- <form>
                    <div class="form-group number-cc">
                        <input type="email" class="form-control" id="number-cc" aria-describedby="emailHelp" placeholder="Numero CC *">
                    </div>
                    <div class="form-group date-and-cvc">
                        <input type="password" class="form-control" id="date" placeholder="Data di scadenza">
                        <input type="password" class="form-control" id="cvc" placeholder="CVC">
                    </div>
                        <button type="submit" class= "btn-payments">Paga ora</button>

                    </form> --}}
                    <form action="{{ route('upr.payments.checkout', ['house' => $house->id]) }}" method="POST" id="payment-form">
                        @csrf
                        <input id="payment-amount" name="payment_amount" hidden>
                        <input id="nonce" name="payment_method_nonce" hidden>
                        <div id="dropin-wrapper">
                            <div id="dropin-container"></div>
                            <button id="payment-submit" type="submit">Submit payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
