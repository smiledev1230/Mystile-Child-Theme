jQuery(document).ready(function($) {
    $('#top ul.nav .search').hover(
	   function () {
	      $(".search-box-list").show();
	   }, 
	   function () {
		    $('#top ul.nav li.search-box-list').hover(
			   function () {
			      $(".search-box-list").show();
			   }, 
			   function () {
			      $(".search-box-list").hide();
			   }
			);
	   }
	);
});
