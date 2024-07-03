@extends('layouts')
@section('content')

<head>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
</head>

<body>
   <div class="full_container">
      <div class="inner_container">
         <!-- right content -->
         <div id="content">
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Thông tin tài khoản</h2>
                        </div>
                     </div>
                  </div>
                  <!-- row -->
                  <div class="row column1">
                     <div class="col-md-2"></div>
                     <div class="col-md-8">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Tài khoản</h2>
                              </div>
                           </div>
                           <div class="full price_table padding_infor_info">
                              <div class="row">
                                 <!-- user profile section -->
                                 <!-- profile image -->
                                 <div class="col-lg-12">
                                    <div class="full dis_flex center_text">
                                       <div class="profile_img"><img width="180" class="rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /></div>
                                       <div class="profile_contant">
                                          <div class="contact_inner">
                                             <h3>{{$user->ten_admin}}</h3>
                                             <p><strong>Chức vụ: </strong>Quản trị viên</p>
                                             <ul class="list-unstyled">
                                                <li><i class="fa fa-envelope-o"></i> : {{ $user->email }}</li>
                                                <li><i class="fa fa-phone"></i> : {{$user->so_dien_thoai}}</li>
                                                <li><i class="bi bi-house"></i> : {{ $user->dia_chi }}</li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- profile contant section -->
                                    <div class="full inner_elements margin_top_30">
                                       <div class="tab_style2">
                                          <div class="tabbar">
                                             <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                   <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#project_worked" role="tab" aria-selected="false">Đổi mật khẩu</a>
                                                   <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#profile_section" role="tab" aria-selected="false">Sửa tài khoản</a>
                                                </div>
                                             </nav>
                                             <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade" id="project_worked" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                   <div class="container">
                                                      @if (session('status'))
                                                      <div class="alert alert-success">
                                                         {{ session('status') }}
                                                      </div>
                                                      @endif

                                                      @if (session('error'))
                                                      <div class="alert alert-danger">
                                                         {{ session('error') }}
                                                      </div>
                                                      @endif
                                                      <div class="container">
                                                         <div class="card-body">
                                                            @if (session('status'))
                                                            <div class="alert alert-success" role="alert">
                                                               {{ session('status') }}
                                                            </div>
                                                            @endif

                                                            <form method="POST" action="{{ route('matkhau.update') }}">
                                                               @csrf
                                                               <div class="form-group row">
                                                                  <label for="mat_khau" class="col-md-4 col-form-label text-md-right">Mật khẩu hiện tại</label>

                                                                  <div class="col-md-6">
                                                                     <input id="mat_khau" type="password" class="form-control @error('mat_khau') is-invalid @enderror" name="mat_khau" required>

                                                                     @error('mat_khau')
                                                                     <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                     </span>
                                                                     @enderror
                                                                  </div>
                                                               </div>

                                                               <div class="form-group row">
                                                                  <label for="mat_khau_moi" class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>

                                                                  <div class="col-md-6">
                                                                     <input id="mat_khau_moi" type="password" class="form-control @error('mat_khau_moi') is-invalid @enderror" name="mat_khau_moi" required>

                                                                     @error('mat_khau_moi')
                                                                     <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                     </span>
                                                                     @enderror
                                                                  </div>
                                                               </div>

                                                               <div class="form-group row">
                                                                  <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">Xác nhận mật khẩu mới</label>

                                                                  <div class="col-md-6">
                                                                     <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                                                                  </div>
                                                               </div>

                                                               <div class="form-group row mb-0">
                                                                  <div class="col-md-8 offset-md-4">
                                                                     <button type="submit" class="btn btn-primary">
                                                                        Đổi mật khẩu
                                                                     </button>
                                                                  </div>
                                                               </div>
                                                            </form>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="tab-pane fade" id="profile_section" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                   <div class="card">
                                                      <div class="card-body">
                                                         <h5 class="card-title">Cập nhật thông tin Admin</h5>
                                                         <form action="{{ route('xuly.capnhat', $admin->ten_dang_nhap) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                               <label for="ten_admin" class="form-label">Tên admin</label>
                                                               <input type="text" class="form-control" id="ten_admin" name="ten_admin" value="{{ $admin->ten_admin }}">
                                                            </div>
                                                            <div class="mb-3">
                                                               <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                                               <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="{{ $admin->so_dien_thoai }}">
                                                            </div>
                                                            <div class="mb-3">
                                                               <label for="email" class="form-label">Email</label>
                                                               <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}">
                                                            </div>
                                                            <div class="mb-3">
                                                               <label for="dia_chi" class="form-label">Địa chỉ</label>
                                                               <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ $admin->dia_chi }}">
                                                            </div>
                                                            <div class="mb-3">
                                                               <label for="anh_dai_dien" class="form-label">Ảnh đại diện</label>
                                                               <input type="file" class="form-control" id="anh_dai_dien" name="anh_dai_dien">
                                                            </div>
                                                            <div class="mb-3">
                                                               <label for="trang_thai" class="form-label">Trạng thái</label>
                                                               <select class="form-select" id="trang_thai" name="trang_thai">
                                                                  <option value="1" {{ old('trang_thai', $admin->trang_thai) == 1 ? 'selected' : '' }}>Hoạt động</option>
                                                                  <option value="0" {{ old('trang_thai', $admin->trang_thai) == 0 ? 'selected' : '' }}>Không hoạt động</option>
                                                               </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                         </form>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- end user profile section -->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-2"></div>
                           </div>
                           <!-- end row -->
                        </div>
                     </div>
                     <!-- end dashboard inner -->
                  </div>
               </div>
            </div>
         </div>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection