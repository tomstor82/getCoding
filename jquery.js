// Ajax external documents import

/* No delay until DOM is ready is needed for this import
** HTML async takes care of this as it starts the import
** as soon as the JQ libraries are loaded, before the DOM
** is ready */

$("#js").first().load("getCoding/jsImport.html");
$("#css").first().load("getCoding/cssImport.html");
$("#html").first().load("getCoding/htmlImport.html");
$("#react").first().load("getCoding/react.html");
$("#php").first().load("getCoding/phpImport.html");
$("#terminal").first().load("getCoding/terminal.html");
$("#azure").first().load("getCoding/azureImport.html");
$("#notes").first().load("getCoding/notesImport.html");

// clock
setInterval(function() {
	const _time = new Date();
	$('#clock').text(_time);
}, 1000);

/* First $(function() (.ready superset) makes sure the content within
** executes only after DOM is ready and the HTML tags are available.
** Futhermore a 500ms delay eliminates issues with functionality
** caused by the functions fireing before the import is completed.
** The ready function has proven along with defer, insufficient. */

$(function() {

	/* Add dark background at late hours with a 60sec interval time checker
	** Then we change it to appropriate for time of day */
	const _time = new Date();
	const _hrs = _time.getHours();
	/* hours for night light and day light 24H*/
	const _nightHrs = 19;
	const _dayHrs = 8;

	// set background colour initially allowing for the checking of current colour later in function
	let $currBgColour = $('*').css( 'backgroundColor' );
	
	if ($currBgColour == "rgba(0, 0, 0, 0)" && _hrs > _nightHrs-1 || _hrs < _dayHrs) $('*').css( { backgroundColor : "rgb(0, 0, 0)", color : "rgb(255, 255, 255)" } );
	else $('*').css( { backgroundColor : "rgb(255, 255, 255)" } );
	
	// function controlling change
	setInterval(function() {
		// check value of background colour
		$currBgColour = $('*').css( 'backgroundColor' );

		// evening
		if (_hrs > _nightHrs-1 || _hrs < _dayHrs) {
			if ($currBgColour != "rgb(255, 255, 255)" ) return;
			else fadeTo(0, 100, styleProps);
		}
		// day
		else if (_hrs < _nightHrs && _hrs > _dayHrs-1 && $currBgColour === "rgb(0, 0, 0)" ) fadeTo(1, 100, styleProps);

		return;
	}, 60000);
	
	/* 500ms delay on document functionality allowing for AJAX import ***** ready function insufficient ******/ 
	setTimeout(function() {
	
		// Apply styling properties
		styleProps();

		// Hide drop down lists
		$(".dropDown").hide();

		// Event handlers for drop down menus and links
		$(".link")
			.click(function(e) {
				$(this).next().slideToggle(500);//toggle("blind", {direction: "up"}, 500);
			})
			.mousedown(function(e) {
				$(this).css( { color: "green" } );
			})
			.mouseup(function(e) {
				$(this).css( { color: "red" } );
			})
			.mouseover(function(e) {
				$(this).css( { cursor: "pointer" } );
			})
			.mouseenter(function(e) {
				$(this).css( { color: "red" } );
			})
			.mouseleave(function(e) {
				$(this).css( { color: "inherit" } );
			});
		// Event handlers for general links
		$("a")
			.mousedown(function(e) {
				$(this).css( { color: "green" } );
			})
			.mouseup(function(e) {
				$(this).css( { color: "red" } );
			})
			.mouseover(function(e) {
				$(this).css( { cursor: "pointer" } );
			})
			.mouseenter(function(e) {
				$(this).css( { color: "red" } );
			})
			.mouseleave(function(e) {
				$(this).css( { color: "inherit" } );
			});
		$("article a").mouseleave(function(e) { $(this).css( { color: "grey" } ) });

// Moveable link window

		/*$("#notelink")
			.draggable( { cursor:"move", containment: "window", opacity: .5 } );*/
	
	/*$("#notelink, li")
	.mouseover(function() {
		$(this).css({color: "red;"});
	});*/
	//.click(function() { $scrollTo("#css_head");});

	//$("#inputText").click(function() { var text = val(); alert(text);});
/*.on("dragstop", function() { $(this).effect("bounce", 2000);});*/


		
// Replace "code" within all "p" tags, with "span" and change colour to red
/*		$("p code").replaceWith(function() {
			return $("<span />", { html: $(this).html() } ); // creates start and end span tags and adds html content from current element (the same as it was before tag change)
		});
		$('p span').css( { 'color': 'red'} );*/
	}, 500);
});

// styling properties within a function to allow for the fade function to apply these properties
const styleProps = function() {
	// strong tags
	$("strong").css( { "font-variant":"small-caps", "font-size":"1.2em" } );
	// emphasised tags
	$("em").css( { "color":"MediumSeaGreen", "font-style": "normal" } );
	// paragraph tags
	$("p").css( { "display":"inline-block"} );
	// code tags within paragraphs
	$("code").css( { "color":"red", "font-size":"1.2em" } );
	// Remove bullet on associated lists
	$(".no_bullet_list").css( { "listStyleType": "none" } );
	// Links
	$("article a").css( { "color": "grey"} );
}