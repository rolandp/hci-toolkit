jQuery(document).ready(function ($) {

	i = $('.field-counter').val();
	
	//setup for dynamic enhancement using jquery
	$('.reference-info').slideUp(0);
	$('.show-info').css("visibility","visible");
	$('.close-info').css("visibility","hidden");
	$('.add-more:last').css("visibility","visible");
	
	//reference controls
	$('.close-info').click(function(){
		$('.close-info').css("visibility","hidden");
		$('.reference-info').slideUp(400);
		
		setTimeout(function(){
			$('.show-info').css("visibility","visible");
		},400);
	});

	$('.show-info').click(function(){
		$('.reference-info').slideDown(400);
		$('.show-info').css("visibility","hidden");
		$('.close-info').css("visibility","visible");
	});	
	
	//add more input fields
	$('.add-more').live('mousedown',function(){
		i++;
		path = $(this).parent();
		clone = path.clone().insertAfter(path);
		
		//hide previous add-icon
		$(this).hide();
		
		//set correct values
		clone.find('.reference').attr('name', 'ref-'+i+'');
		clone.find('.reference').val('');
	});
	

});