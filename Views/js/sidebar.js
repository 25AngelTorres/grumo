(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $(".menu-sidebar").on('click',function(e) {
    e.preventDefault();
    $(".sidebar").toggleClass("expand");
  });

	// Toggle the dropdown-toggle
  $(".dropdown-toggle").on('click',function(e) {
    e.preventDefault();
	if($("#menu-"+$(this).attr("id")).hasClass("show")){
		$(".dropdown-menu-sidebar").removeClass("show");
	}else{
		$(".dropdown-menu-sidebar").removeClass("show");
		$("#menu-"+$(this).attr("id")).addClass("show");
	}
  });
  
  

})(jQuery); // End of use strict