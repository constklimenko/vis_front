$(document).ready(function () {





// korpus 

	var daWidth = $('body').innerWidth();

		daHeight = (daWidth * .542);



	var paper1 = Raphael($('#korpus-1')[0], daWidth, daHeight);

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

	var floor11 = paper1.path("m 400.32945,525.3274 -170.96501,-4.23323 0,-49.06706 309.16644,-8.95924 96.4675,-0.54424 76.60255,-1.49668 531.43117,9.07596 0,51.95335 -267.27116,3.46356 -262.93546,2.72144 -77.74384,-0.12377 -145.66891,-2.32533 -0.068,-6.59898 -1.22455,-1.42864 -0.34015,-3.80972 -2.38107,-1.97289 -9.5243,-0.95243 c 0,0 -0.17008,-0.4422 -0.017,-0.4422 0.15307,0 0.76535,0.13606 0.78236,0.034 0.017,-0.10205 0,-2.75524 0,-2.75524 l -4.55806,-0.45921 -8.18069,-6.99015 -35.38227,-0.008 -10.6793,9.81342 -0.19242,7.31195 0,5.96501 0.86589,1.34694 z")

	.attr({fill: "#0dbed6", opacity:"0", stroke:'none' });

	floor11.data("id", 'fl11').data("value", "../bc/inner-floor.html");

	

	var floor11Mark = paper1.circle(189.94167, 497.945, 20)

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

	var floor12 = paper1.path("m 311.36653,417.35847 -82.00209,5.02433 0.006,49.64338 309.40064,-9.0467 97.13919,-0.56554 75.23355,-1.61144 531.87868,9.27831 0.01,-53.8448 -272.29317,-15.18779 -255.39059,-10.45338 -82.65115,1.16518 -78.92467,5.49824 0.0325,5.30998 z")

	.attr({fill: "#0DBED6", opacity:"0",stroke:'none' });

	name: 'Korpus-2';

	floor12.data("id", 'fl12').data("value", "../bc/inner-floor.html");



	var floor12Mark = paper1.circle(189.94167, 445.945, 20)

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

	var floor13 = paper1.path("m 229.36444,422.41001 0,-4.15426 -2.50146,-0.0884 0,-44.28257 326.92128,-35.55521 0,-9.69962 78.89213,-9.01561 81.97084,-0.35355 353.43757,25.27906 174.9473,17.32412 0,54.40303 -270.4696,-15.18743 -257.91527,-10.22422 -81.90834,0.9375 -78.95463,5.60323 0,5.12653 z")

	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });

	name: 'Korpus-3';

	floor13.data("id", 'kor3').data("value", "../bc/inner-floor.html");

	

	var floor13Mark = paper1.circle(189.94167, 394.945, 20)

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

	var floor14 = paper1.path("m 226.86298,374.06158 0,-50.38136 326.92128,-48.96714 -0.006,-1.59099 0.006,1.67938 0,-1.67938 78.89213,-13.25825 81.97084,-0.53033 348.48777,33.58757 179.8971,23.78351 0,45.125 -175.1241,-17.28972 -353.26077,-25.2884 -81.94874,0.35184 -78.91423,9.02666 0,9.19239 z")

	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });

	name: 'Korpus-3';

	floor14.data("id", 'kor3').data("value", "../bc/inner-floor.html");



	var floor14Mark = paper1.circle(189.94167, 343.943, 20)

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

	var floor15 = paper1.path("m 226.88508,323.80056 0,-50.75 326.92128,-61.5 0,-6.25 78.87003,-16.72097 81.97084,0 346.35277,40 180.4239,30 1.6082,0.28988 0.022,58.09324 -181.7532,-23.99744 -346.63167,-33.23402 -81.97084,0.53033 -78.97326,12.87479 0.0527,1.5953 z")

	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });

	name: 'Korpus-3';

	floor15.data("id", 'kor3').data("value", "../bc/inner-floor.html");



	var floor15Mark = paper1.circle(189.94167, 295.943, 20)

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









// 6 floor

	var floor16 = paper1.path("m 226.86298,272.94531 0,-46.09214 406.39552,-93.14858 81.38873,-1.125 311.36467,45.43664 215.412,42.77996 1.6082,0.4084 0,37.625 -182.1952,-30.25523 -346.18967,-39.74477 -81.97084,0 -78.89213,16.67541 0,6.0988 z")

	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });

	name: 'Korpus-3';

	floor16.data("id", 'kor3').data("value", "../bc/inner-floor.html").data("marker", "floor16Mark");



	var floor16Mark = paper1.circle(189.94167, 243.9427, 20)

	.attr({

	    "fill": "#000",

	    "fill-opacity" : "0.47",

	    "stroke": "#fff",

	    "stroke-width": "2"

	})

	var floor16Text = labelPath( floor16Mark, "6" );



	var floorSet16 = paper1.set();

	floorSet16.push(floor16Mark, floor16Text, floor16);



 	var s16hoverIn = function() {

        floor16.attr({"opacity" : "0.47",});

        floor16Mark.attr({"fill-opacity" : "1", "fill": "#22c2d9",});

    };

    var s16hoverOut = function() {

        floor16.attr({"opacity" : "0",});

        floor16Mark.attr({"fill-opacity" : "0.47", "fill": "#000",});

    }

    floorSet16.hover(s16hoverIn, s16hoverOut);



    var tooltip16In = function() {

        $('.fl6').show();

    };

    var tooltip16Out = function() {

        $('.fl6').hide()

    };

    floor16.hover(tooltip16In,tooltip16Out);









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

	floor16.click(function(e) {

		window.location.href = this.data("value");

	});



	$('body').removeClass('svg-container');

});

