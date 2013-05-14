$(document).ready(function() {
	$('.blog-archive').find('li:not(:first)').find('li').toggle();
	$(".month").click(function(){
		$(this).find('li').toggle();
	});
});