<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar doc-sidebar">
					<div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body">
							<div>
								<img src="{{asset('admin/assets/images/users/male/25.jpg')}}" alt="user-img" class="avatar avatar-lg brround">
								<a href="editprofile.html" class="profile-img">
									<span class="fa fa-pencil" aria-hidden="true"></span>
								</a>
							</div>
							<div class="user-info">
								<h2>Rubin Carmody</h2>
								<span>Web Designer</span>
							</div>
						</div>
					</div>
					<ul class="side-menu">
					
							<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Admin settings</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<li><a class="slide-item" href="{{route('addCatgory')}}">أضافة صنف</a></li>
								<li><a class="slide-item" href="{{route('listCatgory')}}"> كل الأصناف</a></li>
								

							</ul>
						</li>

                        <li class="slide">
							<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">Admin settings</span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">

								<li><a class="slide-item" href="{{route('addProduct')}}">أضافة منتج</a></li>
								<li><a class="slide-item" href="{{route('listProduct')}}"> قائمة المنتجات</a></li>

							</ul>
						</li>
					
						
					</ul>
				</aside>