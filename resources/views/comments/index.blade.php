@extends('layouts.app')
@push('scripts')
  <script src="{{asset('js/dashboard.js')}}" charset="utf-8"></script>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if ($errors->has('messages'))
          @foreach ($errors->get('messages', ':message') as $error)
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{$error}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endforeach
          @endif
            <div class="table-striped table-responsive">
                <table class="table">
                  <thead class="">
                    <tr>
                      <th>دسته‌بندی</th>
                      <th>نامک</th>
                      <th>عملیات</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($comments as $key => $comment)
                      <tr>
                        <td>{{$comment->post->title}}</td>
                        <td>{{$comment->text}}</td>
                        <td><a href="mailto::{{$comment->user_email}}"></a>{{$comment->user_name}}</td>
                        <td>@if($comment->status ==2) تایید شده @elseif ($comment->status ==1) اسپم @else منتظر تایید @endif</td>
                        <td class="table-actions">
                          <a href="{{route('editCat',['category' => $cat])}}" class="btn btn-outline-primary"><i class="fas fa-pen"></i> ویرایش</a>
                          <form class="" action="{{route('deleteCat',['category' => $cat])}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger delete">
                              <i class="fas fa-trash"></i>حذف
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
</div>
@endsection