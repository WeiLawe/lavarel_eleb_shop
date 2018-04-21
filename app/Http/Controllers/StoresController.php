<?php

namespace App\Http\Controllers;

use App\Cat;
use App\Handlers\ImageUploadHandler;
use App\Store;
use App\Store_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoresController extends Controller
{
    //添加店铺
    public function create(){
        $cats=Cat::all();
//        dump($cats);exit;
        return view('stores.create',compact('cats'));
    }

    //店铺保存
    public function store(Request $request,Store $store){
        //验证店铺
        $this->validate($request,
            [
                'name'=>'required',
                'telephone'=>'required|digits:11',
                'password'=>'required|min:6|confirmed',
                'cat_id'=>'required',
                'captcha' => 'required|captcha',
            ],
            [
                'name.required'=>'店铺名不能为空!',
                'telephone.required'=>'电话号码不能为空!',
                'telephone.digits'=>'请填写合法的电话号码!',
                'password.required'=>'密码不能为空!',
                'password.min'=>'密码不能低于6位!',
                'password.confirmed'=>'前后两次密码输入不一致!',
                'cat_id.required'=>'分类不能为空!',
                'captcha.required' => '验证码不能为空',
                'captcha.captcha' => '请输入正确的验证码',
            ]);

        //保存上传logo
        $uploder= new ImageUploadHandler();
        $res=$uploder->save($request->store_img,'Store/img',0);
        if($res){
            $fileName=$res['path'];
        }else{
            $fileName='';
        }

//保存商品店主信息
        DB::transaction(function () use ($request,$fileName) {

            $store_infos=Store_info::create(
                [
                    'store_name'=>$request->store_name,
                    'store_img'=>$fileName,
                    'brand'=>$request->brand,
                    'on_time'=>$request->on_time,
                    'fengniao'=>$request->fengniao,
                    'bao'=>$request->bao,
                    'piao'=>$request->piao,
                    'zhun'=>$request->zhun,
                    'start_send'=>$request->start_send,
                    'store_rating'=>$request->store_rating,
                    'send_cost'=>$request->send_cost,
                    'notice'=>$request->notice,
                    'discount'=>$request->discount,
                    'distance'=>$request->distance,
                    'estimate_time'=>$request->estimate_time,
                ]
            );

            Store::create(
                [
                    'name'=>$request->name,
                    'cat_id'=>$request->cat_id,
                    'password'=>bcrypt($request->password),
                    'status'=>'0',
                    'telephone'=>$request->telephone,
                    'detail'=>$request->detail,

//                    最后插入的id
                    'store_id'=>$store_infos->id
                ]
            );
        });
        session()->flash('success','添加商铺成功,待审核');
        return redirect()->route('home');
    }

    //显示该商铺详情
    public function show(Store $store){
        $cats=Cat::all();
        return view("stores.show",compact('store','cats'));
    }

    //修改密码表单
    public function pwd_edit(Store $store)
    {
        return view('stores.pwd_edit',compact('store'));
    }

    //修改密码保存
    public function pwd_edit_save(Request $request, Store $store)
    {
        //验证
//        dump($request);exit;
        if (!empty($request->old_password)) {
            if (Hash::check($request->old_password, $store->password)) {
                $this->validate($request,
                    [
                        'old_password' => 'required',
                        'password' => 'required|min:6|confirmed',
                    ],
                    [
                        'old_password.required' => '旧密码不能为空!',
                        'password.required' => '新密码不能为空!',
                        'password.min' => '新密码不能低于6位!',
                        'password.confirmed' => '前后两次密码输入不一致!',
                    ]);
                $store->update(
                    [
                        'password' => bcrypt($request->password),
                    ]
                );
                Auth::logout();
                session()->flash('success', '修改密码成功,请重新登录!');
                return redirect()->route('login', compact('store'));
            }
        }
        session()->flash('warning', '修改失败,返回首页');
        return redirect()->route('home');
    }


    //显示修改表单
    public function edit(Store $store)
    {
        $cats=Cat::all();
        return view('stores.edit',compact('store','cats'));
    }

    //修改信息保存
    public function update(Request $request){
//        dump($request);exit;
        $this->validate($request,
            [
                'name'=>'required',
                'telephone'=>'required|digits:11',
                'cat_id'=>'required',

            ],
            [
                'name.required'=>'店铺名不能为空!',
                'telephone.required'=>'电话号码不能为空!',
                'telephone.digits'=>'请填写合法的电话号码!',
                'cat_id.required'=>'分类不能为空!',

            ]);

        //保存上传logo
        $uploder= new ImageUploadHandler();
        $res=$uploder->save($request->store_img,'Store/img',0);
        if($res){
            $fileName=$res['path'];
        }else{
            $fileName='';
        }

        //保存商品店主信息
        DB::transaction(function () use ($request,$fileName) {
            Store_info::update(
                [
                    'store_name'=>$request->store_name,
                    'store_img'=>$fileName,
                    'brand'=>$request->brand,
                    'on_time'=>$request->on_time,
                    'fengniao'=>$request->fengniao,
                    'bao'=>$request->bao,
                    'piao'=>$request->piao,
                    'zhun'=>$request->zhun,
                    'start_send'=>$request->start_send,
                    'send_cost'=>$request->send_cost,
                    'notice'=>$request->notice,
                    'discount'=>$request->discount,
                    'distance'=>$request->distance,
                    'estimate_time'=>$request->estimate_time,
                ]
            );

            Store::update(
                [
                    'name'=>$request->name,
                    'telephone'=>$request->telephone,
                    'status'=>$request->status,
                    'cat_id'=>$request->cat_id,
                ]
            );
        });
        session()->flash('success', '修改成功~');
        return redirect()->route('stores.index');
    }
}
