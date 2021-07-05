$(document).ready(function () {

	

// korpus 



	var daWidth = $('body').innerWidth();

		daHeight = (daWidth * .542);



	var paper1 = Raphael($('#korpus-3')[0], daWidth, daHeight);

	var attr = {stroke:'none'};



	$('.controls-box').css({'height':daHeight})



	paper1.setViewBox(0, 0, 1519, 824, true); 

	paper1.canvas.setAttribute('preserveAspectRatio', 'none'); // there's no method in Raphaël for doing this directly



	$(window).resize(function(){

     	var daWidth = $('body').innerWidth();

		daHeight = (daWidth * .542);

		// setsize is a very handy method that, i believe, is new to Raphaël 2.0

		// it's great for being responsive in our designs.

		paper1.setSize(daWidth,daHeight);



	});



	function labelPath( pathObj, text, textattr ){

		if ( textattr == undefined )

        textattr = { 'font-size': 28, fill: '#fff', stroke: 'none', 'font-family': 'Roboto,sans-serif', 'font-weight': 900 };

	    var bbox = pathObj.getBBox();

	    var textObj = pathObj.paper.text( bbox.x + bbox.width / 2, bbox.y + bbox.height / 2, text ).attr( textattr );

	    return textObj;

	};





// 1 floor

	var floor11 = paper1.path("m 312.9178,495.4845 273.50668,-10.37284 29.36707,0 53.90248,0 65.8537,0 0,-16.05709 385.49017,12.68974 76.098,7.92356 0,3.3335 -4.422,0 0,93.74628 0,0 -359.92089,3.04039 -97.24528,0.19242 -66.11916,2.69388 -34.70231,-0.89242 -4.69412,-4.28593 0,-2.78926 -7.75549,-2.17698 -9.32021,-0.20409 -1.63273,-2.6532 -3.33351,-0.068 -1.66675,1.02046 -3.23161,1.56257 -60.94898,0 -9.42857,0.9621 -3.84377,1.08096 -4.28593,3.3335 -2.6532,2.10895 -103.7069,-4.02195 -105.28335,-3.93764 z")

	.attr({fill: "#0dbed6", opacity:"0", stroke:'none' });

	floor11.data("id", 'fl11').data("value", "../bc/inner-floor.html");



	var floor11Mark = paper1.circle(1219.745, 541.17346, 20)

	.attr({

	    "fill": "#000",

	    "fill-opacity" : "0.47",

	    "stroke": "#fff",

	    "stroke-width": "2",

	})

	.data("id", 'floor11Mark')

	var floor11Text = labelPath( floor11Mark, "1" );



	var floorSet11 = paper1.set();

	floorSet11.push(floor11Mark, floor11Text, floor11);



 	var s11hoverIn = function() {

        floor11.attr({"opacity" : "0.47",});

        floor11Mark.attr({"fill-opacity" : "1", "fill": "#22c2d9",});

    };

    var s11hoverOut = function() {

        floor11.attr({"opacity" : "0",});

        floor11Mark.attr({"fill-opacity" : "0.47", "fill": "#000",});

    }



    floorSet11.hover(s11hoverIn, s11hoverOut);



    var tooltip11In = function() {

        $('.fl1').show();

    };

    var tooltip11Out = function() {

        $('.fl1').hide()

    };

    floor11.hover(tooltip11In,tooltip11Out);







// 2 floor

	var floor12 = paper1.path("m 312.94114,495.50233 0,-93.18586 273.07515,-35.64807 91.3015,7.60944 0,7.50437 64.74927,5.19534 -0.0962,4.23323 -6.42312,-0.28863 0.27212,13.7754 456.87884,30.21229 0.047,49.2893 -71.652,-2.44227 -351.85539,-11.6246 -33.69037,-1.0777 0,16.05709 -154.83783,0 z")

	.attr({fill: "#0DBED6", opacity:"0",stroke:'none' });

	name: 'Korpus-2';

	floor12.data("id", 'fl12').data("value", "../bc/inner-floor.html");



	var floor12Mark = paper1.circle(1219.446, 459.25922, 20)

	.attr({

	    "fill": "#000",

	    "fill-opacity" : "0.47",

	    "stroke": "#fff",

	    "stroke-width": "2"

	})

	.data("id", 'floor12Mark')

	var floor12Text = labelPath( floor12Mark, "2" );



	var floorSet12 = paper1.set();

	floorSet12.push(floor12Mark, floor12Text, floor12);



 	var s12hoverIn = function() {

        floor12.attr({"opacity" : "0.47",});

        floor12Mark.attr({"fill-opacity" : "1", "fill": "#22c2d9",});

    };

    var s12hoverOut = function() {

        floor12.attr({"opacity" : "0",});

        floor12Mark.attr({"fill-opacity" : "0.47", "fill": "#000",});

    }



    floorSet12.hover(s12hoverIn, s12hoverOut);





    var tooltip12In = function() {

        $('.fl2').show();

    };

    var tooltip12Out = function() {

        $('.fl2').hide()

    };

    floor12.hover(tooltip12In,tooltip12Out);

// 3 floor

	var floor13 = paper1.path("m 316.33943,401.87239 -10e-4,-43.38412 360.80281,-62.24555 515.57286,61.54567 -0.022,77.14315 -457.14404,-29.86653 0,-13.9736 6.59898,0 0,-4.14987 -64.82892,-5.15933 0,-7.69679 -91.50559,-7.48506 z")

	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });

	name: 'Korpus-3';

	floor13.data("id", 'fl13').data("value", "../bc/inner-floor.html");



	var floor13Mark = paper1.circle(1219.7451, 397.07611, 20)

	.attr({

	    "fill": "#000",

	    "fill-opacity" : "0.47",

	    "stroke": "#fff",

	    "stroke-width": "2"

	})

	.data("id", 'floor13Mark')

	var floor13Text = labelPath( floor13Mark, "3" );

	var floorSet13 = paper1.set();

	floorSet13.push(floor13Mark, floor13Text, floor13);



 	var s13hoverIn = function() {

        floor13.attr({"opacity" : "0.47",});

        floor13Mark.attr({"fill-opacity" : "1", "fill": "#22c2d9",});

    };

    var s13hoverOut = function() {

        floor13.attr({"opacity" : "0",});

        floor13Mark.attr({"fill-opacity" : "0.47", "fill": "#000",});

    }



    floorSet13.hover(s13hoverIn, s13hoverOut);



    var tooltip13In = function() {

        $('.fl3').show();

    };

    var tooltip13Out = function() {

        $('.fl3').hide()

    };

    floor13.hover(tooltip13In,tooltip13Out);



