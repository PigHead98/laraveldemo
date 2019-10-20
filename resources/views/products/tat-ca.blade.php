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
        <th scope="col">Tên dịch vụ</th>
        <th scope="col">Giá</th>
        <th scope="col">Trạng Thái</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $k => $v)
        @if(3 != $v->TrangThai)
        <tr>
            <th scope="row">{{$v->MaDV}}</th>
            <td>{{$v->TenDV}}</td>
            <td>{{$v->Gia}}</td>
            <td>
                @if(1 == $v->TrangThai)
                    Sẵn sàng
                @else
                    Hết hàng
                @endif
            </td>
            <td>
                <a href="{{route('admin/dich-vu/cap-nhat',['id' => $v->MaDV])}}" class="btn btn-warning">Edit</a>
                <a href="{{route('admin/dich-vu/del',['id' => $v->MaDV])}}" class="btn btn-danger">Del</a>
            </td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>