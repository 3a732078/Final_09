@extends('admin.layouts.master')

@section('title', '新增商品')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                新增商品 <small>請輸入商品內容</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 商品管理
                </li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <form action = {{route('admin.store')}}
                method="POST" role="form" >
                @method('POST')
                @csrf
                <div class="form-group">

                    <label for="name">

                        商品名稱：

                    </label>

                    <input id="name"
                           name = "name"
                           class= "form control"
                           placeholder = "請輸入商品名稱 "
                    >

                </div>

                <div class="form-group">

                    <label for="price">

                        商品價格：

                    </label>

                    <input id="price"
                           name = "price"
                           class= "form control"
                           placeholder = "請輸入商品價格 "
                    >

                </div>

                <div class="form-group">
                    <label for = "path">圖片:</label>

                    <input type="file"
                           id="path"
                           name="path"
                           class="form control"
                    >
                </div>


                <div class="text-right">
                    <button type="submit" class="btn btn-success">新增</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
@endsection
