@extends('admin.dashboard')
@section('content-header')
    <h1>{{ $title }}</h1>
@stop
@section('content')
    @if(session()->has('createSuccess'))
        <div class="alert alert-success">
            <p>{{session()->get('createSuccess')}}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary clearfix">
                <div class="box-body">
                    {!! Form::open(['route' => 'admin.user.store','enctype' => 'multipart/form-data', 'method' => 'post']) !!}
                    <div class="tab-content" id="createClass" style="display: block;">
                        <div class="col-md-6">
                            <div class="form-group clearfix {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label" for="name">Name :</label>
                                {!! Form::text('name', null, ['class' => 'form-control','id' => 'name','placeholder' => 'Enter name']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('answer_a') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label" for="email">Email :</label>
                                {!! Form::email('email', null, ['class' => 'form-control','id' => 'email','placeholder' => 'Enter email']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label" for="password">Password :</label>
                                {!! Form::text('password', null, ['class' => 'form-control','id' => 'password','placeholder' => 'Enter password']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div><label class="control-label" for="question">Answer question below:</label></div>
                            @if ($questions->count() > 0)
                                @foreach($questions as $question)
                                    <div class="form-group clearfix">
                                        <div><label class="control-label" for="question">{{ $question->content }}</label></div>
                                        <div>
                                            <label class="control-label" for="question">{{ $question->answer_a }}</label>
                                            {!! Form::radio('question['.$question->id.']', 'a') !!}
                                            <label class="control-label" for="question">{{ $question->answer_b }}</label>
                                            {!! Form::radio('question['.$question->id.']', 'b') !!}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            {!! Form::submit('Submit',['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('admin/js/select2.min.js') }}"></script>
    <script>
      $(function () {
        $('tbody').sortable({
          stop: function () {
            reIndex();
          }
        });
      });
    </script>
@endsection
