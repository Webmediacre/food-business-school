jQuery(function($){

	var $container = $('.isotope').isotope({ itemSelector: '.item' });

	$container.isotope('on', 'layoutComplete', function(isoInstance, layedOutItems){
		var noResults = true;
		for(var i=0; i<layedOutItems.length; i++){
			if(layedOutItems[i].element.style.display != 'none'){
				noResults = false;
				break;
			}
		}
		if(noResults){
			$('#no_results').show();
		} else {
			$('#no_results').hide();
		}
	});

	function getQueryStringParams(sParam){
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		var val = false;
		for(var i=0; i<sURLVariables.length; i++){
			var sParameterName = sURLVariables[i].split('=');
			if(sParameterName[0] == sParam){
				val = sParameterName[1];
			}
		}
		return val;
	}

	function setURL(){
		var b = $(this);
		var type, aud, clickedButton, otherButton;
		b.siblings().removeClass('is-checked');
		b.addClass('is-checked');
		var filterString = $('.type_buttons .is-checked').data('filter') + $('.aud_buttons .is-checked').data('filter');
		$container.isotope({ filter: filterString.replace(/\*/g, '') });
		if(b.index() == 0){
			b.parent().siblings('button').html(b.parent().siblings('button').data('original'));
		} else {
			b.parent().siblings('button').html(b.text() + ' <span style="position:absolute; right:40px; top:12px; ' + b.data('pos') + '" class="courseIcon"></span><span class="caret"></span>');
		}
		clickedButton = b.data('filter');
		otherButton = b.parent().parent().siblings('.btn-group').find('button.is-checked');
		if(otherButton.index() == 0){
			otherButton.parent().siblings('button').html(otherButton.parent().siblings('button').data('original'));
		} else {
			otherButton.parent().siblings('button').html(otherButton.text() + ' <span style="position:absolute; right:40px; top:12px; ' + otherButton.data('pos') + '" class="courseIcon"></span><span class="caret"></span>');
		}
		otherButton = otherButton.data('filter');
		if(b.parent().hasClass('type_buttons')){
			type = clickedButton;
			aud = otherButton;
		} else {
			type = otherButton;
			aud = clickedButton;
		}
		var qString = '';
		if(type != '*') qString = 'type=' + type.slice(1);
		if(aud != '*'){
			if(type != '*'){
				qString += '&aud=' + aud.slice(1);
			} else {
				qString += 'aud=' + aud.slice(1);
			}
		}
		if(type != '*' || aud != '*'){
			qString = '?' + qString;
		}
		window.history.replaceState('', 'changeUrl', location.protocol + '//' + location.hostname + location.pathname + qString);
	}
	$('#courseFilter ul button').click(setURL);
	
	if(location.search){
		var typeParam = getQueryStringParams('type');
		if(typeParam){
			$('.type_buttons button').each(function(){
				if($(this).data('filter') == '.' + typeParam){
					$(this).addClass('is-checked');
				} else {
					$(this).removeClass('is-checked');
				}
			});
		}
		var audParam = getQueryStringParams('aud');
		if(audParam){
			$('.aud_buttons button').each(function(){
				if($(this).data('filter') == '.' + audParam){
					$(this).addClass('is-checked');
				} else {
					$(this).removeClass('is-checked');
				}
			});
		}
		if(typeParam){
			$('.type_buttons .is-checked').click();
		} else if(audParam) {
			$('.aud_buttons .is-checked').click();
		}
	}

});

