<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
Danh sách sản phẩm
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendors/datatables/css/dataTables.bootstrap.css')); ?>" />
<link href="<?php echo e(asset('assets/css/pages/tables.css')); ?>" rel="stylesheet" type="text/css" />
<!-- end of page level css-->
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>Quản lý bàn</h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li class="active">Bàn</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Danh sách bàn
                </h4>
                <div class="pull-right">
                    <a class="btn btn-sm btn-default" onclick="newBan()"><span class="glyphicon glyphicon-plus"></span> Tạo mới</a>
                </div>
            </div>
            <br />
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content" id="table">
                    <thead class="flip-content">
                        <tr class="filters">
                            <th align="center">Mã bàn</th>
                            <th align="center">Tên bàn</th>
                            <th align="center">Danh mục bàn</th>
                            <th align="center">Chi chú</th>
                            <th align="center">Trạng thái</th>
                            <th align="center"><?php echo trans('message.actions'); ?></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>    <!-- row-->

    <br/><br/><br/>
</section>

<script type="text/javascript">
    function deleteBan(item) {
        var obj = $(item).data("obj");
        var url = '<?php echo e(route("admin.ban.confirm-delete", ":id")); ?>';
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
    function editBan(item, type) {
        var obj = $(item).data("obj");
        $("#idBan").val(obj.id);
        $("#tenBan").val(obj.ten);
        $("#danh_muc_ban").val(obj.danh_muc_ban);
        $("#ghi_chu").val(obj.ghi_chu);
        if (type == "0") {
            //View
            $("#titleModalBan").html('Chi tiết bàn');
            $("#btnSaveSp").hide();
        } else {
            $("#titleModalBan").html('Cập nhật thông tin bàn');
            $("#btnSaveSp").show();
        }
        $("#banModal").modal();

    }
    function newBan() {
        $("#titleModalBan").html('Thêm mới bàn');
        $("#idBan").val("");
        $("#tenBan").val("");
        $("#danh_muc_ban").val("");
        $("#ghi_chu").val("");
        $("#banModal").modal();
    }
</script>
<?php $__env->stopSection(); ?>

<?php /* Body Bottom confirm modal */ ?>
<?php $__env->startSection('footer_scripts'); ?>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="ban_delete_confirm_title" aria-hidden="true">
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
<script src="<?php echo e(asset('assets/vendors/modal/js/classie.js')); ?>" ></script>
<script src="<?php echo e(asset('assets/vendors/modal/js/modalEffects.js')); ?>" ></script>

<script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/jquery.dataTables.js')); ?>" ></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/dataTables.bootstrap.js')); ?>" ></script>
<script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/dataTables.responsive.js')); ?>" ></script>

<script src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>" ></script>
<script src="<?php echo e(asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js')); ?>"  type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/select2/js/select2.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')); ?>" type="text/javascript"></script>
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
                "lengthMenu": "Hiển thị " + "_MENU_" + " bàn",
                "zeroRecords": "Không có bàn",
                "info": "Hiển thị " + " _START_" + " đến " + "_END_"
                        + " trên tổng số " + "_MAX_" + " bàn",
                "infoEmpty": "Không có bàn",
                "infoFiltered": "Tìm thấy _MAX_ bàn)",
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
                url: "<?php echo e(route('admin.ban.getAjax')); ?>",
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
                {"data": "danh_muc_ban"},
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
                        var obj = 'data-obj=\'' + JSON.stringify(row).replace(/'/g, "\\'") + "'";
                        return '<a href="#" title=\"Chỉnh sửa bàn\" onclick=\'editBan(this,"0")\' ' + obj + '>' + data + "</a>";
                    },
                }, {
                    "targets": -1,
                    "render": function (data, type, row) {
                        var obj = 'data-obj=\'' + JSON.stringify(row).replace(/'/g, "\\'") + "'";
                        var taction = "";
                        taction += '<a onclick=\'editBan(this,"0")\' ' + obj + '>';
                        taction += '<i class="myInfo" title=\"Chi tiết bàn\",></i>';
                        taction += "</a>";

                        taction += '<a onclick=\'editBan(this,"1")\' ' + obj + '>';
                        taction += '<i class="myEdit" title=\"Chỉnh sửa bàn\",></i>';
                        taction += "</a>";

                        taction += '<a onclick=\'deleteBan(this)\' ' + obj + '>';
                        taction += '<i class="myDelete" title=\"Xóa bàn này\",></i>';
                        taction += "</a>";
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
<?php echo $__env->make('admin.ban.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>