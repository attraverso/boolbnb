const { ajaxSetup } = require("jquery");

const OWN_MSGS_API_URL = 'http://localhost:8000/api/messages/set-read/';

$(document).ready(function() {
    $('.message').on('click',function(){
		var currentIndex = $(this).index();
		console.log(currentIndex);
        $('.description.descr-active').toggleClass('descr-active');
		$('.description').eq(currentIndex).toggleClass('descr-active');
		let msgId = $('.message.unread span').attr('data-message-id');
		console.log('whats the id: ', msgId);
		if ($('.message').eq(currentIndex).hasClass('unread')) {
			console.log('im in the if', msgId)
			$('.message.unread').removeClass('unread');
			
			$.ajax({
				'url': OWN_MSGS_API_URL + msgId,
				'method': 'GET',
				'traditional': true,
				'success': function(data) {
					console.log('something went right');
					console.log(data);
				},
				'error': function(e) {
					console.log('oops, something went wrong');
				}
			});
		}
	})
});
