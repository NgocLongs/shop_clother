<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<base href="{{ asset('') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="iassets/user/mages/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="assets/user/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/user/css/main.css">
	<link rel="stylesheet" type="text/css" href="assets/user/css/style.css">
	<script src="assets/user/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<script type="text/javascript" src="assets/user/js/cart.js"></script>

	<link href="assets/user/css/app.css" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="assets/user/css/preview.css" rel="stylesheet">
</head>
<body class="animsition">
	
	<!-- Header -->
	@include('user.layouts.header')

		@yield('content')

	<!-- Footer -->
	@include('user.layouts.footer')


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=943790589307662&autoLogAppEvents=1"></script>
	<script src="assets/user/vendor/animsition/js/animsition.min.js"></script>
	<script src="assets/user/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/user/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/user/vendor/select2/select2.min.js"></script>
	<script src="assets/user/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/user/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="assets/user/vendor/slick/slick.min.js"></script>
	<script src="assets/user/js/slick-custom.js"></script>
	<script src="assets/user/vendor/parallax100/parallax100.js"></script>
	<script src="assets/user/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script src="assets/user/vendor/isotope/isotope.pkgd.min.js"></script>
	<script src="assets/user/vendor/sweetalert/sweetalert.min.js"></script>
	<script src="assets/user/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="assets/user/js/main.js"></script>
	<!-- Subiz -->
<script>
(function(s, u, b, i, z){
  u[i]=u[i]||function(){
    u[i].t=+new Date();
    (u[i].q=u[i].q||[]).push(arguments);
  };
  z=s.createElement('script');
  var zz=s.getElementsByTagName('script')[0];
  z.async=1; z.src=b; z.id='subiz-script';
  zz.parentNode.insertBefore(z,zz);
})(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');
subiz('setAccount', 'acqmctnwjyyktiptpxmv');
</script>
<!-- End Subiz -->

<!-- Live Search -->
<script>
	$(document).ready(function() {
		$("#search").keyup(function(e) {
			e.preventDefault();
			var query = $(this).val();
			var _token = $('input[name="_token"]').val();

			if(query != '' && query.length > 1) {
				$.ajax({
					url: "{{ route('live_search') }}",
					method: "GET",
					data: {query:query, _token:_token},
					success: function(data) {
						$("#result_search").fadeIn();
						$("#result_search").html(data);
					}
				})
			} else {
				$("#result_search").fadeOut();
			}
		});

		$(window).scroll(function() {
			var height = $(this).scrollTop();
			if (height > 0) {
				$("#search").css({"top": "12px"});
			} else {
				$("#search").css({"top": "52px"});
			}
		})

		// Load more product
		var pageNum = 2;
		$(document).ready(function() {
			$("#load_more").on('click', function(){
				var url = window.location.href;
				var id = $("#product_id").val();
				console.log(id);
				var _token = $("input[name='_token']").val();
				$.ajax({
					url: "load-more?page=" + pageNum,
					method: "GET",
					data: {_token:_token},
					success: function(data) {
						pageNum += 1;
						console.log(data.length);
						if (data.length != 0) {
							$("#more_data").append(data);
						}
						if (data.length < 6000) {
							$("#load_more").fadeOut();
						}
					}
				})
			});
		});

		// Add to cart ajax
		$(document).ready(function() {
			var count_cart = $("#count_cart").val();
			$(".container").on('click', '#add_to_cart button', function(event) {
				event.preventDefault();
				var id = $(this).data("id");
				count_cart++;
				console.log(count_cart);
				$.ajax({
					url:"cart/add/" + id,
					method:"GET",
					data:{id:id},
					success: function(data) {
						// location.reload();
						$("#count_item_cart").attr('data-notify', count_cart);
					}
				})
			})
		})

		// Lazy loading image
		$("img.lazy").lazyload();

		// $("#load_more").on('click',function() {
		// 	$("img.lazy").lazyload();
		// })

	});
</script>
<!-- End Live search -->

<style>
	#search {
		position: fixed;
		right: 18%;
		width: 280px;
		top: 55px;
		border-radius: 21px;
		border: 1px solid rgb(106, 145, 190);
	}
	#result_search {
		position: absolute;
		right: 20%;
		top: 64px;
	}
</style>

</body>
</html>