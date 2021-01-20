@extends('boss.layouts.master')

@section('content')

    <!-- Bootstrap 樣板... -->

    <div class="panel-body">
        <!-- 顯示驗證錯誤 -->
    @include('boss.common.error')

    <!-- 顯示所有商品 -->
        @if (count($item) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="30" style="text-align: center">#</th>
                                <th>商品</th>
                                <th width="70" style="text-align: center">數量</th>
                                <th width="100" style="text-align: center">增減</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($item as $post)

                                <tr>
                                    <td
                                        style="text-align: center">
                                        {{ $post -> id }}
                                    </td>
                                    <td>
                                        <img height="200"
                                             src = "{{URL::asset('img/'.$post->path)}}"
                                        >
                                    </td>
                                    <td>
                                        {{\App\Models\car::find($post->id)->count }}
                                    </td>
                                    <td>

                                        <form action="/boss/index/{{($post->id)}}/increse"
                                              method="POST"
                                              style="display: inline">
                                            @method('PATCH')
                                            @csrf

                                            <button class="btn btn-sm btn-success"
                                                    type="submit">
                                                添加
                                            </button>
                                        </form>
                                        <form action="/boss/index/{{($post->id)}}/decrese"
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    @endif
@endsection
