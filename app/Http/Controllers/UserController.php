<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        //Lấy danh sách toàn bộ user
        $list = DB::table('users')->get();

        // Lấy thông tin user có id = 4 
        // $list_id4 = DB::table('users')->where('id', '=', '4')->first();
        // $id = DB::table('users')->find('4');

        // Lấy thuộc tính 'name' của user có id = 16
        // $list_id16 = DB::table('users')->where('id', '=', '16')->value('name');

        // Lấy danh sách id của phòng ban 'Ban giám hiệu'
        // $id_bgh = DB::table('phongban')->where('ten_donvi','like','%Ban giám hiệu%')->value('id');
        // $list_bgh = DB::table('users')->where('phongban_id',$id_bgh)->pluck('id');

        // Tìm user có độ tuổi lớn nhất trong công ty 
        // $year = DB::table('users')->max('tuoi');
        // $yearmax = DB::table('users')->where('tuoi',$year)->first();

        // Tìm user có độ tuổi nhỏ nhất trong công ty
        // $yearmin = DB::table('users')->where('tuoi',DB::table('users')->min('tuoi'))->first();

        // Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user 
        // $id_bgh = DB::table('phongban')->where('ten_donvi','like','%Ban giám hiệu%')->value('id');
        // $list_bgh = DB::table('users')->where('phongban_id',$id_bgh)->count('id');

        // Lấy danh sách tuổi các user 
        // $list_year = DB::table('users')->distinct()->pluck('tuoi');

        // Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $khai_thanh = DB::table('users')->where('name','like','%Khải')->orWhere('name','like','%Thanh')->get();


        // Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $id_bdt = DB::table('phongban')->where('ten_donvi','like','%Ban đào tạo%')->value('id');
        // $list_bdt = DB::table('users')->where('phongban_id',$id_bdt)->select('id','name','email')->get();

        // Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $year = DB::table('users')->where('tuoi','>=','30')->select('id','name','email','tuoi')->orderBy('tuoi','asc')->get();


        // Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $list_user_year = DB::table('users')->select('id', 'name', 'email', 'tuoi')->orderBy('tuoi', 'desc')->offset(5)->limit(10)->get();

        // Thêm một user mới vào công ty
        // $data =  [
        //     'name'=> 'Do Minh Kien',
        //     'email'=> 'kiendmph32981@fpt.edu.vn',
        //     'phongban_id'=>1,
        //     'songaynghi'=>0,
        //     'tuoi'=>'20',
        //     'created_at'=>Carbon::now(),
        //     'updated_at'=>Carbon::now(),

        // ];
        // DB::table('users')->insert($data);

        // Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
        // $id_bdt = DB::table('phongban')->where('ten_donvi', 'like', '%Ban đào tạo%')->value('id');
        // $list_bdt = DB::table('users')
        // ->where('phongban_id', $id_bdt)
        // ->select('id', 'name', 'email')
        // ->get();
        // foreach($list_bdt as $value){
        //     DB::table('users')->where('id',$value->id)->update([
        //         'name'=>$value->name . 'PDT'
        //     ]);
        // }
        

        // Xóa user nghỉ quá 15 ngày
        // $nghi = DB::table('users')->where('songaynghi','>','15')->delete();

        //  dd($list_bdt);
        return view("list", compact('list'));
    }
    public function showuser()
    {
       $showuser = DB::table('users')
       ->join('phongban','phongban.id','=','users.phongban_id')
       ->select('users.id','users.name','users.email','users.phongban_id','phongban.ten_donvi')
       ->get();
       return view('list',compact('showuser'));
    }
    public function showadd(){
        $phongban = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('add',compact('phongban'));
    }
    public function add(Request $request){
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phongban_id'=>$request->phongban,
            'tuoi'=>$request->tuoi,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
        DB::table('users')->insert($data);
        return redirect()->route('users.showuser');
    }
    public function delete($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('users.showuser');
    }
    public function updateuser(Request $request, $id)
    {
        $user = DB::table('users')
        ->join('phongban','phongban.id','=','users.phongban_id')
        ->select('users.id','users.name','users.email','users.phongban_id','phongban.ten_donvi','users.tuoi')
        ->where('users.id',$id)->first();
        $phongban = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('edit',compact('user','phongban'));
        
    }
    
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Request $request )
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phongban_id'=>$request->phongban,
            'tuoi'=>$request->tuoi,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ];
        DB::table('users')->where('id',$id)->update($data);
        return redirect()->route('users.showuser');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
