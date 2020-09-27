@extends('layouts.app')

@section('page-title', 'Homepage | Boolbnb')

@section('content')
	<div class="home-wrapper">
        <div class="container">
			{{-- JUMBO --}}
            <div class="home">
                <div class="overlay"></div>
                <div class="col-lg-6">
					<form action="{{ route('guest.search') }}" method="GET" class="search-house form-group">
						<div class="house-autosearch" value="{{ old('address')}}" data-search-source="homepage"></div>
						<input type="text" name="longitude" data-coordinates-long="" hidden>
						<input type="text" name="latitude" data-coordinates-lat="" hidden>
                    </form>
                </div>
            </div>
			{{-- PROMOTED HOUSES LIST --}}
            <div class="title text-center">
                <h1>Homes you might enjoy</h1>
                <hr>
            </div>
            <div class="apartment-description">
				<div class="row">
                @foreach ($houses as $house)
                    <a href="{{route('guest.show', ['house' => $house->id])}}" class="card-upr col-lg-4 col-md-6">
                        <img src="{{ asset('storage/' . $house->image_path) }}" alt="image of house" class="apartment-img">
                        <div class="sponsored d-flex justify-content-end">
                            <p>Sponsored</p>
                        </div>
                        <h1>{{ $house->title }}</h1>
                        <p>{{ $house->description }}</p>
                        <div class="sevices">
                            <span title="Number of rooms"><i class="fas fa-door-open"></i>{{ $house->nr_of_rooms }}</span>
                            <span title="Number of beds"><i class="fas fa-bed"></i>{{ $house->nr_of_beds }}</span>
                            <span title="Number of bathrooms"><i class="fas fa-bath"></i>{{ $house->nr_of_bathrooms }}</span>
                            <span title="Square meters"><i class="fas fa-border-style"></i>{{ $house->square_mt }}</span>
                            @foreach ($house->services as $service)
                                <span title="{{ucfirst($service->name)}}"><i class="{{$service->icon_class}}"></i></span>
                            @endforeach
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
		</div>
	</div>
@endsection
