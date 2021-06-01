$(document).ready(function () {

	

// korpus 



	var daWidth = 900;

		daHeight = (daWidth * .7711);



	var paper1 = Raphael($('#floor')[0], 900, 694);

	var attr = {stroke:'none'};



	$('.controls-box').css({'height':daHeight})



	paper1.setViewBox(0, 0, 900, 694, true); 

	paper1.canvas.setAttribute('preserveAspectRatio', 'none'); // there's no method in Raphaël for doing this directly



	

	$(window).resize(function(){

		if ($('body').width() < 960) {	

	     	var daWidth = $('body').innerWidth();

			daHeight = (daWidth * .7711);

			// setsize is a very handy method that, i believe, is new to Raphaël 2.0

			// it's great for being responsive in our designs.

			paper1.setSize(daWidth,daHeight);

		}



	});  

	  



	function labelPath( pathObj, text, textattr ){

		if ( textattr == undefined )

        textattr = { 'font-size': 16, fill: '#fff', stroke: 'none', 'font-family': 'Roboto,sans-serif', 'font-weight': 700 };

	    var bbox = pathObj.getBBox();

	    var textObj = pathObj.paper.text( bbox.x + bbox.width / 2, bbox.y + bbox.height / 2, text ).attr( textattr );

	    return textObj;

	};



	var office11 = paper1.path("m 226.2733,529.84859 0,-89.20777 39.81807,-0.21523 0.004,6.08645 23.99527,-3.1e-4 66.64302,-8.1e-4 -0.4375,74.38625 -1.85296,0 -0.1875,9.53393 -80.56826,-0.005 1e-5,-9.0735 -7.47762,-0.0708 0.0552,9.1236 -39.97389,-0.13085 z")

	.attr({fill: "#0dbed6", opacity:"0.4", stroke:'none' });

	office11.data("id", 'fl11');

	office11.data("value", "../inner-press.html");

	var office11Text = labelPath( office11, "46 м2" );



	var office11set = paper1.set();

	office11set.push(office11,  office11Text);



 	var s15hoverIn = function() {

        office11.attr({"opacity" : "0.7",});

    };

    var s15hoverOut = function() {

        office11.attr({"opacity" : "0.4",});

    }



    office11set.hover(s15hoverIn, s15hoverOut);





	var office11In = function() {

        $('.0ff11').show();

    };

    var office11Out = function() {

        $('.0ff11').hide()

    };

   	office11set.hover(office11In,office11Out);



	

	office11.click(function(e) {

		window.location.href = this.data("value");

	});



	$('body').removeClass('svg-container');

});

