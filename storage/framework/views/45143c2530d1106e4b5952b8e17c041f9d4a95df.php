<?php /* Web site Title */ ?>
<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('blogcategory/title.management'); ?>
@parent
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/datatables/css/dataTables.bootstrap.css')); ?>" />
    <link href="<?php echo e(asset('assets/css/pages/tables.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php /* Content */ ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1><?php echo app('translator')->get('blogcategory/title.management'); ?></h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                <?php echo app('translator')->get('general.dashboard'); ?>
            </a>
        </li>
        <li><?php echo app('translator')->get('blogcategory/title.categories'); ?></li>
        <li class="active"><?php echo app('translator')->get('blogcategory/title.categories'); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        <?php echo app('translator')->get('blogcategory/title.blogcategorylist'); ?>
                    </h4>
                    <div class="pull-right">
                    <a href="<?php echo e(URL::to('admin/blogcategory/create')); ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> <?php echo app('translator')->get('button.create'); ?></a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->get('blogcategory/table.id'); ?></th>
                                    <th><?php echo app('translator')->get('blogcategory/table.name'); ?></th>
                                    <th><?php echo app('translator')->get('blogcategory/table.blogs'); ?></th>
                                    <th><?php echo app('translator')->get('blogcategory/table.created_at'); ?></th>
                                    <th><?php echo app('translator')->get('blogcategory/table.actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($blogscategories)): ?>
                                <?php foreach($blogscategories as $bcategory): ?>
                                    <tr>
                                        <td><?php echo e($bcategory->id); ?></td>
                                        <td><?php echo e($bcategory->title); ?></td>
                                        <td><?php echo e($bcategory->blog()->count()); ?></td>
                                        <td><?php echo e($bcategory->created_at->diffForHumans()); ?></td>
                                        <td>
                                            <a href="<?php echo e(URL::to('admin/blogcategory/' . $bcategory->id . '/edit' )); ?>"><i
                                                        class="livicon" data-name="edit" data-size="18" data-loop="true"
                                                        data-c="#428BCA" data-hc="#428BCA"
                                                        title="<?php echo app('translator')->get('blogcategory/form.update-blog'); ?>"></i></a>

                                            <?php if($bcategory->blog()->count()): ?>
                                                <a href="#" data-toggle="modal" data-target="#blogcategory_exists" data-name="<?php echo $bcategory->title; ?>" class="blogcategory_exists">
                                                    <i class="livicon" data-name="warning-alt" data-size="18"
                                                       data-loop="true" data-c="#f56954" data-hc="#f56954"
                                                       title="<?php echo app('translator')->get('blogcategory/form.blogcategoryexists'); ?>"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('confirm-delete/blogcategory', $bcategory->id)); ?>" data-toggle="modal" data-target="#delete_confirm">
                                                    <i class="livicon" data-name="remove-alt" data-size="18"
                                                       data-loop="true" data-c="#f56954" data-hc="#f56954"
                                                       title="<?php echo app('translator')->get('blogcategory/form.deleteblogcategory'); ?>"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>    <!-- row-->
</section>

<?php $__env->stopSection(); ?>
<?php /* Body Bottom confirm modal */ ?>
<?php $__env->startSection('footer_scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/jquery.dataTables.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/datatables/js/dataTables.bootstrap.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="blogcategory_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div class="modal fade" id="blogcategory_exists" tabindex="-2" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <?php echo app('translator')->get('blogcategory/message.blogcategory_have_blog'); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});
        $(document).on("click", ".blogcategory_exists", function () {

            var group_name = $(this).data('name');
            $(".modal-header h4").text( group_name+" blog category" );
        });</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>