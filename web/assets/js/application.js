$(document).ready(function() {
	setTimeout(function(){
		if ($("#error_msg_cont").length) {
			if ($("#error_msg_cont").css('display') != 'none') {
				$("#error_msg_cont").slideUp();
			}
		}
	},2000);

	$(".dropdown-chosen").chosen({
		allow_single_deselect: true
	});
});