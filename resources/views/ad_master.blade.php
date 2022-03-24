<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	@include('ad_headtop')
</head>

<body>

	<!-- Start Header Area -->
	@include('ad_menu')
	<!-- End Header Area -->

	@yield('ad_content')

	<!-- start footer Area -->
	@include('ad_footer')
	<!-- End footer Area -->


</body>

</html>