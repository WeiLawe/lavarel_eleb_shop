@extends('layouts.default')
@section('title', '添加店铺')

@section('content')

    <form  method="post" action="{{ route('stores.store') }}" enctype="multipart/form-data">
        <div class="form-group">
            <label>店铺名称</label>
            <input type="text" class="form-control" placeholder="商户名" name="store_name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>店主姓名</label>
            <input class="form-control" name="name" placeholder="商户姓名" value="{{ old('name') }}" />
        </div>

        <div class="form-group">
            <label>密码</label>
            <input type="password" class="form-control" name="password" placeholder="密码">
        </div>
        <div class="form-group">
            <label>确认密码</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="确认密码">
        </div>

        <div class="form-group">
            <label>手机号</label>
            <input type="number" class="form-control" name="telephone" placeholder="手机号码">
        </div>

        <div class="form-group">
            <label>店铺简介</label>
            <textarea name="detail" maxlength="50" class="form-control" rows="3" placeholder="店铺简介">{{ old('detail') }}</textarea>
        </div>

        <div class="form-group">
            <label>店铺分类</label>
            <select class="form-control" name="cat_id">
                <option value="">--选择分类--</option>
                @foreach($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>店铺图片</label>
            <input  type="file"  name="store_img"/>
        </div>

        <div class="form-group">
            <label>是否品牌</label>
            是: <input type="radio" name="brand" value="1">&emsp;
            否: <input type="radio" name="brand" value="0" checked="checked">
        </div>

        <div class="form-group">
            <label>评分</label>
            <input type="text" name="store_rating" value="{{old('store_rating')}}">
        </div>

        <div class="form-group">
            <label>是否准时送达&emsp; </label>
            是: <input type="radio" name="on_time" value="1" checked="checked">&emsp;
            否: <input type="radio" name="on_time" value="0" >
        </div>


        <div class="form-group">
            <label>是否蜂鸟配送&emsp;</label>
            是: <input type="radio" name="fengniao" value="1">&emsp;
            否: <input type="radio" name="fengniao" value="0" checked="checked">
        </div>

        <div class="form-group">
            <label>是否保标记&emsp;</label>
            是: <input type="radio" name="bao" value="1">&emsp;
            否: <input type="radio" name="bao" value="0" checked="checked">
        </div>

        <div class="form-group">
            <label>是否有发票&emsp;</label>
            是: <input type="radio" name="piao" value="1">&emsp;
            否: <input type="radio" name="piao" value="0" checked="checked">
        </div>

        <div class="form-group">
            <label>是能准时发货&emsp;</label>
            是: <input type="radio" name="zhun" value="1">&emsp;
            否: <input type="radio" name="zhun" value="0" checked="checked">
        </div>


        <div class="form-group">
            <label>起送金额</label>
            <input type="text" name="start_send" class="form-control">
        </div>

        <div class="form-group">
            <label>配送费</label>
            <input type="text" name="send_cost" class="form-control">
        </div>

        <div class="form-group">
            <label>配送距离</label>
            <input type="text" name="distance" class="form-control">
        </div>

        <div class="form-group">
            <label>预计时间</label>
            <input type="text" name="estimate_time" class="form-control">
        </div>

        <div class="form-group">
            <label>店铺公告</label>
            <textarea name="notice" maxlength="50" class="form-control" rows="3" placeholder="新店开张，优惠大酬宾！">{{ old('notice') }}</textarea>
        </div>

        <div class="form-group">
            <label>优惠信息</label>
            <textarea name="discount" class="form-control" rows="3" placeholder="新用户有巨额优惠" maxlength="50">{{ old('discount') }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">验证码</label>
            <input id="captcha" class="form-control" name="captcha" >
            <img class="thumbnail captcha" src="{{ captcha_src('inverse') }}" onclick="this.src='/captcha/inverse?'+Math.random()" title="点击图片重新获取验证码">
        </div>
        <button type="submit" class="btn btn-primary btn-success"> 添加店铺</button>
        {{csrf_field()}}
    </form>

    @stop