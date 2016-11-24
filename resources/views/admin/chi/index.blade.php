@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Danh sách chi
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
    <h1>Quản lý chi</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li class="active">Chi</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Danh sách chi
                </h4>
                <div class="pull-right">
                    @if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('admin/chi/create'))
                    <a class="btn btn-sm btn-default" onclick="newChi()"><span class="glyphicon glyphicon-plus"></span> Tạo mới</a>
                    @endif
                </div>
            </div>
            <br />
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content" id="table">
                    <thead class="flip-content">
                        <tr class="filters">
                            <th align="center">Mã chi</th>
                            <th align="center">Ngày tháng</th>
                            <th align="center">Tiền</th>
                            <th align="center">Nội dung</th>
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
    function deleteChi(item) {
        var obj = $(item).data("obj");
        var url = '{{ route("admin.chi.confirm-delete", ":id") }}';
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
    function editChi(item, type) {
        var obj = $(item).data("obj");
        $("#idChi").val(obj.id);
        $("#ngay_thang_chi").val(obj.ngay_thang_chi);
        $("#tien").val(obj.gia);
        $("#noi_dung").val(obj.noi_dung);
        if (type == "0") {
            //View
            $("#titleModalChi").html('Chi tiết sản phẩm');
            $("#btnSaveChi").hide();
        } else {
            $("#titleModalChi").html('Cập nhật thông tin sản phẩm');
            $("#btnSaveChi").show();
        }
        $("#chiModal").modal();

    }
    function newChi() {
        $("#titleModalChi").html('Thêm mới sản phẩm');
        $("#idChi").val("");
        $("#ngay_thang_chi").val("");
        $("#tien").val("");
        $("#noi_dung").val("");
        $("#btnSaveChi").show();
        $("#chiModal").modal();
    }
</script>
@stop

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="chi_delete_confirm_title" aria-hidden="true">
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

<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script>
    function addLiviconCss() {
        $('.myInfo').addLivicon({
            name: "info",
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

    var accessDelete = "{{ Sentinel::hasAccess('admin.chi.delete') }}";
    var accessEdit = "{{ Sentinel::hasAccess('admin.chi.save') }}";
    var accessShow = "{{ Sentinel::hasAccess('admin.chi.show') }}";

    function initDataTable() {
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
                "lengthMenu": "Hiển thị " + "_MENU_" + " chi",
                "zeroRecords": "Không có chi",
                "info": "Hiển thị " + " _START_" + " đến " + "_END_"
                        + " trên tổng số " + "_MAX_" + " chi",
                "infoEmpty": "Không có chi",
                "infoFiltered": "Tìm thấy _MAX_ chi)",
                "search": "Tìm kiếm",
                "processing": "Đang thực hiện.....",
                "decimal": ",",
                "thousands": ".",
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Trang tiếp",
                    "previous": "Trang trước",
                },
            },
            "order": [[0, "desc"]],
            ajax: {
                url: "{{ route('admin.chi.getAjax') }}",
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
                {"data": "ngay_thang_chi"},
                {"data": "tien"},
                {"data": "noi_dung"},
                {"data": "id"},
            ],
            "columnDefs": [{
                    "targets": 0,
                    "render": function (data, type, row) {
                        return "<center>" + data + "</center>";
                    },
                }, {
                    "targets": 1,
                    "render": function (data, type, row) {
                        var obj = 'data-obj=\'' + JSON.stringify(row).replace(/'/g, "\\'") + "'";
                        return '<a href="#" title=\"Chỉnh sửa chi\" onclick=\'editChi(this,"0")\' ' + obj + '>' + data + "</a>";
                    },
                }, {
                    "targets": -1,
                    "render": function (data, type, row) {
                        var obj = 'data-obj=\'' + JSON.stringify(row).replace(/'/g, "\\'") + "'";
                        var taction = "";
                        if (accessShow) {
                            taction += '<a onclick=\'editChi(this,"0")\' ' + obj + '>';
                            taction += '<i class="myInfo" title=\"Chi tiết chi\",></i>';
                            taction += "</a>";
                        }

                        if (accessEdit) {
                            taction += '<a onclick=\'editChi(this,"1")\' ' + obj + '>';
                            taction += '<i class="myEdit" title=\"Chỉnh sửa chi\",></i>';
                            taction += "</a>";
                        }

                        if (accessDelete) {
                            taction += '<a onclick=\'deleteChi(this)\' ' + obj + '>';
                            taction += '<i class="myDelete" title=\"Xóa chi này\",></i>';
                            taction += "</a>";
                        }
                        return "<center>" + taction + "</center>";
                    },
                }], "drawCallback": function (settings) {
                addLiviconCss();
            }, "initComplete": function (settings, json) {

            }
        });
    }

    $(document).ready(function () {
        initDataTable();
    });
</script>
@include('admin.chi.modal')
@stop

