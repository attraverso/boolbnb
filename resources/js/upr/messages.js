$(document).ready(function() {
    $('.message').on('click',function(){
		var currentIndex = $(this).index();
		console.log(currentIndex);
        $('.description.active').toggleClass('descr-active');
		$('.description').eq(currentIndex).toggleClass('descr-active');
        $('.message.unread').removeClass('unread');
		if ($('.message.unread').hasClass('unread')) {
			$('.message.unread').removeClass('unread');
		}
    });
});
