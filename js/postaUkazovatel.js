$(document).ready(function() {
	var postaTlacitko = $("a#postaTlacitko");
	var postaUkazovatel = $("div#postaUkazovatel");
	// We will need copy of orignal value of text in postaTlacitko
	var initialValue = postaTlacitko.text().slice();

	postaTlacitko.mouseenter(function() {
		$(this).text(postaUkazovatel.text());
		$(this).css("color", "lime");
		});
	
	postaTlacitko.mouseleave(function() {
		postaTlacitko.text(initialValue);
		$(this).css("color", "gold");
	});
		
});
