@extends('admin.layouts.master')

@section('content')

    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <a href="{{ route('admin.create') }}" class="btn btn-success">建立新商品</a>
        </div>
    </div>




    <!-- 顯示所有商品 -->
        @if (count($posts) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="30" style="text-align: center">#</th>
                                <th>商品</th>
                                <th width="70" style="text-align: center">已售出數量</th>
                                <th width="100" style="text-align: center">增減</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)

                                <tr>
                                    <td
                                        style="text-align: center">
                                        {{ $post -> id }}
                                    </td>
                                    <td>
                                        <img height="200"
                                             src = "{{URL::asset('img/'.$post->path)}}">
                                    </td>
                                    <td>
                                        {{$post -> Sell }}
                                    </td>
                                    <td>

                                        <form action="/admin/edit/{{($post->id)}}"
                                              method="POST"
                                              style="display: inline">
                                            @method('PATCH')
                                            @csrf

                                            <button class="btn btn-sm btn-success"
                                                    type="submit">
                                                編輯
                                            </button>
                                        </form>
                                        <form action="/admin/index/{{$post->id}}"
                                              method="POST"
                                              style="display: inline">
                                            @method('DELETE')
                                            @csrf

                                            <button class="btn btn-sm btn-danger"
                                                    type="submit">
                                                刪除
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
