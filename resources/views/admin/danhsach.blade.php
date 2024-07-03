@extends('layouts')
@section('content')
<div class="card" style="margin-top:50px">
  <div class="card-body">
    <a href="{{route('admin.themmoi')}}"><button type="button" class="btn btn-secondary">Thêm mới</button> </a>
    <table class="table table-striped col-md-6">
      <tr style="height:50px">
        <td>Tên đăng nhập</td>
        <!-- <td>Mật khẩu</td> -->
        <td>Tên admin</td>
        <td>Số điện thoại</td>
        <td>Email</td>
        <td>Địa chỉ</td>
        <td>Ảnh đại diện</td>
        <td>Trạng thái</td>
        <th>Hành động</th>
      </tr>

      @foreach($DSAdmin as $item)
      <tr>
        <td>{{$item->ten_dang_nhap}}</td>
        <td>{{$item->ten_admin}}</td>
        <td>{{$item->so_dien_thoai}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->dia_chi}}</td>
        <td><img src="{{ asset('storage/' . $item->anh_dai_dien) }}" alt="Avatar" style="width: 100px;"></td>                   
        <td>{{ $item->trang_thai ? 'Hoạt động' : 'Không hoạt động' }}</td>

        <td><a href="{{route('admin.capnhat', ['ten_dang_nhap'=>$item->ten_dang_nhap])}}"><button type="button" class="btn btn-primary">Cập nhật</button></a>
          <a href="{{route('xuly.xoa', ['ten_dang_nhap'=>$item->ten_dang_nhap])}}"><button type="submit" class="btn btn-danger">Xóa</button></a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection