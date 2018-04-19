@extends('layouts.default')
@section('title',$store_info->store->name)
    @section('content')
        <table class="table table-bordered table-responsive">
            <tr>
                <th>商铺ID</th>
                <th>商铺名</th>
                <th>店铺图</th>
                <th>店铺类型</th>
                <th>店铺状态</th>
                {{--<th>操作</th>--}}
            </tr>
                <tr>
                    <td>{{$store_info->store_id}}</td>
                    <td>{{$store_info->store->name}}</td>
                    <td><img src="@if($store_info->store_img){{ $store_info->store_img }}@endif" class="img-circle img-circle" style="width: 50px"></td>
                    <td>{{$store_info->store->cat_id}}</td>
                    <td>{{$store_info->store->type==1?'审核通过':'未审核'}}</td>
                    <td>
                        {{--<a href="{{ route('stores.edit',['store_info'=>$store_info->store->id]) }}" class="btn btn-warning btn-sm">编辑</a>--}}
                        {{--<a href="{{ route('cats.show',['cat'=>$cat]) }}" class="btn btn-primary btn-sm" >查看</a>--}}
                    </td>
                </tr>
        </table>
    @stop