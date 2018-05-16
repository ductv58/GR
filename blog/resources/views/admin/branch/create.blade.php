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
                    {!! Form::open(['route' => 'admin.group.store','enctype' => 'multipart/form-data', 'method' => 'post']) !!}
                    <ul class="nav nav-tabs">
                        <li class="active tab-links" onclick="changeTab(event, 'createClass')"><a href="#createClass">Create
                                Class</a></li>
                        <li class="tab-links" onclick="changeTab(event, 'createLessons')"><a href="#createLessons">Create
                                Lessons</a></li>
                    </ul>
                    <div class="tab-content" id="createClass" style="display: block;">
                        <div class="col-md-6">
                            <div class="form-group clearfix {{ $errors->has('code') ? ' has-error' : '' }}">
                                <label class="control-label" for="name">Code * :</label>
                                {!! Form::text('code', null, ['class' => 'form-control','id' => 'code','placeholder' => 'Example: #Code']) !!}
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('course_id') ? ' has-error' : '' }}">
                                <label class="control-label" for="course">Course * :</label>
                                {!! Form::select('course_id', $courses, null, ['class' => 'form-control','id' => 'courses','placeholder' => 'Chọn khóa học']) !!}
                                @if ($errors->has('course_id'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('course_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group clearfix {{ $errors->has('teachers') ? ' has-error teacherErr' : '' }}" id="teacherErr">
                            <label class="control-label" for="teacher">Teacher * :</label>
                            {!! Form::select('teachers[]', $teachers, null, ['class' => 'form-control js-example-placeholder-multiple js-states','id' => 'teachers','multiple' => 'multiple']) !!}
                            @if ($errors->has('teachers'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('teachers') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('max_student') ? ' has-error' : '' }}">
                                <label class="control-label" for="name">Max Student * :</label>
                                {!! Form::text('max_student', null, ['class' => 'form-control','id' => 'max_student','placeholder' => 'Example: 50']) !!}
                                @if ($errors->has('max_student'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('max_student') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('start_date') ? 'has-error' : '' }}">
                                <label class="control-label" for="startdate">Start Date * :</label>
                                <div class="input-group">
                                    {!! Form::text('start_date', null, ['class' => 'form-control date-and-time-picker','id' => 'start_date','placeholder' => 'Enter start_date dd/mm/yyyy']) !!}
                                    <span class="input-group-addon icon-calendar"><i
                                                class="fa fa-calendar"></i></span>
                                </div>
                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('start_date') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('learning_address') ? ' has-error' : '' }}">
                                <label class="control-label" for="learning_address">Learning Address :</label>
                                {!! Form::text('learning_address', null, ['class' => 'form-control','id' => 'price','placeholder' => 'Enter Address']) !!}
                                @if ($errors->has('learning_address'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('learning_address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group clearfix {{ $errors->has('learning_schedule') ? ' has-error' : '' }}">
                                <label class="control-label" for="learning_schedule">Learning Schedule :</label>
                                {!! Form::text('learning_schedule', null, ['class' => 'form-control','id' => 'price','placeholder' => 'Enter Schedule: 20:00 đến 22:00 thứ 3 và thứ 6']) !!}
                                @if ($errors->has('learning_schedule'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('learning_schedule') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Upload image:</label>
                            <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                   class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a>
                            </span>
                                <input id="thumbnail" class="form-control" type="text" name="filepath" readonly>
                            </div>
                            <img id="holder" class="img-responsive margin-top-30">
                        </div>
                    </div>
                    <div class="tab-content" id="createLessons">
                        <table class="table table-bordered table-responsive form-group" id="tableLesson">
                            <thead>
                            <tr>
                                <th>Nth-lesson</th>
                                <th>Title *</th>
                                <th>Main content *</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(old('title') != null)
                                @foreach(old('title') as $key => $title)
                                    <tr class="add-row">
                                        <th>{{$key + 1 }}</th>
                                        <th class="form-group {{$errors->has('title.'.$key) ? 'has-error' :  ''}}">{!! Form::textarea('title[]' , null, ["class" => "form-control main-title"]) !!}
                                            @if ($errors->has('title.'.$key))
                                                <span class="help-block">
                                    <strong>{{ str_replace($key,($key + 1),$errors->first('title.'.($key))) }}</strong>
                                         </span>
                                        </th>
                                        @endif
                                        <th class="form-group {{$errors->has('description.'.$key) ? 'has-error' :  ''}}">{!! Form::textarea('description[]', null, ["class" => "form-control main-content content-area"])!!}
                                            @if ($errors->has('description.'.$key))
                                                <span class="help-block">
                                    <strong>{{ str_replace($key,($key + 1),$errors->first('description.'.($key))) }}</strong>
                                </span>
                                        </th>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="pull-right">
                            <a class="btn btn-success" onclick="addRowLesson()">
                                <i class="fa fa-plus fa-fw" aria-hidden="true"></i>Add new lessons
                            </a>
                            <a class="btn btn-danger" onclick="deleteRow()">
                                <i class="fa fa-minus-square" aria-hidden="true"></i> Delete
                            </a>
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
      function addRowLesson() {
        $('#tableLesson > tbody:last-child').append('<tr class="add-row">' +
            '<th>' + $(this).index() + '</th>' +
            '<th> {!! Form::textarea('title[]', null, ["class" => "form-control main-title "]) !!} </th>' +
            '<th> {!! Form::textarea('description[]', null, ["class" => "form-control main-content content-area "]) !!} </th>' + '</tr>'
        )
        reIndex();
      }

      $('table').on("click", 'tr.add-row', function () {
        let row = $(this);
        $(row).toggleClass('selected-row');
      });

      function deleteRow() {
        $('.selected-row').remove();
        reIndex();
      }

      function reIndex() {
        $("#tableLesson tbody tr").each(function () {
          $(this).children(":first").html($(this).index() + 1);
        })
      }

      function changeTab(event, tabName) {
        $('.tab-content').each(function () {
          $(this).css('display', 'none');
        })
        $('.tab-links').each(function () {
          $(this).removeClass('active');
        });
        $('#' + tabName).css('display', 'block');
        $(event.currentTarget).addClass('active');
      }

      $(function () {
        $('tbody').sortable({
          stop: function () {
            reIndex();
          }
        });
      });
        $(document).ready(function () {
            $("#teachers").select2({
                allowClear: true,
                maximumSelectionLength: 3,
                placeholder: "Chọn giáo viên"
            });
            if ($("#teacherErr").hasClass("teacherErr")) {
                $("span").removeClass("select2-container--focus");
                $(".select2-container--default").css("border", "solid 1px red")
                $(".select2-selection").css("border", "none")
            }
      });
    </script>
@endsection
