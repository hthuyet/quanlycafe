<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('groups/title.management'); ?>
@parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_styles'); ?>
@parent
<link href="<?php echo e(asset('assets/plugins/Multi-Selectable-Tree/dist/jquery.tree-multiselect.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1><?php echo app('translator')->get('groups/title.management'); ?></h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                <?php echo app('translator')->get('general.dashboard'); ?>
            </a>
        </li>
        <li><?php echo app('translator')->get('groups/title.groups'); ?></li>
        <li class="active"><?php echo app('translator')->get('groups/title.groups'); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        <?php echo app('translator')->get('groups/title.groupslist'); ?>
                    </h4>
                    <div class="pull-right">
                        <a class="btn btn-sm btn-default" onclick="newPermission()"><span class="glyphicon glyphicon-plus"></span> <?php echo app('translator')->get('button.create'); ?></a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                    <?php if($roles->count() >= 1): ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('groups/table.id'); ?></th>
                                <th><?php echo app('translator')->get('groups/table.name'); ?></th>
                                <th><?php echo app('translator')->get('groups/table.users'); ?></th>
                                <th><?php echo app('translator')->get('groups/table.created_at'); ?></th>
                                <th><?php echo app('translator')->get('groups/table.actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($roles as $role): ?>
                            <tr>
                                <td><?php echo $role->id; ?></td>
                                <td><?php echo $role->name; ?></td>
                                <td><?php echo $role->users()->count(); ?></td>
                                <td><?php echo $role->created_at->diffForHumans(); ?></td>
                                <td>
                                    <?php if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('groups/savePermissions')): ?>
                                    <a href="#" onclick="editPermission(this, 1,<?php echo e($role->id); ?>)" data-obj='<?php echo $role; ?>'>
                                        <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit group"></i>
                                    </a>
                                    <?php endif; ?>
                                    <!-- let's not delete 'Admin' group by accident -->
                                    <?php if($role->id !== 1): ?>
                                    <?php if($role->users()->count()): ?>
                                    <a href="#" data-toggle="modal" data-target="#users_exists" data-name="<?php echo $role->name; ?>" class="users_exists">
                                        <i class="livicon" data-name="warning-alt" data-size="18"
                                           data-loop="true" data-c="#f56954" data-hc="#f56954"
                                           title="<?php echo app('translator')->get('groups/form.users_exists'); ?>"></i>
                                    </a>
                                    <?php else: ?>
                                    <?php if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('delete/group')): ?>
                                    <a href="<?php echo e(route('confirm-delete/group', $role->id)); ?>" data-toggle="modal" data-target="#delete_confirm">
                                        <i class="livicon" data-name="remove-alt" data-size="18"
                                           data-loop="true" data-c="#f56954" data-hc="#f56954"
                                           title="<?php echo app('translator')->get('groups/form.delete_group'); ?>"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <?php echo app('translator')->get('general.noresults'); ?>
                    <?php endif; ?>   
                </div>
            </div>
        </div>
    </div>    <!-- row-->
</section>




<?php $__env->stopSection(); ?>

<?php /* Body Bottom confirm modal */ ?>
<?php $__env->startSection('footer_scripts'); ?>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<div class="modal fade" id="users_exists" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <?php echo app('translator')->get('groups/message.users_exists'); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
    $(document).on("click", ".users_exists", function () {
        var group_name = $(this).data('name');
        $(".modal-header h4").text(group_name + " Group");
    });
</script>

<!--Thuyetlv-->
<script>
    function initTree(){
        $("#listPermissions").treeMultiselect({
            // Sections have checkboxes which when checked, check everything within them
            allowBatchSelection: true,
            // Selected options can be sorted by dragging
            // Requires jQuery UI
            sortable: false,
            //	Enables selection of all or no options
            enableSelectAll: true,
            // Adds collapsibility to sections
            collapsible: true,
            // Disables selection/deselection of options; aka display-only
            freeze: false,
            // Hide the right panel showing all the selected items
            hideSidePanel: false,
            // Only sections can be checked, not individual items
            onlyBatchSelection: false,
            // Separator between sections in the select option data-section attribute
            sectionDelimiter: '/',
            // Show section name on the selected items
            showSectionOnSelected: true,
            // Activated only if collapsible is true; sections are collapsed initially
            startCollapsed: false,
            // Callback
            onChange: null

        });
    }
    function resetForm(){
        $("#idRole").val("");
        $("#nameRole").val("");
        $("#treePermissions").html('<select name="listPermissions" id="listPermissions" multiple="multiple">');
        $("#nameRole").val("");
    }
    function showModal(id,obj) {
        if(obj){
            $("#idRole").val(obj.id);
            $("#nameRole").val(obj.name);
        }
        var url = '<?php echo e(route("admin.groups.getPermission", ":id")); ?>';
        url = url.replace(':id', id);
        $.ajax({
            method: "GET",
            url: url,
            success: function (response) {
                var obj = null;
                var bodyRoutes = "";
                for(var i=0;i<response.arrayRoutes.length;i++){
                    obj = response.arrayRoutes[i];
                    if(obj.selected === true){
                        bodyRoutes += '<option value="' + obj.id + '" data-section=" ' + obj.section + '" selected="selected">' + obj.value + '</option>';
                    }else{
                        bodyRoutes += '<option value="' + obj.id + '" data-section=" ' + obj.section + '">' + obj.value + '</option>';
                    }
                }
                $("#listPermissions").html(bodyRoutes);
                initTree();
                $("#roleModal").modal();
            }, error: function (response) {
                console.log(response);
            }
        });
    }
    
    function newPermission() {
        resetForm();
        showModal(0,null);
    }

    function editPermission(item, type,id) {
        resetForm();
        if(type == "0"){
            $("#btnSaveRole").hide();
        }else{
            $("#btnSaveRole").show();
        }
        
        var obj = $(item).data("obj");
        showModal(id,obj);
    }
</script>
<script src="<?php echo e(asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/Multi-Selectable-Tree/dist/jquery.tree-multiselect.min.js')); ?>"></script>

<?php echo $__env->make('admin.groups.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>