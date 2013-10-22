var contentFrame = $("section#contentFrame");

$("a").each(function() {
	$(this).click(function() {
		console.log($(this).attr("data-link"));
		contentFrame.load($(this).attr("data-link"));
	});
});