// 4 floor

	var floor14 = paper1.path("m 316.3382,358.51709 0,-74.9375 361.12604,-86.49661 515.24966,85.99661 0,74.75845 -515.39611,-61.50845 z")

	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });

	name: 'Korpus-3';

	floor14.data("id", 'fl14').data("value", "../bc/inner-floor.html");



	var floor14Mark = paper1.circle(1219.7451, 321.14102, 20)

	.attr({

	    "fill": "#000",

	    "fill-opacity" : "0.47",

	    "stroke": "#fff",

	    "stroke-width": "2"

	})

	var floor14Text = labelPath( floor14Mark, "4" );



	var floorSet14 = paper1.set();

	floorSet14.push(floor14Mark, floor14Text, floor14);



 	var s14hoverIn = function() {

        floor14.attr({"opacity" : "0.47",});

        floor14Mark.attr({"fill-opacity" : "1", "fill": "#22c2d9",});

    };

    var s14hoverOut = function() {

        floor14.attr({"opacity" : "0",});

        floor14Mark.attr({"fill-opacity" : "0.47", "fill": "#000",});

    }

    floorSet14.hover(s14hoverIn, s14hoverOut);



    var tooltip14In = function() {

        $('.fl4').show();

    };

    var tooltip14Out = function() {

        $('.fl4').hide()

    };

    floor14.hover(tooltip14In,tooltip14Out);



// 5 floor

	var floor15 = paper1.path("m 316.3382,283.57959 0,-86.25 85.58686,-28.08379 -0.0775,-6.24238 276.58104,-92.923827 514.1501,121.229627 0.01,91.71236 -514.77108,-85.69199 z")

	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });

	name: 'Korpus-3';

	floor15.data("id", 'fl15').data("value", "../bc/inner-floor.html");



		var floor15Mark = paper1.circle(1219.7451, 236.71574, 20)

	.attr({

	    "fill": "#000",

	    "fill-opacity" : "0.47",

	    "stroke": "#fff",

	    "stroke-width": "2"

	})

	var floor15Text = labelPath( floor15Mark, "5" );



	var floorSet15 = paper1.set();

	floorSet15.push(floor15Mark, floor15Text, floor15);



 	var s15hoverIn = function() {

        floor15.attr({"opacity" : "0.47",});

        floor15Mark.attr({"fill-opacity" : "1", "fill": "#22c2d9",});

    };

    var s15hoverOut = function() {

        floor15.attr({"opacity" : "0",});

        floor15Mark.attr({"fill-opacity" : "0.47", "fill": "#000",});

    }



    floorSet15.hover(s15hoverIn, s15hoverOut);



    var tooltip15In = function() {

        $('.fl5').show();

    };

    var tooltip15Out = function() {

        $('.fl5').hide()

    };

    floor15.hover(tooltip15In,tooltip15Out);







	floor11.click(function(e) {

		window.location.href = this.data("value");

	});

	floor12.click(function(e) {

		window.location.href = this.data("value");

	});

	floor13.click(function(e) {

		window.location.href = this.data("value");

	});

	floor14.click(function(e) {

		window.location.href = this.data("value");

	});

	floor15.click(function(e) {

		window.location.href = this.data("value");

	});





	// tooltip

	



	$('body').removeClass('svg-container');

});

