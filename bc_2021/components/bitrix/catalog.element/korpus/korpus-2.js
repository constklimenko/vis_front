$(document).ready(function () {
	
// korpus 

	var daWidth = $('body').innerWidth();
		daHeight = (daWidth * .542);

	var paper1 = Raphael($('#korpus-2')[0], daWidth, daHeight);
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
	var floor11 = paper1.path("m 724.26822,542.83761 516.83968,-0.0378 0,-55.24091 -516.83968,-4.7563 z")
	.attr({fill: "#0dbed6", opacity:"0", stroke:'none' });
	floor11.data("id", 'fl11').data("value", "korpus-2/1.html");

	var floor11Mark = paper1.circle(1277.7177, 515.90332, 20)
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
	var floor12 = paper1.path("m 724.26822,483.20495 0,-67.48643 516.83968,11.66719 0,60.17321 z")
	.attr({fill: "#0DBED6", opacity:"0",stroke:'none' });
	name: 'Korpus-2';
	floor12.data("id", 'fl12').data("value", "korpus-2/2.html");

	var floor12Mark = paper1.circle(1277.7177, 459.75864, 20)
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
	var floor13 = paper1.path("m 724.26822,415.73228 0,-69.1629 516.83968,22.34403 0,58.64245 -516.83968,-11.83734")
	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });
	name: 'Korpus-3';
	floor13.data("id", 'fl13').data("value", "korpus-2/3.html");

	var floor13Mark = paper1.circle(1277.31097, 399.89624, 20)
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
	var floor14 = paper1.path("m 724.26822,346.54533 0,-5.21939 2.79009,-6.68659 0,-2.69387 c 0,0 2.26094,0.38484 2.26094,0 0,-0.38484 0,-3.8484 0,-3.8484 l -101.69388,-21.21429 -147.05664,-7.56477 0,-36.94066 c 0,0 760.53917,46.94117 760.53917,47.48542 0,0.54424 0,58.91457 0,58.91457 z")
	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });
	name: 'Korpus-3';
	floor14.data("id", 'fl14').data("value", "korpus-2/4.html");


	var floor14Mark = paper1.circle(1277.6041, 336.64343, 20)
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
	var floor15 = paper1.path("m 480.56873,262.51342 0,-72.79283 760.53917,60.92751 0,59.07289 z")
	.attr({fill: "#0DBED6", opacity:"0", stroke:'none' });
	name: 'Korpus-3';
	floor15.data("id", 'fl15').data("value", "korpus-2/5.html");

	var floor15Mark = paper1.circle(1277.7177, 281.35257, 20)
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


	$('body').removeClass('svg-container');
});
