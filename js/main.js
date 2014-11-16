$(function() {
	var menu = {
		"Ana Sayfa": {
			sayfa: "genelbilgi.php",
			nav: [{ id: "Ana Sayfa" }]
		}
	};
	$(".list-group-item").on("click", function() {
		var current = $(this).siblings(".active");
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		var sayfa_adi = $(this).text();
		if(!menu[sayfa_adi]) {
			alert("Bu sayfa henüz hazır değil.");
			$(this).siblings().removeClass("active");
			current.addClass("active");
			$(this).removeClass("active");
			return false;
		}
		$.get("php/" + menu[sayfa_adi].sayfa, function(data) {
			$("#main").html(data);
		});
		$(".breadcrumb").html("");
		$.each(menu[sayfa_adi].nav, function(index, item) {
			if(item.url) {
				$(".breadcrumb").append("<li><a href='" + item.url + "'>" + item.id + "</a></li>");
			} else {
				$(".breadcrumb").append("<li>" + item.id + "</li>");
			}
		});
		$(".breadcrumb > li:last-child").addClass("active");
	});
	$(".list-group-item:first-child").click();
});