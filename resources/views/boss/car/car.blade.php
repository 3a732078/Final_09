@extends('boss.car.layouts.master')

@section('content')

    <!-- Bootstrap 樣板... -->

    <div class="panel-body">

    <!-- 顯示有數量的商品 -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="30" style="text-align: center">#</th>
                                <th>商品</th>
                                <th>價格</th>
                                <th width="70" style="text-align: center">數量</th>
                                <th width="100" style="text-align: center">增減</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $post)

                                @if(  $post->count > 0)

                                <tr>

                                    <td
                                        style="text-align: center">

                                        {{ $post -> id }}

                                    </td>
                                    <td>

                                        <img height="200"
                                             src="{{URL::asset('img/'. $items -> find($post -> id) -> path )  }}"
                                        >

                                    </td>

                                    <td>
                                        {{$post-> price}}
                                    </td>

                                    <td>
                                        {{$post-> count}}
                                    </td>

                                    <td>

                                        <form action="/boss/car/{{($post->id)}}/increse"
                                              method="POST"
                                              style="display: inline">
                                            @method('PATCH')
                                            @csrf

                                            <button class="btn btn-sm btn-success"
                                                    type="submit">
                                                添加
                                            </button>
                                        </form>
                                        <form action="/boss/car/{{($post->id)}}/decrese"
                                              method="POST"
                                              style="display: inline">
                                            @method('PATCH')
                                            @csrf

                                            <button class="btn btn-sm btn-danger"
                                                    type="submit">
                                                減少
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                                @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <hr>
            已結帳 -----><br>
        <hr>
        @if (count($karries) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="30" style="text-align: center">#</th>
                                <th>商品</th>
                                <th>價格</th>
                                <th width="70" style="text-align: center">數量</th>
                                <th width="100" style="text-align: center">狀態</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($karries as $post)

                                @if(  $post->count > 0)

                                    <tr>

                                        <td
                                            style="text-align: center">

                                            {{ $post -> id }}

                                        </td>
                                        <td>

                                            <img height="200"
                                                 src="{{URL::asset('img/'. $items -> find($post -> id)->path)  }}"
                                            >

                                        </td>

                                        <td>
                                            {{$post-> price}}
                                        </td>

                                        <td>
                                            {{$post-> count}}
                                        </td>

                                        <td>
                                            {{$post-> status}}
                                        </td>
                                    </tr>

                                @endif

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    @endif
@endsection
