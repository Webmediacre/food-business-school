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
		b.siblings().removeClass('is-checked');
		b.addClass('is-checked');
		var filterString = $('.aud_buttons .is-checked').data('filter');
		$container.isotope({ filter: filterString.replace(/\*/g, '') });
		if(b.index() == 0){
			b.parent().siblings('button').html(b.parent().siblings('button').data('original'));
		} else {
			b.parent().siblings('button').html(b.text() + ' <span class="caret"></span>');
		}
		var aud = b.data('filter');
		var qString = '';
		if(aud != '*') qString = '?aud=' + aud.slice(1);
		window.history.replaceState('', 'changeUrl', location.protocol + '//' + location.hostname + location.pathname + qString);
	}
	$('#courseFilter ul button').click(setURL);

	if(location.search){
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
		if(audParam) {
			$('.aud_buttons .is-checked').click();
		}
	}

});
