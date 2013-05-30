$(document).ready(function(){
	$(".btnContact").click(function(){
		$(".wrContact").css("visibility", "visible");
	});
	$(".btnClose,.wrContact").click(function(){
		$(".wrContact").css("visibility", "hidden");
	});	
	$("#galeria").carouFredSel({
		scroll : {
			items : 1,	
			fx:"crossfade"
		},
		auto : {
			duration	: 2000,
			timeoutDuration: 2000,
			pauseOnHover: true
		},
		pagination	: ".pagination",
		prev: '.prev',
		next: '.next',
	});
	
	$("#project-slider").find(".slide").find("div").show();
	
	
});