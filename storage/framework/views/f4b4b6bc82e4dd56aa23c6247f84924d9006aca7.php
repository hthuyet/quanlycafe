<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
routes List
@parent
<?php $__env->stopSection(); ?>



<?php $__env->startSection('header_styles'); ?>
@parent
<link href="<?php echo e(asset('assets/plugins/Multi-Selectable-Tree/dist/jquery.tree-multiselect.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>




<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>Routes</h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>routes</li>
        <li class="active">routes</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Tree
                </h4>
                <div class="pull-right">
                    <a href="<?php echo e(route('admin.routes.create')); ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> <?php echo app('translator')->get('button.create'); ?></a>
                </div>
            </div>
            <br />
            <div class="panel-body">
                <select id="demo" multiple="multiple">
                    <?php if (isset($arrayRoutes) && count($arrayRoutes)) { ?>
                        <?php foreach ($arrayRoutes as $route) { ?>
                            <?php if ($route->selected === true) { ?>
                                <option value="<?php echo $route->id; ?>" data-section="<?php echo $route->section; ?>" selected="selected"><?php echo $route->value; ?></option>
                            <?php } else { ?> 
                                <option value="<?php echo $route->id; ?>" data-section="<?php echo $route->section; ?>"><?php echo $route->value; ?></option>
                            <?php } ?> 
                        <?php } ?> 
                    <?php } ?>
                    <!--                    <option value="one" data-section="top" selected="selected" data-index="3">C++</option>
                                        <option value="two" data-section="top" selected="selected" data-index="1">Python</option>
                                        <option value="three" data-section="top" selected="selected" data-index="2">Ruby</option>
                                        <option value="four" data-section="top">Swift</option>
                                        <option value="wow" data-section="JavaScript/Library/Popular">jQuery</option>-->
                </select>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php /* Body Bottom confirm modal */ ?>
<?php $__env->startSection('footer_scripts'); ?>
@parent
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<script>
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
    $(document).ready(function () {
        $("#demo").treeMultiselect({
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

    });
</script>
<script src="<?php echo e(asset('assets/plugins/Multi-Selectable-Tree/dist/jquery.tree-multiselect.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>