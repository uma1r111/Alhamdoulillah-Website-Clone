//------------------------ Copyright Block ------------------------
/* 

rhumb.js: eQibla Rhumb Line Extension (ver 0.1)
Copyright (C) 2009 Hamid Zarrabi-Zadeh

Source: http://eQibla.com
License: Creative Commons Attribution 3.0
         http://creativecommons.org/licenses/by/3.0

This program can be used in any website or application 
provided credit is given to eQibla with a link or 
another reference to eQibla.com.

This program is distributed in the hope that it 
will be useful, but WITHOUT ANY WARRANTY. 

*/
//-----------------------------------------------------------------
// PLEASE DON NOT REMOVE THE ABOVE COPYRIGHT BLOCK.



Qibla.extension = true;   // enable extension
Qibla.rhumbColor = '#0000FF';  // rhumb line color


//------------------------- Extension Functions -----------------------------


// draw direction lines
Qibla.extDraw = function() {
	var is3DMap = this.getMapType() == 'e';
	
	var rhumbSegments = !is3DMap ? [this.home, this.kaba] : this.rhumbLine(this.home, this.kaba);
	this.map.addOverlay(new GPolyline(rhumbSegments, this.rhumbColor, 4, 0.6));
}


// write information
Qibla.extWrite = function() {
	var distance = rhumbDistance(this.home, this.kaba); 
	this.write('QRhumbDistance', this.formatDistance(distance));
}


//-------------------------- Rhumb Line Functions -----------------------

// make rhumb line segments
Qibla.rhumbLine = function(point1, point2) {
	var d = point1.distanceFrom(point2);
	if (d > 2* this.segmentSize) {
		var s1 = sigmaSphere(point1.latRadians());
		var s2 = sigmaSphere(point2.latRadians());
		var dS = s2- s1; 
		var dLng = point2.lng()- point1.lng();
		if (dLng > 180) dLng -= 360;
		var nSegments = Math.round(d/ this.segmentSize);
		var points = [];
		var s = s1;
		var lng = point1.lng();
		for (var i = 0; i <= nSegments; i++) {
			points.push(new GLatLng(180/ Math.PI* sigmaLat(s), lng));
			s += dS/ nSegments;
			lng += dLng/ nSegments;
		}
	}
	else
		var points = [point1, point2];
	return points;
}

// Alexander, J., "Loxodromes: A Rhumb Way to Go", Mathematics Magazine, Vol. 7, No. 5, Dec. 2004, p. 349
function sigmaSphere(latitude) {
	return Math.log(Math.tan(0.5*(latitude + Math.PI/2)));
}

// reverse sigma function
function sigmaLat(sigma) {
	return 2* Math.atan(Math.pow(Math.E, sigma))- Math.PI/ 2;
}

// From: Long Distance Measure Google Maplet
function rhumbDistance(point1, point2) {
	var cos;
	var radiusEarth = (new GLatLng(0, 0)).distanceFrom(new GLatLng(0, 180))/ Math.PI;
	var thisLat = point1.latRadians();
	var thatLat = point2.latRadians();
	var dLat = Math.abs(thatLat - thisLat);
	var dLng = Math.abs(point2.lngRadians() - point1.lngRadians());
	if (dLng > Math.PI) dLng = Math.PI*2 - dLng;
	if (dLat > 0.0000000001) {
		var dE = sigmaSphere(thatLat) - sigmaSphere(thisLat);
		var m1 = dLng/dE;
		return radiusEarth*dLat*(Math.sqrt(1 + m1*m1));
	}
	else if ((cos = Math.cos(thatLat)) > 0.0000000001) {
		return radiusEarth*dLng/cos;
	}
	else return 0;
}


