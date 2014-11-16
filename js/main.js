$(function() {
	$(".list-group-item").on("click", function() {
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
	});
});