<?php

namespace App\Http\Controllers;

use App\ql_khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class IndexController extends Controller
{
    protected $data;
    protected $dataProduct;

    //class khoi tao
    public function __construct()
    {
        $this->data        = DB::table('ql_phong')->select()->get();
        $this->dataProduct = DB::table('ql_dichvu')->select()->get();
    }

    public function allRoom(Request $request)
    {
        $dataSearch = $request->all();
        $data       = $this->data; //get all info
        //($data);
        if (!empty($dataSearch)) {
            //get info where $dataSearch
            $data = DB::table('ql_phong')->select()
                ->where('TenPhong', 'like', '%' . $dataSearch['searchRoom'] . '%')->get();
        }

        return view('main', [
            'name'      => 'an',
            'type'      => 'manager',
            'status'    => 'online',
            'view'      => 'index.tat-ca',
            'type-room' => '',
            'data'      => $data,
        ]);
    }

    public function updateRoom(Request $request)
    {
        $data = [];
        if (!empty($request->id)) {
            $data = DB::table('ql_phong')->select()
                ->where('TenPhong', 'like', '' . $request->id . '')->first();
        }

        return view('main', [
            'name'      => 'an',
            'number'    => '1',
            'type'      => 'manager',
            'status'    => 'online',
            'view'      => 'index.cap-nhat',
            'type-room' => '',
            'error'     => '',
            'data'      => $data,
        ]);
    }

    public function check(Request $request)
    {
        if (!empty($request->all()['id']))
            return $this->editRoom($request);

        return $this->addRoom($request);
    }

    public function editRoom(Request $request)
    {

        $data  = $request->all();
        $rules = [
            'image' => 'image|max:1024|required',
        ];
        $posts = ['image' => $request->file('imgRoom')];

        // Validator để kiểm tra
        $valid = Validator::make($posts, $rules);
        $check = Validator::make($data, [
            'nameRoom'  => 'required',
            'priceRoom' => 'required|integer',
        ]);
        if ($check->fails()) {
            // Có lỗi, redirect trở lại
            return redirect()->route('admin/phong/cap-nhat', ['id' => $data['nameRoom']])->withErrors($check)
                ->withInput();

        }
        // Kiểm tra nếu có lỗi
        DB::table('ql_phong')->where('MaPhong', $data['id'])->update(
            [
                'TenPhong'  => $data['nameRoom'],
                'GiaPhong'  => $data['priceRoom'],
                'LoaiPhong' => $data['speciesRoom'],
                'KieuPhong' => $data['typeRoom'],
                'TrangThai' => $data['statusRoom'],
            ]
        );

        return redirect()->route('admin/phong/tat-ca');
    }

    public function addRoom(Request $request)
    {
        $data = $request->all();


        // Validator để kiểm tra

        $check = Validator::make($data, [
            'nameRoom'  => 'required',
            'priceRoom' => 'required|integer',
        ]);
        if ($check->fails()) {
            // Có lỗi, redirect trở lại
            return redirect()->route('admin/phong/cap-nhat')->withErrors($check)
                ->withInput();

        }
        // Kiểm tra nếu có lỗi

        DB::table('ql_phong')->insert(
            [
                'TenPhong'  => $data['nameRoom'],
                'GiaPhong'  => $data['priceRoom'],
                'LoaiPhong' => $data['speciesRoom'],
                'KieuPhong' => $data['typeRoom'],
                'TrangThai' => $data['statusRoom'],
            ]
        );

        return redirect()->route('admin/phong/tat-ca');
    }

    public function chooseRoom(Request $request)
    {
        $data = $this->data;

        if (!empty($request->id)) {
            $data = DB::table('ql_phong')->select()
                ->where('maphong', '=', $request->id)->get();
        }

        return view('main', [
            'name'      => 'an',
            'number'    => '1',
            'type'      => 'manager',
            'status'    => 'online',
            'view'      => 'index.dat-phong',
            'type-room' => '',
            'data'      => $data,
        ]);
    }

    public function saveInfoUser(Request $request)
    {
        $data     = $request->all();
        $messages = [
            'TenKH.required'   => 'Tên khách hàng không được để trống.',
            'TenKH.alpha-utf8' => 'Tên khách hàng sai định dạng.',//demo
            'cmnd.required'    => 'cmnd không được để trống.',
            'phone.required'   => 'số điện thoại không được để trống.',
            'maphong.required' => 'mã phòng không được để trống.',
            'phone.max'        => 'số điện thoại sai định dạng.',
        ];
        //        dd($data);
        $validator = Validator::make($request->all(), [
            'TenKH'   => 'required|max:255',
            'cmnd'    => 'required',
            'phone'   => 'required|max:10',
            'maphong' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return redirect(route('admin/phong/dat-phong', ['id' => $data['maphong']]))
                ->withErrors($validator)
                ->withInput();
        }
        //        DB::table('ql_khachhang')->insert(
        //            [
        //                'TenKH'         => $data['TenKH'],
        //                'CMND'          => $data['cmnd'],
        //                'SoDienThoai'   => $data['phone'],
        //                'MaPhong'       => $data['maphong'],
        //            ]
        //        );
        $data = [
            'TenKH'       => $data['TenKH'],
            'CMND'        => $data['cmnd'],
            'SoDienThoai' => $data['phone'],
            'MaPhong'     => $data['maphong'],
        ];

        $qlkh_model = new ql_khachhang();
        $qlkh_model->addInfo($data);

        return redirect()->route('admin/khach-hang/tat-ca');
    }

    public function allProduct(Request $request)
    {
        $dataSearch = $request->all();
        $data       = $this->dataProduct; //get all info
        //($data);
        if (!empty($dataSearch)) {
            //get info where $dataSearch
            $data = DB::table('ql_dichvu')->select()
                ->where('TenDV
                ', 'like', '%' . $dataSearch['searchRoom'] . '%')->get();
        }

        return view('main', [
            'name'      => 'an',
            'number'    => '1',
            'type'      => 'manager',
            'status'    => 'online',
            'view'      => 'products.tat-ca',
            'type-room' => '',
            'error'     => '',
            'data'      => $data,
        ]);
    }

    public function updateProduct(Request $request)
    {
        $data = [];
        if (!empty($request->id)) {
            $data = DB::table('ql_dichvu')->select()
                ->where('MaDV', '=', '' . $request->id . '')->first();
        }

        return view('main', [
            'name'      => 'an',
            'number'    => '1',
            'type'      => 'manager',
            'status'    => 'online',
            'view'      => 'products.cap-nhat',
            'type-room' => '',
            'error'     => '',
            'data'      => $data,
        ]);
    }

    public function checkProduct(Request $request)
    {
        $data = $request->all();

        $check = Validator::make($data, [
            'nameProduct'  => 'required',
            'priceProduct' => 'required|integer',
        ]);
        if ($check->fails()) {
            // Có lỗi, redirect trở lại
            return redirect()->route('admin/dich-vu/cap-nhat')->withErrors($check)
                ->withInput();

        }
        // Kiểm tra nếu có lỗi

        DB::table('ql_dichvu')->updateOrInsert(
            ['MaDV' => $request->id],
            [
                'TenDV'     => $data['nameProduct'],    
                'Gia'       => $data['priceProduct'],
                'TrangThai' => $data['statusRoom'],
            ]
        );

        return redirect()->route('admin/dich-vu/tat-ca');
    }

    public function delProduct(Request $request)
    {
        if (!empty($request->id)) {
            DB::table('ql_dichvu')
                ->where('TrangThai', '=', $request->id)
                ->update(
                    ['TrangThai' => 3]
                );

            return redirect(route('admin/dich-vu/tat-ca'));
        }
    }
}
