@extends('boss.layouts.master')

@section('content')

    <!-- Bootstrap 樣板... -->

    <div class="panel-body">
        <!-- 顯示驗證錯誤 -->
    @include('boss.common.error')

    <!-- 顯示所有商品 -->
        @if (count($tasks) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="30" style="text-align: center">#</th>
                                <th>標題</th>
                                <th width="70" style="text-align: center">精選</th>
                                <th width="100" style="text-align: center">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($p as $post)

                                <tr>
                                    <td style="text-align: center">
                                        {{ $post -> id }}</td>
                                    <td>{{ $post -> title }}</td>
                                    <td style="text-align: center">
                                        {{ ($post -> is_feature)?
             'v' : '' }}</td>
                                    <td>
                                        <a class=
                                           "btn btn-sm btn-primary"
                                           href=
                                           "{{route('admin.posts.edit',
$post -> id)}}">編輯</a>
                                        <form action=
                                              "/admin/posts/
               {{($post->id)}}" method="POST" style="display: inline">
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                class="btn btn-sm btn-danger" type="submit">刪除</button>
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
