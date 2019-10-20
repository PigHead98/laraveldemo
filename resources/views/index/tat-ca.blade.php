<!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <form method="get" action="{{route('admin/phong/tat-ca')}}">
                <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="searchRoom" class="form-control" id="searchRoom" aria-describedby="searchRoom" placeholder="Tìm phòng">
                        </div>
                        <button type="submit" class="btn btn-primary">Tìm</button>
                </div>
{{--                <div class="col-md-6">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-3">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="typeRoom" id="alltype" value="" checked>--}}
{{--                                <label class="form-check-label" for="alltype">--}}
{{--                                    Tất cả--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="typeRoom" id="vipRoom" value="1">--}}
{{--                                <label class="form-check-label" for="vipRoom">--}}
{{--                                    Phòng vip--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="typeRoom" id="normalRoom" value="2">--}}
{{--                                <label class="form-check-label" for="normalRoom">--}}
{{--                                    Phòng thường--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="kieuphong" id="all" value="" checked>--}}
{{--                                <label class="form-check-label" for="all">--}}
{{--                                    Tất cả--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="kieuphong" id="single" value="1">--}}
{{--                                <label class="form-check-label" for="single">--}}
{{--                                    Phòng đơn--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="kieuphong" id="couple" value="2">--}}
{{--                                <label class="form-check-label" for="couple">--}}
{{--                                    Phòng đôi--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                </form>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4>
                        Phòng Vip
                    </h4>
                </div>
            </div>
            <div class="row">
                @foreach($data as $k => $v)
                    @if($v->LoaiPhong == 1)
                        <div class="col-lg-3 col-xs-6">
                            @if($v->KieuPhong == 1)
                                <?php  $kieu = 'Phòng đơn'?>
                            @else
                                <?php  $kieu = 'Phòng đôi'?>
                            @endif
                            @switch($v->TrangThai)
                                @case(1)
                                <?php $color = 'bg-aqua'; $title = 'Sẵn sàng'?>
                                    @break
                                @case(2)
                                <?php $color = 'bg-green'; $title = 'Đã được thuê'?>
                                    @break
                                @default
                                <?php $color = 'bg-red'; $title = 'Đang sửa chữa'?>
                                    @break
                            @endswitch
                                <div class="small-box {{$color}}">
                                    <div class="inner">
                                        <h3 title="{{$title}}">P{{$v->TenPhong}}</h3>
                                        <p>{{$kieu}}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                        <a href="{{route('admin/phong/dat-phong',['id' => $v->MaPhong])}}" class="small-box-footer" style="width: 50%;display: inline-block;">
                                            Chọn Phòng
                                            <i class="fa fa-arrow-circle-up"></i></a>
                                        <a href="{{route('admin/phong/cap-nhat',['id' => $v->TenPhong])}}" class="small-box-footer" style="width: 48%;display: inline-block;">
                                            Sửa Phòng
                                            <i class="fa fa-arrow-circle-down"></i></a>

                                </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>
                        Phòng Thường
                    </h4>
                </div>
            </div>
            <div class="row">
                @foreach($data as $k => $v)
                    @if($v->LoaiPhong == 2)
                        <div class="col-lg-3 col-xs-6">
                            @if($v->KieuPhong == 1)
                                <?php  $kieu = 'Phòng đơn'?>
                            @else
                                <?php  $kieu = 'Phòng đôi'?>
                            @endif
                            @switch($v->TrangThai)
                                @case(1)
                                <?php $color = 'bg-aqua'; $title = 'Sẵn sàng'?>
                                @break
                                @case(2)
                                <?php $color = 'bg-green'; $title = 'Đã được thuê'?>
                                @break
                                @default
                                <?php $color = 'bg-red'; $title = 'Đang sửa chữa'?>
                                @break
                            @endswitch
                            <div class="small-box {{$color}}">
                                <div class="inner">
                                    <h3 title="{{$title}}">P{{$v->TenPhong}}</h3>
                                    <p>{{$kieu}}</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                    <a href="{{route('admin/phong/dat-phong',['id' => $v->MaPhong])}}" class="small-box-footer" style="width: 50%;display: inline-block;">
                                        Chọn Phòng
                                        <i class="fa fa-arrow-circle-up"></i></a>
                                    <a href="{{route('admin/phong/cap-nhat',['id' => $v->TenPhong])}}" class="small-box-footer" style="width: 48%;display: inline-block;">
                                        Sửa Phòng
                                        <i class="fa fa-arrow-circle-down"></i></a>
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
