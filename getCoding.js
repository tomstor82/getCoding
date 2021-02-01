////////// Close drop down menus on startup to avoid a non JS browser to see their content ////////// *** REPLACED BY JQuery functin ***
/*
window.addEventListener("load", closeMenus);
function closeMenus() {
	var menuArray = document.getElementsByClassName("dropDown");
	for (i = 0; i < menuArray.length; i++) {
		menus = menuArray[i];
		menus.style.display = "none";
	}
}

///////////// Highlight and open and close drop downs without the use of anchor tags and CSS /////////

//draggable shortcut menu


// Create an array with all "link" elements
var linkArray = document.getElementsByClassName("link");

// Search the array for any of the listened to events and call relevant function if events occur

for (i = 0; i < linkArray.length; i++) {
	item = linkArray[i];
	item.addEventListener("mouseenter", onMouseEnter);
	item.addEventListener("mouseleave", onMouseLeave);
	item.addEventListener("mousedown", onMouseDown);
	item.addEventListener("mouseup", onMouseUp);
}
function onMouseEnter() {
	this.style.color = "red";
	this.style.cursor = "pointer";
}
function onMouseLeave() {
	this.style.color = "blue";
	this.style.cursor = "initial";
}
function onMouseDown() {
	this.style.color = "green";
}
function onMouseUp() {
	this.style.color = "red";
	var menu = this.nextElementSibling; // Next Element Sibling is the sibling of the link you click - which has display none on it's menu
	if (menu.style.display != "block") {
		do { // The do loop allows the menu to show before any conditons are met as CSS initially closes the menus with display: none
			menu.style.display = "block";
		}
		while (menu.style.display == "none");
	}
	else {
		menu.style.display = "none";
	}
}*/

////////////////////////////////////////// Clock and date updating every secound /////////////////////////////////////////////

function updateClock() {
	const time = new Date();
	document.getElementById("clock").innerHTML = "<div style='float: right;' id='clock'>" + time + "</div>";
}
setInterval(updateClock, 1000);	// Updates the clock every second

////////////////////////////////////////// Add text to document sections //////////////////////////////////////////////////////

function inputText() {
	const first_input = prompt("Enter text under which section? e.g. CSS", "");
	if (first_input !== "") {
		const section = first_input.toLowerCase();
		if (section === "javascript") {	// To allow for writing both JS and JavaScript
			section = "js";
		}
		if (section === "notes" || section === "azure" || section === "php" || section === "js" || section === "css" || section === "html") {
			const text = prompt("Text", "");
			if (text !== "") {
				const para = document.createElement("p");
				para.innerHTML = text;
				document.getElementById(section).appendChild(para);
			}
		}
		else {
			alert("Section not found");
		}
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

