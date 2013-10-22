$(document).ready(function() {
	var lastDiv = $("div:last");
	if ($(lastDiv).text().indexOf("Reklamu na tomto") === 0)
	{
		$(lastDiv).css("display", "none");
	}
});

