@extends('admin.adminlayouts.adminlayout')

@section('head')
    <!-- BEGIN PAGE LEVEL STYLES -->
    {!! HTML::style("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css")!!}
    {!!  HTML::style("assets/global/plugins/datatables/plugins/responsive/responsive.bootstrap.css")!!}
    {!! HTML::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')!!}

    <!-- END PAGE LEVEL STYLES -->
@stop

@section('mainarea')

    <!-- BEGIN PAGE HEADER-->
    <div class="page-head">
        <div class="page-title"><h1>
                {{$pageTitle}}
            </h1></div>
    </div>
    <div class="page-bar">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a onclick="loadView('{{ route('admin.dashboard.index') }}')">{{ trans('core.home') }}</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">{{$pageTitle}}</a>

            </li>

        </ul>

    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->

    <div class="row">
        <div class="col-md-12">

            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div id="load">

                {{--INLCUDE ERROR MESSAGE BOX--}}

                {{--END ERROR MESSAGE BOX--}}

            </div>
            <div class="portlet light bordered">

                <div class="portlet-body">

                    @if($loggedAdmin->manager!=1)
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="btn-group">
                                        <a class="btn purple" data-toggle="modal" onclick="showAdd()">

                                            <span class="hidden-xs"> {{ trans('core.btnAddnuData') }} </span><i class="fa fa-plus fa-fw"></i> </a>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                   <div class="pull-right">

                                    <a class="btn purple btn-sm"  href="{{ route('admin.pdf') }}" ><i class="fa fa-download"></i> Download</a>
                                        <a href="{{route('admin.employees.export') }}" class="btn red">
                                            <i class="fa fa-file-excel-o"></i> <span class="hidden-xs">{{ trans('core.export') }}</span>
                                        </a>
                                        <a href="javascript:;" onclick="loadView('{{route('admin.employees.import') }}')" class="btn blue">
                                        <i class="fa fa-upload"></i> <span class="hidden-xs">{{ trans('core.importEmployees') }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <table class="table table-striped table-bordered table-hover responsive hidden" id="table">
                        <thead>
                        <tr>
                            <th>{{ trans('core.serialNo') }}</th>
                            <th> {{ trans('core.fileno') }}</th>
                            <th> {{ trans('core.filename') }}</th>
                            <th> {{ trans('core.createdOn') }}</th>

                            <th class="text-center"> {{trans('core.action')}} </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <!-- END PAGE CONTENT-->

    <div id="add_edit_form" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">{{$pageTitle}}</h4>
                </div>
                <div class="modal-body" id="add_edit_body">
                    {{--Ajax replace content--}}
                </div>
            </div>
        </div>
    </div>

    {{--MODAL CALLING--}}
    @include('admin.common.delete')
    {{--MODAL CALLING END--}}

        <div class="modal fade show_notice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 id="myLargeModalLabel" class="modal-title">
                        Nu data info
                    </h4>
                </div>
                <div class="modal-body" id="modal-data">
                    {{--Notice full Description using Javascript--}}
                </div>
            </div>
        </div>
    </div>

@stop



@section('footerjs')
    {!!  HTML::script("assets/global/plugins/datatables/datatables.min.js") !!}
    {!!  HTML::script("assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js") !!}
    {!! HTML::script("assets/global/plugins/datatables/plugins/responsive/dataTables.responsive.js")!!}
    {!! HTML::script("assets/global/plugins/datatables/plugins/responsive/responsive.bootstrap.js")!!}
    {!! HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!}

    <!-- END PAGE LEVEL PLUGINS -->

    <script>


        var table1 = $('#table').dataTable({
            {!! $datatabble_lang !!}
            processing: true,
            serverSide: true,
            "ajax": "{{ URL::route("admin.nu_datas") }}",
             "autoWidth": false,
             "aaSorting": [[ 1, "asc" ]],
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'fileno', name: 'fileno'},
                { data: 'filename', name: 'filename' },
                {
                    name: 'created_at.timestamp',
                    data: {_: 'created_at.display', sort: 'created_at.timestamp' }
                },
                { data: 'edit', name: 'edit', "bSortable": false ,sClass:'text-center' }
            ],



            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,
            "sPaginationType": "full_numbers",
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {  // set default column settings
                'targets': [4],
                "visible": false,
                "searchable": false
            }
            ],
            "fnInitComplete": function () {
                $(".dataTables_length").addClass("hidden-xs");
                $(this).removeClass("hidden");
            },
            "order": [
                [4, "DESC"]
            ]

        });

        function showAdd() {
            $('#add_edit_form').modal('show');
            $("body").addClass("modal-open");

            var get_url = "{{ route('admin.nu_datas.create') }}";

            $("#add_edit_body").html('<div class="text-center">{!!  HTML::image('assets/loader.gif') !!}</div>');

            $.ajax({
                type: "GET",
                url: get_url,
                data: {}
            }).done(function (response) {
                $("#add_edit_body").html(response);
            });
        }


        function showEdit(id) {
            $('#add_edit_form').modal('show');
            $("body").addClass("modal-open");

            var get_url = "{{ route('admin.nu_datas.edit',':id') }}";


            get_url = get_url.replace(':id', id);

            $("#add_edit_body").html('<div class="text-center">{!!  HTML::image('assets/loader.gif') !!}</div>');

            $.ajax({
                type: "GET",
                url: get_url,
                data: {}
            }).done(function (response) {
                $("#add_edit_body").html(response);
            });
        }

        function addData() {
            var get_url = "{{ route('admin.nu_datas.store') }}";

            $.easyAjax({
                url: get_url,
                type: "POST",
                data: $(".add_form").serialize(),
                container: "#add_edit_form",
                success: function (response) {
                    if (response.status == 'success')
                    {
                        $('#add_edit_form').modal('hide');
                        table1._fnDraw();
                    }
                }
            });
        }

        function updateData(id) {
            var get_url = "{{ route('admin.nu_datas.update',':id') }}";
            get_url = get_url.replace(':id', id);
            $.easyAjax({
                url: get_url,
                type: "PUT",
                data: $(".edit_form").serialize(),
                container: "#add_edit_form",
                success: function (response) {

                    if (response.status == 'success')
                    {
                        $('#add_edit_form').modal('hide');
                        table1._fnDraw();
                    }
                }
            });
        }

        function del(id,category)
        {

            $('#deleteModal').modal('show');
            $("#deleteModal").find('#info').html('{!!  __('messages.nuDataDeleteConfirm') !!} <strong>'+category+'</strong>?<br>' +
                '<br><div class="note note-warning">' +
                '{!! __('messages.deleteNotenuData')!!}'+
                '</div>');

            $('#deleteModal').find("#delete").off().click(function()
            {
                var url = "{{ route('admin.nu_datas.destroy',':id') }}";
                url = url.replace(':id',id);
                $.ajax({

                    type: "DELETE",
                    url : url,
                    dataType: 'json',
                    data: {"id":id}

                }).done(function(response)
                {
                    if(response.success == "deleted")
                    {
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        $('#deleteModal').modal('hide');

                        var msg = prepareMessage("{!! trans("messages.nuDataDeleteMessage") !!}", ":category", category);
                        showToastrMessage(msg, '{{__('core.success')}}', 'success');
                        table1._fnDraw();
                    }
                });
            })

        }

$( ".datepicker" ).datepicker({
  format: 'dd/mm/yyyy',
  autoclose: true,
  autoHide: true,
  todayHighlight: true,
  clearBtn: true,
  orientation: "top"
});

        function show_salary_slip(id) {
            $('#modal-data').html('<div class="text-center">{!! HTML::image('front_assets/img/loader.gif') !!}</div>');
            $.ajax({
                type: "GET",
                url: "{!!  URL::to('admin/singal_data/"+id+"')  !!}"

            }).done(function (response) {
                $('#modal-data').html(response);
//
            });
        }

    </script>
@stop
