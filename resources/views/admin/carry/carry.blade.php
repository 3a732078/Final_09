@extends('admin.carry.layouts.master')

@section('content')

    <div class="row" style="margin-bottom: 20px; text-align: right">
        <div class="col-lg-12">
            <a href="{{ route('admin.create') }}" class="btn btn-success">建立新商品</a>
        </div>
    </div>




    <!-- 顯示所有商品 -->
    @if (count($carries) > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="30" style="text-align: center">#</th>
                            <th>商品</th>
                            <th width="70" style="text-align: center">狀態</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carries as $post)

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

                                   {{$post -> status}}
                                    <form action="/admin/carry/{{$post->id}}"
                                          method="POST"
                                          style="display: inline">
                                        @method('PATCH')
                                        @csrf

                                        <button class="btn btn-sm btn-danger"
                                                type="submit">
                                            出貨
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
