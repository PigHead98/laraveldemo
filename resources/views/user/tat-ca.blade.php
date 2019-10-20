<form method="get" action="{{route('admin/khach-hang/tat-ca')}}">
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" name="searchUser" class="form-control" id="searchUser" aria-describedby="searchUser" placeholder="Tìm">
        </div>
        <button type="submit" class="btn btn-primary">Tìm</button>
    </div>
</form>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Tên khách hàng</th>
        <th scope="col">CMND</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Mã Phòng</th>
        <th scope="col">Trạng Thái</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $k => $v)
        <tr>
            <th scope="row">{{$v->MaKH}}</th>
            <td>{{$v->TenKH}}</td>
            <td>{{$v->CMND}}</td>
            <td>{{$v->SoDienThoai}}</td>
            <td>{{$v->MaPhong}}</td>
            <td>{{$v->TrangThai}}</td>
        </tr>
    @endforeach
    </tbody>
</table>