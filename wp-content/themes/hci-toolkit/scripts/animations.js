$(document).ready(function () {

	//show counter for new comments
	var plus = 0;
	if (newComments > 1){newComments = 9; plus=1}
	if (newComments > 0){
		if (plus == 1){
			newComments = '9+';
		}
		//page-item-34 is hardcoded, aanpassen bij nieuwe server
		$('.page-item-34').append('<div class="new-comments">'+newComments+'</div>').css({'margin-top':'200px'});
		$('.page-item-34').css({'margin-right':'-10px'});
	};

	//keep tabs on current window width for tips on submit-a-method page
	var width = $(window).width();
	$(window).resize(function(){
		width = $(this).width();
	})

	$('.feedback').fadeOut('fast');
	$('.feedback-small').fadeOut('fast');
	$('.block-info-content').slideUp('fast');
	var i = 1;
	var j = 1;
	var tips = '';
	var oldTip = '';
	var states = {};
	clearMePrevious = '';

// SUBMIT A METHOD

	function feedback( message ) {
		$('.feedback-small').fadeOut('slow', function(){
			$(this).empty();
			$(this).fadeIn('slow');
			$( "<span/>" ).text( message ).prependTo( ".feedback-small:first" );
		});
	}

	// autocomplete submit method name
	$('.autocomplete').autocomplete({
		source: templateDir+'/scripts/methodlist.php',
		minLength: 2,
		autoFocus: true,
		select: function( event, ui ) {
			feedback( ui.item ?
				"The method " + ui.item.value + " already exists. If you want to suggest additions or alterations to the method please use the comment form at the bottom of the methods page. ":
				"Nothing selected, input was " + this.value );
		},
		change: function (event, ui) {
			$('.feedback-small').fadeOut('slow');
		}
	});
	
	//add more input fields REFERENCE
	$(document).on('mousedown', '.add-more', function(){
		i++;
		$('.add-more').hide();
		path = $('.add-more:last').parent();
		clone = path.clone().insertAfter(path);
		
		//hide previous add-icon
		clone.find('.add-more').show();
		
		//set correct values
		clone.find('.reference').attr('name', 'ref-'+i+'');
		clone.find('.reference').val('');
	});
	
	//add more input fields MEDIA
	$(document).on('mousedown', '.add-more2', function(){
		j++;
		$('.add-more2').hide();
		path = $('.add-more2:last').parent();
		clone = path.clone().insertAfter(path);
		
		//hide previous add-icon
		clone.find('.add-more2').show();
		
		//set correct values
		clone.find('.media').attr('name', 'ref-'+i+'');
		clone.find('.media').val('');
	});	

	$('.info').click(function(){
		tips = $(this).attr('title');
		if (states[tips] == true){ //weg halen
			if (tips == 'ref' || tips == 'media'){
				$(this).parent().find('.block-info-content').slideUp('fast');
				oldTip = '';
				states[tips] = false;			
			}
			else {
				$(this).parent().find('.info-content').animate({'left':'70px'});
				}
			oldTip = '';
			states[tips] = false;
			//_gaq.push(['_trackEvent', 'Submit a method', tips, 'open tips']);	
		}
		else{ //uitklappen
			if (tips == 'ref' || tips == 'media'){
				$(this).parent().find('.block-info-content').slideDown('fast');
				oldTip = tips;
				states[tips] = true;				
			}
			else {
					$(this).parent().find('.info-content').animate({'left':'445px'});
				}
			oldTip = tips;
			states[tips] = true;
			//_gaq.push(['_trackEvent', 'Submit a method', tips, 'close tips']);	
		}
	});	
	
// OVERALL

	//INPUT
	// input value weghalen
	$(document).on('focus', 'input[type="text"]', function(){
		if($(this).val()==$(this).attr('title')){
			clearMePrevious = $(this).val();
			$(this).val('');
			$(this).removeClass('input-example');
		}
	});

	// input value herstellen
	$(document).on('blur', 'input[type="text"]', function(){
		if($(this).val()=='') {
			$(this).val(clearMePrevious);
			$(this).addClass('input-example');
		}
	});
});