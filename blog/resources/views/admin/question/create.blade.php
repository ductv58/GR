@extends('admin.dashboard')
@section('content-header')
    <h1>{{ $title }}</h1>
@stop
@section('css')
    <style>
        .selected-row {
            background-color: #8eb4cb;
        }

        .add-row > th {
            border: none;
        }

        .tab-content {
            display: none;
        }

        textarea {
            resize: none;
        }
    </style>
@endsection
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
                    {!! Form::open(['route' => 'admin.question.store','enctype' => 'multipart/form-data', 'method' => 'post']) !!}
                    <div class="tab-content" id="createClass" style="display: block;">
                        <div class="col-md-6">
                            <div class="form-group clearfix {{ $errors->has('content') ? ' has-error' : '' }}">
                                <label class="control-label" for="content">Content * :</label>
                                {!! Form::textarea('content', null, ['class' => 'form-control','id' => 'content','placeholder' => 'Enter content']) !!}
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('answer_a') ? ' has-error' : '' }}">
                                <label class="control-label" for="answer_a">Answer A  :</label>
                                {!! Form::text('answer_a', null, ['class' => 'form-control','id' => 'answerA','placeholder' => 'Enter A answer']) !!}
                                @if ($errors->has('answer_a'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('answer_a') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('answer_b') ? ' has-error' : '' }}">
                                <label class="control-label" for="answer_b">Answer B :</label>
                                {!! Form::text('answer_b', null, ['class' => 'form-control','id' => 'answerB','placeholder' => 'Enter B answer']) !!}
                                @if ($errors->has('answer_b'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('answer_b') }}</strong>
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
      $('table').on("click", 'tr.add-row', function () {
        let row = $(this);
        $(row).toggleClass('selected-row');
      });

      function deleteRow() {
        $('.selected-row').remove();
        reIndex();
      }
      $(function () {
        $('tbody').sortable({
          stop: function () {
            reIndex();
          }
        });
      });
    </script>
@endsection
