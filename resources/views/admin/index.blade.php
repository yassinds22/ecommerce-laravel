<!doctype html>
<html lang="en" dir="rtl">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Eudica - Online Education & Learning Courses HTML CSS Responsive Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="html rtl, html dir rtl, rtl website template, bootstrap 4 rtl template, rtl bootstrap template, admin panel template rtl, admin panel rtl, html5 rtl, academy training course css template, classes online training website templates, courses training html5 template design, education training rwd simple template, educational learning management jquery html, elearning bootstrap education template, professional training center bootstrap html, institute coaching mobile responsive template, marketplace html template premium, learning management system jquery html, clean online course teaching directory template, online learning course management system, online course website template css html, premium lms training web template, training course responsive website"/>

		<!-- Favicon -->
		<link rel="icon" href="{{asset('admin/assets/images/brand/favicon.ico')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/images/brand/favicon.ico')}}" />

		<!-- Title -->
		<title>Eudica - Online Education & Learning Courses HTML CSS Responsive Template</title>

		<!-- Bootstrap css -->
		<link href="{{asset('admin/assets/plugins/bootstrap-4.3.1/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="{{asset('admin/assets/plugins/sidemenu/sidemenu-rtl.css')}}" rel="stylesheet" />

		<!-- Dashboard Css -->
		<link href="{{asset('admin/assets/css/style-rtl.css')}}" rel="stylesheet" />
		<link href="{{asset('admin/assets/css/admin-custom.css')}}" rel="stylesheet" />

		<!-- c3.js')}} Charts Plugin -->
		<link href="{{asset('admin/assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="{{asset('admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

		<!---Font icons-->
		<link href="{{asset('admin/assets/css/icons.css')}}" rel="stylesheet"/>

		<!-- Switcher css -->
		<link  href="{{asset('admin/assets/switcher/css/switcher-rtl.css')}}" rel="stylesheet" id="switcher-css" type="text/css" media="all"/>

		<!-- Color Skin css -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('admin/assets/color-skins/color6.css')}}" />

	</head>

	<body class="app sidebar-mini">
		<!--Loader-->
		<div id="global-loader">
			<img src="{{asset('admin/assets/images/loader.svg')}}" class="loader-img" alt="">
		</div>
		<!--/Loader-->

		<!--Page-->
		<div class="page">
			<div class="page-main">

				<!--App-Header-->
				@include('admin.layout.header')
				<!--/App-Header-->

				<!-- Sidebar menu-->
				@include('admin.layout.slider')
				<!-- /Sidebar menu-->

				<!--App-Content-->
				<div class="app-content  my-3 my-md-5">
					<div class="side-app">

						<!--Page-Header-->
						<div class="page-header">
							<h4 class="page-title">Dashboard 02</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard 02</li>
							</ol>
						</div>
						<!--/Page-Header-->

						@yield('content')
						
						<!--/Page-Header-->

					
					</div>
				</div>
			</div>

			<!--Footer-->
		@include('admin.layout.footer')
			<!--/Footer-->
		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-long-arrow-up"></i></a>

		<!-- JQuery js-->
		<script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>

		<!-- Bootstrap js -->
		<script src="{{asset('admin/assets/plugins/bootstrap-4.3.1/js/popper.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/bootstrap-4.3.1/js/bootstrap.min.js')}}"></script>

		<!--JQuery Sparkline Js-->
		<script src="{{asset('admin/assets/js/jquery.sparkline.min.js')}}"></script>

		<!-- Circle Progress Js-->
		<script src="{{asset('admin/assets/js/circle-progress.min.js')}}"></script>

		<!-- Star Rating Js-->
		<script src="{{asset('admin/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!-- Fullside-menu Js-->
		<script src="{{asset('admin/assets/plugins/sidemenu/sidemenu.js')}}"></script>

		<!-- Custom scroll bar Js-->
		<script src="{{asset('admin/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!--Counters -->
		<script src="{{asset('admin/assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/counters/waypoints.min.js')}}"></script>

		<!-- CHARTJS CHART -->
		<script src="{{asset('admin/assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/chart/utils.js')}}"></script>

		<!--Morris.js')}} Charts Plugin -->
		<script src="{{asset('admin/assets/plugins/morris/raphael-min.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/morris/morris.js')}}"></script>

		<!-- Index Scripts -->
		<script src="{{asset('admin/assets/js/index2.js')}}"></script>


		<!-- Custom Js-->
		<script src="{{asset('admin/assets/js/admin-custom.js')}}"></script>

	</body>
</html>