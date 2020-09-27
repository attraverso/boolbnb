import tt from '@tomtom-international/web-sdk-maps';
import tts from '@tomtom-international/web-sdk-services';
import sb from '@tomtom-international/web-sdk-plugin-searchbox';

const Handlebars = require("handlebars");
const OWN_HOUSES_API_URL = 'http://localhost:8000/api/houses';

/* * * DRAW MAP IN SHOW VIEW * * */

/** check whether there's supposed to be a map in the page so as not to call
 * the function everywhere */
if ($('#map').length) {
	drawTomTomMap();
}

/* draw map from stored coordinates */
function drawTomTomMap() {
	//grab coordinates from view
	let long = $('#my-maps').attr('data-longitude');
	let lat = $('#my-maps').attr('data-latitude');
	
	//make it so tomtom can read them
	let myCoordinates = [long, lat];

	//draw a map centered on the given coordinates
	let map = tt.map({
		container: 'map',
		key: process.env.MIX_TOMTOM_API_KEY,
		style: 'tomtom://vector/1/basic-main',
		center: myCoordinates,
		zoom: 15
	});

	//add marker at the given coordinates
	let marker = new tt.Marker().setLngLat(myCoordinates).addTo(map);
}

/* * * ADDRESS SEARCH FUNCTIONALITIES * * */

/** in SEARCH views, if redirected from homepage: grab input and start search */
if ($('div[data-search-source="search"]').length) {
	buildQueryString();
}

/** in SEARCH views, on click on 'update filters' button, get the values of the filter inputs*/
$('.search-update-btn').on('click', function() {
	buildQueryString();
})

/** get the value of all filter inputs and combine them in a query string*/
function buildQueryString() {
	/* create reference object to store query string parameters*/
	let queryStringObject = {};
	/* get all the values from the filters */
	queryStringObject.longitude = $('input[data-coordinates-long]').attr('data-coordinates-long');
	queryStringObject.latitude = $('input[data-coordinates-lat]').attr('data-coordinates-lat');
	/* only add optional filters if requested by the user */
	if ($('#filter-rooms').val() != '') {
		queryStringObject.rooms = $('#filter-rooms').val();
	}
	if ($('#filter-beds').val() != '') {
		queryStringObject.beds = $('#filter-beds').val();
	}
	if ($('#filter-distance').val() != '') {
		queryStringObject.distance = $('#filter-distance').val();
	}
	/* build string of services in '1,2,3' format*/
	queryStringObject['services'] = '';
	$.each($("input[name='services']:checked"), function(){
		queryStringObject['services'] += $(this).val() + ',';
	});
	/* only pass the services key if at least one service is flagged */
	if(queryStringObject.services.length == ''){
		delete queryStringObject['services'];
	}
	let queryString = '?' + $.param(queryStringObject);
	callOwnHouseAPI(queryString)
}

/** call Api\HouseController */
function callOwnHouseAPI(query) {
	$.ajax({
		'url': OWN_HOUSES_API_URL + query,
		'method': 'GET',
		'traditional': true,
		'success': function(data) {
			/** remove all search cards from view */
			$('.houses-grid-results').empty();
			if (data.data.length != 0) {
				for (let i = 0; i < data.data.length; i++) {
					const house = data.data[i];
						
					/** use handlebars template to build home cards */
					let source = $('.house-card-template').html();
					let template = Handlebars.compile(source);
					let context = {
						image: house.image_path,
						route: 'http://localhost:8000/houses/' + house.id,
						title: house.title, 
						description: house.description,
						distance: house.distance,
						rooms: ' <i class="fas fa-door-open"></i> ' + house.nr_of_rooms,
						beds: ' <i class="fas fa-bed"></i> ' + house.nr_of_beds,
						bathrooms: ' <i class="fas fa-bath"></i> ' + house.nr_of_bathrooms,
						m2: ' <i class="fas fa-border-style"></i> ' + house.square_mt,
					};
					let html = template(context);
					$('.houses-grid-results').append(html);

					/* use a second template to add service icons */
					for (let j = 0; j < house.services.length; j++) {
						const service = house.services[j].icon_class;
						
						let serviceSource = $('.house-services-template').html();
						let serviceTemplate = Handlebars.compile(serviceSource);
						let serviceContext = {
							service: service,
						};
						let servicesHtml = serviceTemplate(serviceContext);
						$('.hbs-services').last().append(servicesHtml);
					}
				}
			} else {
				$('.houses-grid-results').append('It looks like none of our homes matches your search.');
			};
		},
			'error': function(e) {
				console.log('error? ', e);
				console.log('callOwnHouseAPI ajax: something went wrong');
		}
	})
}

/** TOMTOM AUTOCOMPLETE THROUGH SEARCHBOX PLUGIN*/

/** set up autocomplete */
let acSearchBox = new sb(tts.services, {
	minNumberOfCharacters: 3,
	labels: {
		placeholder: "Search city, address..."
	},
	searchOptions: {
		key: process.env.MIX_TOMTOM_API_KEY,
		language: 'en-US'
	},
	autocompleteOptions: {
		key: process.env.MIX_TOMTOM_API_KEY,
		language: 'en-US'
	},
	noResultsMessage: "No results found.",
});
/** show searchbar in page */
$(".house-autosearch").append(acSearchBox.getSearchBoxHTML());

/** in EDIT view, show previously stored address in dynamically built searchbar */
if ($('.house-autosearch[data-search-source="edit"]').length) {
	console.log("I'm in!");
	let address = $('input[name="address"]').attr('value');
	console.log(address);
	$('.tt-search-box-input').attr('value', address);
}
/** in homepage */
acSearchBox.on('tomtom.searchbox.resultselected', function(data) {
let longitude = data.data.result.position.lng;
let latitude = data.data.result.position.lat;
let address = data.data.text;
$('input[data-coordinates-long]').attr('value', longitude);
$('input[data-coordinates-lat]').attr('value', latitude);
	/** in homepage */
	if ($('.house-autosearch[data-search-source="homepage"]').length) {
		$('.search-house').trigger('submit');
	/** in search page */
	} else if ($('.house-autosearch[data-search-source="search"]').length) {
		$('input[data-coordinates-long]').attr('data-coordinates-long', longitude);
		$('input[data-coordinates-lat]').attr('data-coordinates-lat', latitude);
		buildQueryString();
	/** in house create/edit views*/
	} else if ($('.house-autosearch[data-search-source="create"]').length || $('.house-autosearch[data-search-source="edit"]').length) {
		console.log('create/edit');
		$('input[name="longitude"]').attr('value', longitude);
		$('input[name="latitude"]').attr('value', latitude);
		$('input[name="address"]').attr('value', address);
	}
});