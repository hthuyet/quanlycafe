<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
booktests List
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
    <h1><?php echo trans('book/form.titleH1'); ?></h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
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
                    <?php echo trans('book/form.list'); ?>

                </h4>
                <div class="pull-right">
                    <a class="btn btn-sm btn-default" onclick="newBook()"><span class="glyphicon glyphicon-plus"></span> <?php echo app('translator')->get('button.create'); ?></a>                    
                </div>
            </div>
            <br />
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content" id="table">
                    <thead class="flip-content">
                        <tr class="filters">
                            <th align="center"><?php echo trans('book/form.ID'); ?></th>
                            <th align="center"><?php echo trans('book/form.title'); ?></th>
                            <th align="center"><?php echo trans('book/form.author'); ?></th>
                            <th align="center"><?php echo trans('book/form.description'); ?></th>
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
    function deleteBook(item) {
        var obj = $(item).data("obj");
        var url = '<?php echo e(route("admin.booktests.confirm-delete", ":id")); ?>';
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
        var obj = $(item).data("obj");
        $("#idBook").val(obj.id);
        $("#titleBook").val(obj.title);
        $("#authorBook").val(obj.author);
        $("#descriptionBook").val(obj.description);
        if (type == "0") {
            //View
            $("#titleModalBook").html('<?php echo trans("book/form.showTitle"); ?>');
            $("#btnSaveBook").hide();
        } else {
            $("#titleModalBook").html('<?php echo trans("book/form.editTitle"); ?>');
            $("#btnSaveBook").show();
        }
        $("#bookModal").modal();

    }
    function newBook() {
        $("#titleModalBook").html('<?php echo trans("book/form.createTitle"); ?>');
        $("#idBook").val("");
        $("#titleBook").val("");
        $("#authorBook").val("");
        $("#descriptionBook").val("");
        $("#bookModal").modal();
    }
</script>
<?php $__env->stopSection(); ?>

<?php /* Body Bottom confirm modal */ ?>
<?php $__env->startSection('footer_scripts'); ?>
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
            title: '<?php echo trans("book/form.editTitle"); ?>',
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
            title: '<?php echo trans("book/form.deleteTitle"); ?>',
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
                "lengthMenu": "<?php echo trans('dataTable.lengthMenu1'); ?>" + "_MENU_" + "<?php echo trans('dataTable.lengthMenu2'); ?>",
                "zeroRecords": "<?php echo trans('dataTable.zeroRecords'); ?>",
                "info": "<?php echo trans('dataTable.info1'); ?>" + " _START_" + "<?php echo trans('dataTable.info2'); ?>" + "_END_"
                        + "<?php echo trans('dataTable.info3'); ?>" + "_MAX_" + "<?php echo trans('dataTable.info4'); ?>",
                "infoEmpty": "<?php echo trans('dataTable.infoEmpty'); ?>",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "<?php echo trans('dataTable.search'); ?>",
                "processing": "<?php echo trans('dataTable.processing'); ?>",
                "decimal": ",",
                "thousands": ".",
                "paginate": {
                    "first": "<?php echo trans('dataTable.paginate.first'); ?>",
                    "last": "<?php echo trans('dataTable.paginate.last'); ?>",
                    "next": "<?php echo trans('dataTable.paginate.next'); ?>",
                    "previous": "<?php echo trans('dataTable.paginate.previous'); ?>",
                },
            },
            "order": [[ 0, "desc" ]],
            ajax: {
                url: "<?php echo e(route('admin.booktests.getAjax')); ?>",
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
                    "targets": 1,
                    "render": function (data, type, row) {
                        var obj = 'data-obj=\'' + JSON.stringify(row).replace(/'/g, "\\'") + "'";
                        return '<a href="#" title=\"<?php echo trans("book/form.showTitle"); ?>\" onclick=\'editBook(this,"0")\' ' + obj + '>' + data + "</a>";
                    },
                }, {
                    "targets": -1,
                    "render": function (data, type, row) {
                        var obj = 'data-obj=\'' + JSON.stringify(row).replace(/'/g, "\\'") + "'";
                        var taction = "";
                        taction += '<a onclick=\'editBook(this,"0")\' ' + obj + '>';
                        taction += '<i class="myInfo" title=\"<?php echo trans("book/form.showTitle"); ?>\",></i>';
                        taction += "</a>";

                        taction += '<a onclick=\'editBook(this,"1")\' ' + obj + '>';
                        taction += '<i class="myEdit" title=\"<?php echo trans("book/form.editTitle"); ?>\",></i>';
                        taction += "</a>";

                        taction += '<a onclick=\'deleteBook(this)\' ' + obj + '>';
                        taction += '<i class="myDelete" title=\"<?php echo trans("book/form.deleteTitle"); ?>\",></i>';
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
<?php echo $__env->make('admin.booktests.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>