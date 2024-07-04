@extends('layouts')

@section('content')
<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <h3>Thêm mới khu vực vận chuyển</h3>
        <form method="POST" action="{{ route('khu-vuc-van-chuyen.xu-ly-them-moi') }}">
            @csrf
            <div class="form-group">
                <div class="mb-3">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ old('id') }}" required>
                </div>
                <div class="mb-3">
                    <label for="don_hang_id">Đơn hàng ID</label>
                    <select class="form-control" id="don_hang_id" name="don_hang_id" required>
                        @foreach($dsDonHang as $donHang)
                            <option value="{{ $donHang->id }}">{{ $donHang->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ten_khu_vuc">Tên khu vực</label>
                    <input type="text" class="form-control" id="ten_khu_vuc" name="ten_khu_vuc" value="{{ old('ten_khu_vuc') }}" readonly>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('don_hang_id').addEventListener('change', function() {
        var selectedId = this.value;
        var selectedDonHang = {!! json_encode($dsDonHang) !!};
        var selectedDonHangData = selectedDonHang.find(function(donHang) {
            return donHang.id == selectedId;
        });
        if (selectedDonHangData) {
            document.getElementById('khu_vuc_giao_hang').value = selectedDonHangData.khu_vuc_giao_hang;
        } else {
            document.getElementById('khu_vuc_giao_hang').value = '';
        }
    });
</script>
@endsection