$(function () {
	$('#slider-container').slider({
		range: true,
		min: 0,
		max: 1000,
		values: [0, 1000],
		create: function () {
//              $("#amount").val("$299 - $1099");
			$('#min').val('0 AED');
			$('#max').val('1000 AED');
		},
		slide: function (event, ui) {
			$('#min').val(ui.values[0] + " AED" );
			$('#max').val(ui.values[1] + " AED" );

		}
	})
});

function filterSystem(minPrice, maxPrice) {
	$("#computers div.system").hide().filter(function () {
		var price = parseInt($(this).data("price"), 10);
		return price >= minPrice && price <= maxPrice;
	}).show();
}