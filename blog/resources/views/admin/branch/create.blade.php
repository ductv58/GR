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
                    {!! Form::open(['route' => 'admin.branch.store','enctype' => 'multipart/form-data', 'method' => 'post']) !!}
                    <div class="tab-content" id="createClass" style="display: block;">
                        <div class="col-md-6">
                            <div class="form-group clearfix {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label" for="name">Name  :</label>
                                {!! Form::text('name', null, ['class' => 'form-control','id' => 'name','placeholder' => 'Enter name']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="control-label" for="description">Description :</label>
                                {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'description','placeholder' => 'Enter description']) !!}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('link') ? ' has-error' : '' }}">
                                <label class="control-label" for="link">Link  :</label>
                                {!! Form::text('link', null, ['class' => 'form-control','id' => 'link','placeholder' => 'Enter link']) !!}
                                @if ($errors->has('link'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label class="control-label" for="avatar">Avatar  :</label>
                                {!! Form::file('avatar', null, ['class' => 'form-control','id' => 'avatar','placeholder' => 'select avatar']) !!}
                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                                @endif
                            </div>
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
      $(document).ready(function () {
        $('#lfm').click();
      })
    </script>
@endsection
