@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Danh sách sản phẩm
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
    <h1>Quản lý sản phẩm</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li class="active">Sản phẩm</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Danh sách sản phẩm
                </h4>
                <div class="pull-right">
                    @if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('admin/sanpham/create'))
                    <a class="btn btn-sm btn-default" onclick="newSanPham()"><span class="glyphicon glyphicon-plus"></span> Tạo mới</a>
                    @endif
                </div>
            </div>
            <br />
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content" id="table">
                    <thead class="flip-content">
                        <tr class="filters">
                            <th align="center">Mã SP</th>
                            <th align="center">Tên SP</th>
                            <th align="center">Giá SP</th>
                            <th align="center">Chi chú</th>
                            <th align="center">Trạng thái</th>
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
    var accessDelete = "{{ Sentinel::hasAccess('admin.sanpham.delete') }}";
    var accessEdit = "{{ Sentinel::hasAccess('admin.sanpham.saveSp') }}";
    var accessShow = "{{ Sentinel::hasAccess('admin.sanpham.show') }}";
    
    function deleteSanPham(item) {
        var obj = $(item).data("obj");
        var url = '{{ route("admin.sanpham.confirm-delete", ":id") }}';
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
    function editSanPham(item, type) {
        var obj = $(item).data("obj");
        $("#idSp").val(obj.id);
        $("#nameSp").val(obj.ten);
        $("#giaSp").val(obj.gia);
        $("#descriptionSp").val(obj.ghi_chu);
        if (type == "0") {
            //View
            $("#titleModalSp").html('Chi tiết sản phẩm');
            $("#btnSaveSp").hide();
        } else {
            $("#titleModalSp").html('Cập nhật thông tin sản phẩm');
            $("#btnSaveSp").show();
        }
        $("#sanPhamModal").modal();

    }
    function newSanPham() {
        $("#titleModalSp").html('Thêm mới sản phẩm');
        $("#idSp").val("");
        $("#nameSp").val("");
        $("#giaSp").val("");
        $("#descriptionSp").val("");
        $("#btnSaveSp").show();
        $("#sanPhamModal").modal();
    }
</script>
@stop

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="sanpham_delete_confirm_title" aria-hidden="true">
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
                "lengthMenu": "Hiển thị " + "_MENU_" + " sản phẩm",
                "zeroRecords": "Không có sản phẩm",
                "info": "Hiển thị " + " _START_" + " đến " + "_END_"
                        + " trên tổng số " + "_MAX_" + " sản phẩm",
                "infoEmpty": "Không có sản phẩm",
                "infoFiltered": "Tìm thấy _MAX_ sản phẩm)",
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
                url: "{{ route('admin.sanpham.getAjax') }}",
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
                {"data": "ten"},
                {"data": "gia"},
                {"data": "ghi_chu"},
                {"data": "trang_thai"},
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
                        if (accessEdit) {
                            var obj = 'data-obj=\'' + JSON.stringify(row).replace(/'/g, "\\'") + "'";
                            return '<a href="#" title=\"Chỉnh sửa sản phẩm\" onclick=\'editSanPham(this,"0")\' ' + obj + '>' + data + "</a>";
                        }else{
                            return data;
                        }
                    },
                }, {
                    "targets": 2,
                    "render": function (data, type, row) {
                        return Number(data).format(2, 3, '.', ',');
                    },
                }, {
                    "targets": -1,
                    "render": function (data, type, row) {
                        var obj = 'data-obj=\'' + JSON.stringify(row).replace(/'/g, "\\'") + "'";
                        var taction = "";
                        if (accessShow) {
                            taction += '<a onclick=\'editSanPham(this,"0")\' ' + obj + '>';
                            taction += '<i class="myInfo" title=\"Chi tiết sản phẩm\",></i>';
                            taction += "</a>";
                        }


                        if (accessEdit) {
                            taction += '<a onclick=\'editSanPham(this,"1")\' ' + obj + '>';
                            taction += '<i class="myEdit" title=\"Chỉnh sửa sản phẩm\",></i>';
                            taction += "</a>";
                        }

                        if (accessDelete) {
                            taction += '<a onclick=\'deleteSanPham(this)\' ' + obj + '>';
                            taction += '<i class="myDelete" title=\"Xóa sản phẩm này\",></i>';
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
@include('admin.sanpham.modal')
@stop

