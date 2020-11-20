/* Fade background and text colour of document
** from either black to white or vise versa
**
** API takes 3 arguments all optional
** First arg: 0 or none = fade to black, any other value fade to white
** Second arg: time for fade in ms
** Third arg: callback function */

function fadeTo(colour = 0, time = 100, callBack = function() {}) { // standard 'black' and 100ms interval
	const black = 0;
	const white = 255;
	if (colour == 0) change();
	else change(true); // boolean controlling fade from either black or white, false is to black
	
	// setting colours function
	function setColours(background, colour) {
		if (background >= 0 && colour >= 0) {
			$("*").css( { backgroundColor : `rgb(${background}, ${background}, ${background})`, color: `rgb(${colour}, ${colour}, ${colour})` } );
			callBack();
		}
	}
	
	// function controlling reversal of colours as well as timing interval
	function change(toWhite = false) {
		let _fromBlack = black;
		let _fromWhite = white;
		const INTERVAL = setInterval(colourCalc, time);
		function colourCalc () {
			if (_fromWhite >= 17) {
				_fromBlack = _fromBlack + 17;
				_fromWhite = _fromWhite - 17;
				if (toWhite) setColours(_fromBlack, _fromWhite); // fade to white
				else setColours(_fromWhite, _fromBlack); // fade to black
			}
			else {
				return clearInterval(INTERVAL);
			}
		}
	}
}
