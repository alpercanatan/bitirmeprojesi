$(function() {
	var menu = {
		"Ana Sayfa": "genelbilgi.php"
	};
	$(".list-group-item").on("click", function() {
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		var sayfa = $(this).text();
		$.get("php/" + menu[sayfa], function(data) {
			$("#main").html(data);
		});
	});
});