LOADSQUARES = ->
	if($('.logoNevada').css('opacity') == '0')
		$('.logoNevada').delay(500).animate(
			left: 0
			opacity: 1
			, 200)
	else
		$('.logoNevada').delay(500).animate(
			left: 50
			opacity: 0
			, 200)

	if($('.cuadro-botitas').css('opacity') == '0')
		$('.cuadro-botitas').delay(800).animate(
			top: 0
			opacity: 1
			, 200)
	else
		$('.cuadro-botitas').delay(800).animate(
			top: 50
			opacity: 0
			, 200)

	if($('.btn-todoterreno').css('opacity') == '0')
		$('.btn-todoterreno').delay(1100).animate(
			left: 536
			opacity: 1
			, 200)
	else
		$('.btn-todoterreno').delay(1100).animate(
			left: 586
			opacity: 0
			, 200)

	if($('.cuadro-botitas2').css('opacity') == '0')
		$('.cuadro-botitas2').delay(1400).animate(
			top: 108
			opacity: 1
			, 200)
	else
		$('.cuadro-botitas2').delay(1400).animate(
			top: 68
			opacity: 0
			, 200)

	if($('.cuadro-wero').css('opacity') == '0')
		$('.cuadro-wero').delay(1700).animate(
			left: 779
			opacity: 1
			, 200)
	else
		$('.cuadro-wero').delay(1700).animate(
			left: 729
			opacity: 0
			, 200)

	if($('.btn-ninos').css('opacity') == '0')
		$('.btn-ninos').delay(500).animate(
			left: 897
			opacity: 1
			, 200)
	else
		$('.btn-ninos').delay(500).animate(
			left: 847
			opacity: 0
			, 200)

	if($('.cuadro-ninos').css('opacity') == '0')
		$('.cuadro-ninos').delay(800).animate(
			top: 401
			opacity: 1
			, 200)
	else
		$('.cuadro-ninos').delay(800).animate(
			top: 351
			opacity: 0
			, 200)

	if($('.cuadro-cacles').css('opacity') == '0')
		$('.cuadro-cacles').delay(1100).animate(
			left: 536
			opacity: 1
			, 200)
	else
		$('.cuadro-cacles').delay(1100).animate(
			left: 586
			opacity: 0
			, 200)

	if($('.cuadro-calle').css('opacity') == '0')
		$('.cuadro-calle').delay(1400).animate(
			top: 530
			opacity: 1
			, 200)
	else
		$('.cuadro-calle').delay(1400).animate(
			top: 480
			opacity: 0
			, 200)

LINKHOME = ->
	$('.scr').click ->
		hr = $(this).attr('href')
		yeah = ->
			$('#container-squares').fadeOut(->
				$('#container-home').load(hr)
				)
		LOADSQUARES()
		setTimeout yeah, 3000
		return false


LINKSCROLL = ->
	$('.scr').click ->
		hr = $(this).attr('href')
		$.scrollTo(hr, 800)
		return false


MENUALTERNO = ->
	$(window).scroll ->
		topwin = $(this).scrollTop()
		if (topwin > 604)
			$('.nav-home').show()
		else
			$('.nav-home').hide()
		return false

$(document).ready ->
	LINKHOME()
	LOADSQUARES()
	# MENUALTERNO()
	return false