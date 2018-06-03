@extends('admin.dashboard')
@section('content-header')
    <h1>{{ $title }}</h1>
@stop
@section('content')
    <div class="container-fluid">
        @if(session()->has('createSuccess'))
            <div class="alert alert-success">
                <p>{{session()->get('createSuccess')}}</p>
            </div>
        @endif
            @if(session()->has('updateSuccess'))
                <div class="alert alert-success">
                    <p>{{session()->get('updateSuccess')}}</p>
                </div>
            @endif
        <div class="row">
            <div class="box box-primary clearfix">
                <div class="box-body">
                    {!! Form::open(['route' => 'admin.question.index', 'method' => 'get']) !!}
                    <div class="col-sm-2">
                        <div class="input-group">
                            {!! Form::text('search_content', null, ['class' => 'form-control','id' => 'searchContent','placeholder' => 'Search content']) !!}
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    {!! Form::close() !!}
                    <div class="col-md-2">
                        <a href="{{ route('admin.question.create') }}"
                           class="btn btn-success">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>Add a new Question
                        </a>
                    </div>
                </div>
                @if($questions->count()>0)
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Content</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $key=>$question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->content }}</td>
                                <td>
                                    <a href="{{ route('admin.question.edit', $question->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil fa-fw"></i>Edit
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-danger button-delete" data-toggle="modal"
                                            data-target="#popupDelete"
                                            data-question-id="{{ $question->id }}">
                                        <i class="fa fa-trash-o  fa-fw"></i>Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">{{ $questions->links() }}</div>
                @else
                    <h2 class="no-result text-center">{{ trans('messages.admin.no_question') }}</h2>
                @endif
            </div>
        </div>
    </div>
@endsection
@include('admin.includes.popup_delete')
@include('admin.includes.popup_error')
@include('admin.includes.popup_success')
@section('script')
    <script>
      $(document).ready(function () {
        $('.button-delete').click(function () {
          let questionId = $(this).data('question-id');
          $('#confirmDelete').data('id', questionId);
        });

        $('#confirmDelete').click(function () {
          let link = '/question/' + $(this).data('id');
          $.ajax({
            url: link,
            type: 'delete',
            dataType: 'JSON',
            success: (function (res) {
              $('#popupDelete').modal('hide');
              $('#popupSuccess').modal('show');
              $('.message-success').text(res.message);
              window.location.reload();
            }),
            error: (function (err) {
              $('#popupDelete').modal('hide');
              $('#popupError').modal('show');
              $('.message-error').text(err.statusText);
            })
          })
        });
      });
    </script>
@endsection