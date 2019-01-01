
// Medasani Venkat Mohith
// Redid : 822088300
// Instructor Cyndi Chie
// Proj4 Java~Script


// Calculation of total number of attendees dynamically

function totalattendees() {

var x=document.getElementById("underfive");
var y=document.getElementById("bwfivetwelve");
var z=document.getElementById("bwthriteenseventeen");
var q=document.getElementById("eighteenplus");

// making the field to 0 if default not given/selected

if(x.value == "") {
	var x1 = 0;
} else {

x1=parseInt(x.value);

}

if (y.value == "") {
	var y1 = 0;
} else {

y1=parseInt(y.value);

}

if (z.value == "") {
	var z1=0;
} else {

z1=parseInt(z.value);
}

if (q.value == "") {
	var q1=0;
} else {
q1=parseInt(q.value);
}


var total = x1 +y1+z1+q1;
document.getElementById("totalnofattendees").value = total;

}


// Function to Proper Case


function toProperCase(str)
{
	str = str.toLowerCase().split(' ');
	for (var i = 0; i < str.length; i++) {
		str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1);
	}
	return str.join(' ');
}


// function for Last modified 

function lastModified ()

{
	var lm = "This page is last modified on: " + document.lastModified;
    document.getElementById("modified").innerHTML = lm;
}

