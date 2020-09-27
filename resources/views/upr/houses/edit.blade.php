@extends('layouts.app')

@section('page-title', 'Edit Home | Boolbnb')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <h1 class="mt-3 mb-3">Edit Home</h1>
				</div>
				{{-- ERROR HANDLING --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
				@endif
				{{-- MAIN FORM --}}
                <form id="form-edit" action="{{ route('upr.houses.update', ['house' => $house->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="house-title">Title</label>
                        <input type="text" name="title" class="form-control" id="house-title" placeholder="Title" value="{{ old('title', $house->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="house-description">Description</label>
                        <textarea type="text" name="description" class="form-control" id="house-description" placeholder="Description">{{ old('description', $house->description)}}</textarea>
                    </div>
                    <div class="form-group">
						<label for="house-address" class="house-autosearch" data-search-source="edit">Address</label>
                    </div>
					<div class="form-group">
						<label for="image">Add image</label>
						<input type="file" name="image" class="form-control-file" id="image">
						<p>Current image:</p>
                        <img src="{{ asset('storage/' . $house->image_path) }}" class="img-thumbnail" alt="">
					</div>
					<div class="form-group services-numbers">
						<div class="form-group col-md-6 col-lg-3">
							<label for="house-nr_of_rooms">Total Rooms</label>
							<input type="number" name="nr_of_rooms" class="form-control" id="house-nr_of_rooms" placeholder="Rooms" value="{{ old('nr_of_rooms', $house->nr_of_rooms) }}">
						</div>
						<div class="form-group col-md-6 col-lg-3">
							<label for="house-nr_of_beds">Total Beds</label>
							<input type="number" name="nr_of_beds" class="form-control" id="house-nr_of_beds" placeholder="Beds" value="{{ old('nr_of_beds', $house->nr_of_beds) }}">
						</div>
						<div class="form-group col-md-6 col-lg-3">
							<label for="house-nr_of_bathrooms">Total Bathrooms</label>
							<input type="number" name="nr_of_bathrooms" class="form-control" id="house-nr_of_bathrooms" placeholder="Bathroom" value="{{ old('nr_of_bathrooms', $house->nr_of_bathrooms) }}">
						</div>
						<div class="form-group col-md-6 col-lg-3">
							<label for="house-square_mt">Square meters</label>
							<input type="text" name="square_mt" class="form-control" id="house-square_mt" placeholder="m2" value="{{ old('square_mt', $house->square_mt) }}">
						</div>

					</div>
					{{-- SERVICES CHECKBOXES --}}
					<label for="house-service">Features:</label>
					<div class="form-check form-check-inline">
                        @foreach ($services as $service)
                            <div>
                                <input class="form-check-input" type="checkbox" id="house-services" name="services_ids[]" value="{{ $service->id }}"
                                @if ($errors->any())
                                    {{in_array($service->id, old('services_ids', [])) ? 'checked' : ''}}
                                @else
                                    {{$house->services->contains($service) ? 'checked' : ''}}
                                @endif
                                >
                                <label class="form-check-label" for="house-service">{{ ucfirst($service->name) }}</label>
                            </div>

						@endforeach
					</div>
					{{-- Hidden values for storing address-related values --}}
                    <div class="form-group">
						<input type="text" name="latitude" value="{{ old('latitude', $house->latitude) }}" hidden>
						<input type="text" name="longitude" value="{{ old('longitude', $house->longitude) }}" hidden>
						<input type="text" name="address" value="{{ old('address', $house->address) }}" hidden>
                    </div>
                    <div>
                        <button type="submit" id="btnEdit" class="btn btn-primary">Update Home</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
