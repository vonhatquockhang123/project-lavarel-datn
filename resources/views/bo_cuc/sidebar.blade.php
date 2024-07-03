<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">
            <div class="user_img"><img class="img-responsive" src="{{asset('$user->anh_dai_dien')}}" alt="#" /></div>
            <div class="user_info">
               <h6>{{$user->ten_admin}}</h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <h4>Menu</h4>
      <ul class="list-unstyled components">
         <li class="active">
            <ul class="collapse list-unstyled" id="dashboard">
            </ul>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{route('admin.danhsach')}}">
               <span data-feather="users" class="align-text-bottom"></span>
               Quản lý Admin
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{route('khach-hang.danh-sach')}}">
               <span data-feather="users" class="align-text-bottom"></span>
               Quản lý khách hàng
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{route('loai-sach.danh-sach')}}">
               <span data-feather="box" class="align-text-bottom"></span>
               Quản lý loại sách
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{route('combo.danh-sach')}}">
               <span data-feather="box" class="align-text-bottom"></span>
               Quản lý Combo
            </a>
         </li>
         <li>
         <li class="nav-item">
            <a class="nav-link" href="{{route('nha-xuat-ban.danh-sach')}}">
               <span data-feather="box" class="align-text-bottom"></span>
               Quản lý Nhà Xuất Bản
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{route('sach.danh-sach')}}">
               <span data-feather="users" class="align-text-bottom"></span>
               Quản lý Sách
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{route('tac-gia.danh-sach')}}">
               <span data-feather="users" class="align-text-bottom"></span>
               Quản lý Tác giả
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="{{route('phieu-nhap-hang.danh-sach')}}">
               <span data-feather="users" class="align-text-bottom"></span>
               Phiếu Nhập Hàng
            </a>
         </li>
         <li>
            <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Đánh giá</span></a>
            <ul class="collapse list-unstyled" id="element">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('danh-gia-combo.danh-sach')}}">
                     <span data-feather="users" class="align-text-bottom"></span>
                     Đánh giá combo
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{route('danh-gia-sach.danh-sach')}}">
                     <span data-feather="users" class="align-text-bottom"></span>
                     Đánh giá Sách
                  </a>
               </li>
            </ul>
         <li>
            <a href="contact.html">
               <i class="fa fa-paper-plane red_color"></i> <span>Kết nối với chúng tôi</span></a>
         </li>
         <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Thống kê</span></a></li>
      </ul>
   </div>
</nav>