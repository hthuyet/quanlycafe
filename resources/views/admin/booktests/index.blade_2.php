@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
booktests List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<!-- end of page level css-->
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{!! trans('book/form.titleH1') !!}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>booktests</li>
        <li class="active">booktests</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    {!! trans('book/form.list') !!}
                </h4>
                <div class="pull-right">
                    <a class="btn btn-sm btn-default" onclick="newBook()"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>                    
                </div>
            </div>
            <br />
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content" id="table">
                    <thead class="flip-content">
                        <tr class="filters">
                            <th align="center">{!! trans('book/form.ID') !!}</th>
                            <th align="center">{!! trans('book/form.title') !!}</th>
                            <th align="center">{!! trans('book/form.author') !!}</th>
                            <th align="center">{!! trans('book/form.description') !!}</th>
                            <th align="center">{!! trans('message.actions') !!}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>    <!-- row-->

    <br/><br/><br/>
</section>

<script type="text/javascript">
    function deleteBook(item) {
        var obj = $(item).data("obj");
        var url = '{{ route("admin.booktests.confirm-delete", ":id") }}';
        url = url.replace(':id', obj.id);
        $.ajax({
            method: "GET",
            url: url,
            success: function (response) {
                $("#content_delete_confirm").html(response);
                $("#delete_confirm").modal();
            }, error: function (response) {
                console.log(response);
            }
        });
    }
    function editBook(item, type) {
        console.log($(item).data("obj"));
        var obj = $(item).data("obj");
        console.log(obj);
        $("#idBook").val(obj.id);
        $("#titleBook").val(obj.title);
        $("#authorBook").val(obj.author);
        $("#descriptionBook").val(obj.description);
        if (type == "0") {
            //View
            $("#titleModalBook").html('{!! trans("book/form.showTitle") !!}');
            $("#btnSaveBook").hide();
        } else {
            $("#titleModalBook").html('{!! trans("book/form.editTitle") !!}');
            $("#btnSaveBook").show();
        }
        $("#bookModal").modal();

    }
    function newBook() {
        $("#titleModalBook").html('{!! trans("book/form.createTitle") !!}');
        $("#idBook").val("");
        $("#titleBook").val("");
        $("#authorBook").val("");
        $("#descriptionBook").val("");
        $("#bookModal").modal();
    }
</script>
@stop

@include('admin.booktests.modal')

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="content_delete_confirm">
        </div>
    </div>
</div>
<script>
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
</script>
<script src="{{ asset('assets/vendors/modal/js/classie.js') }}" ></script>
<script src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}" ></script>

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
<script>
    function addLiviconCss() {
        $('.myInfo').addLivicon({
            name: "info",
//            title: '{!! trans("book/form.showTitle") !!}',
            title: 'aaaaaaaa',
            size: 18,
            color: "#428BCA",
            hovercolor: "#428BCA",
            animate: "true",
            loop: true,
            iteration: 3,
            duration: 700,
            eventtype: "hover",
            onparent: false
        });
        $('.myEdit').addLivicon({
            name: "edit",
            title: '{!! trans("book/form.editTitle") !!}',
            size: 18,
            color: "#428BCA",
            hovercolor: "#428BCA",
            animate: "true",
            loop: true,
            iteration: 3,
            duration: 700,
            eventtype: "hover",
            onparent: false
        });
        $('.myDelete').addLivicon({
            name: "remove-alt",
            title: '{!! trans("book/form.deleteTitle") !!}',
            size: 18,
            color: "#f56954",
            hovercolor: "#f56954",
            animate: "true",
            loop: true,
            iteration: 3,
            duration: 700,
            eventtype: "hover",
            onparent: false
        });
    }
    function initDataTable() {
        console.log("-----initDataTable----");
        var table = $('#table').DataTable({
            responsive: true,
            "lengthMenu": [[10, 25, 50], [10, 25, 50]],
            serverSide: true,
            "processing": true,
            "deferRender": true,
            fixedHeader: {
                header: true,
                headerOffset: $('#fixed').height()
            },
            "language": {
                "lengthMenu": "{!! trans('message.lengthMenu1') !!}" + "_MENU_" + "{!! trans('message.lengthMenu2') !!}",
                "zeroRecords": "{!! trans('message.zeroRecords') !!}",
                "info": "{!! trans('message.info1') !!}" + " _START_" + "{!! trans('message.info2') !!}" + "_END_"
                        + "{!! trans('message.info3') !!}" + "_MAX_" + "{!! trans('message.info4') !!}",
                "infoEmpty": "{!! trans('message.infoEmpty') !!}",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "{!! trans('message.search') !!}",
                "decimal": ",",
                "thousands": "."
            },
            ajax: {
                url: "{{ route('admin.booktests.getAjax') }}",
                method: "POST",
                data: function (d) {
                    var info = $('#table').DataTable().page.info();
                    d.page = info.page + 1;
                    d.limit = info.length;
                },
                dataSrc: function (json) {
                    json['recordsTotal'] = json["rtn"]["total"];
                    json['recordsFiltered'] = json["rtn"]["total"];
                    json['data'] = json["rtn"]["data"];
                    return json.data;
                },
            },
            "columns": [
                {"data": "id"},
                {"data": "title"},
                {"data": "author"},
                {"data": "description"},
                {"data": "id"},
            ],
            "columnDefs": [{
                    "targets": 0,
                    "render": function (data, type, row) {
                        return "<center>" + data + "</center>";
                    },
                }, {
                    "targets": -1,
                    "render": function (data, type, row) {
                        var obj = 'data-obj=\'' + JSON.stringify(row).replace(/'/g, "\\'") + "'";
                        var taction = "";
                        taction += '<a onclick=\'editBook(this,"0")\' ' + obj + '>';
                        taction += '<i class="myInfo"></i>';
                        taction += "</a>";

                        taction += '<a onclick=\'editBook(this,"1")\' ' + obj + '>';
                        taction += '<i class="myEdit"></i>';
                        taction += "</a>";

                        taction += '<a onclick=\'deleteBook(this)\' ' + obj + '>';
                        taction += '<i class="myDelete"></i>';
                        taction += "</a>";
                        return "<center>" + taction + "</center>";
                    },
                }],
            "createdRow": function (row, data, index) {
                if (data.RentalOID) {
                    var toDate = new Date(data.ToDate);
                    if (toDate > currentDate) {
//                    console.log(currentDate + " + " + toDate + (currentDate > toDate));
                        if ((maxDate >= toDate)) {
                            $('td', row).addClass('freein');
                        } else {
                            $('td', row).addClass('booked');
                        }
                    }
                } else {
                    $('td', row).addClass('free');
                }
            }, "drawCallback": function (settings) {
                addLiviconCss();
            }, "initComplete": function (settings, json) {

            }
        });
    }

    $(document).ready(function () {
        initDataTable();
    });
</script>
@stop
