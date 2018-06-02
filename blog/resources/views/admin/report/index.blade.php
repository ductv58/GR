@extends('admin.dashboard')
@section('content-header')
    <h1>{{ $title }}</h1>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="box box-primary clearfix">
                <div class="box-body">
                    {!! Form::open(['route' => 'admin.report.index', 'method' => 'get']) !!}
                    <div class="col-sm-2">
                        <div class="input-group">
                            {!! Form::text('search_content', null, ['class' => 'form-control','id' => 'searchContent','placeholder' => 'Search content']) !!}
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                @if($reports->count()>0)
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $key=>$report)
                            <tr>
                                <td>{{ $report->id }}</td>
                                <td>{{ $report->content }}</td>
                                <td>
                                    {!! Form::open(['route' => 'admin.report.action-report', 'method' => 'put', 'class' => 'form-position']) !!}
                                    @if($report->status == \App\Model\Report::NOT_APPROVE)
                                        <button class="btn btn-success block">
                                            <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>APPROVE
                                        </button>
                                        {!! Form::hidden('action', \App\Model\Report::APPROVE) !!}
                                    @endif

                                    @if($report->status == \App\Model\Report::APPROVE)
                                        <button class="btn btn-warning block">
                                            <i class="fa fa-check fa-fw" aria-hidden="true"></i>NOT APPROVE
                                        </button>
                                        {!! Form::hidden('action', \App\Model\Report::NOT_APPROVE) !!}

                                    @endif
                                    {!! Form::hidden('id', $report->id) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <button class="btn btn-danger button-delete" data-toggle="modal"
                                            data-target="#popupDelete"
                                            data-report-id="{{ $report->id }}">
                                        <i class="fa fa-trash-o  fa-fw"></i>Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">{{ $reports->links() }}</div>
                @else
                    <h2 class="no-result text-center">{{ trans('messages.admin.no_report') }}</h2>
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
          let reportId = $(this).data('report-id');
          $('#confirmDelete').data('id', reportId);
        });

        $('#confirmDelete').click(function () {
          let link = '/report/' + $(this).data('id');
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