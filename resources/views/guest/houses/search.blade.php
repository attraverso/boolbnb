@extends('layouts.app')

@section('page-title', 'Search Homes | Boolbnb')

@section('content')
        <div class="container">
            <div class="row">
                <div class="jumbo-search col-12">
                    <div class="overlay"></div>
                    <div class="col-lg-6">
                        {{-- SEARCHBAR --}}
                        <form action="{{ route('guest.search') }}" method="GET" class="search-house form-group">
							<div class="house-autosearch" value="{{ old('address')}}" data-search-source="search"></div>
							<input type="text" name="longitude" data-coordinates-long="{{ $longitude }}" hidden>
							<input type="text" name="latitude" data-coordinates-lat="{{ $latitude }}" hidden>
						</form>
                    </div>
                </div>
            </div>
        </div> {{-- END CONTAINER --}}

        {{-- ADVERTISED HOMES --}}
        <div class="container">
            <div class="row bg-sponsored">
                @forelse ($houses as $house)
                    <a href="{{route('guest.show', ['house' => $house->id])}}" class="card-upr card-upr-sponsored col-lg-4 col-md-6">
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
                @empty
                    <p>Your search returned no results.</p>
                @endforelse ($houses as $house)
            </div>
        </div>


	{{-- SEARCH RESULTS - filled by Handlebars after ajax call to the internal API --}}
    <div class="container">
        {{-- PROMOTED HOUSES LIST --}}
        <div class="row">
            <div class="title">
                <h1>SEARCH RESULTS</h1>
                <hr>
            </div>
        </div>

        {{-- FILTERS --}}
        <div class="row">
            <div id="search-filter">

                <div class="btn-filters">
                    <i class="fas fa-sliders-h"></i>
                    <span>Filter homes</span>
                </div>

                <div class="bg-filters-form"></div>
                <form class="form">
                    <input type="number" min="1" class="filter-box search-filters" name="services" placeholder="N. rooms..." id="filter-rooms">
                    <input type="number" min="1" class="filter-box search-filters" name="services" placeholder="N. beds..." id="filter-beds">
                    <input type="number" min="1" class="filter-box search-filters" name="services" placeholder="Distance(km)..." id="filter-distance">
                    @foreach ( $services as $service )
                        <div class="filter-box">
                            <input type="checkbox" class="search-filters" id="{{$service->name}}" value="{{ $service->id }}" name="services">
                            <label for="">{{ $service->name }}</label>
                        </div>
                    @endforeach
                    <button type="button" class="search-update-btn">Apply Filters</button>
                </form>

            </div>
        </div>

        <div class="row houses-grid-results">
            {{-- SEARCH RESULTS --}}
        </div>

    </div>

    {{-- HANDLEBARS TEMPLATE --}}
    <script class="house-card-template" type="text/x-handlebars-template">
        <a href="@{{ route }}" class="handle-house-card card-upr col-lg-4 col-md-6">
            <img src="{{ asset('storage')}}/@{{image}}" alt="house">
            <div>
                <h1 class="hbs-title">@{{ title }}</h1>
                <p class="hbs-description">@{{ description }}</p>
                <div class="handle-services">
                    <span class="hbs-rooms">@{{{ rooms }}}</span>
                    <span class="hbs-beds">@{{{ beds }}}</span>
                    <span class="hbs-bathrooms">@{{{ bathrooms }}}</span>
                    <span class="hbs-m2">@{{{ m2 }}}</span>
                    <span class="hbs-services"></span>
                </div>
                <p class="hbs-distance">@{{ distance }}</p>
            </div>
        </a>
	</script>

    <script class="house-services-template" type="text/x-handlebars-template">
        <i class="@{{ service }}"></i>
    </script>

@endsection
