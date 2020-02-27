
$(document).ready(function () {
	$('#section1').hide()
	
	$('#btn1').click(function () {
		$('#section1').hide('slow')
		$('#section2').show('slow')
	})
	$('#btn2').click(function () {
		$('#section2').hide('slow')
		$('#section1').show('slow')
	})
})