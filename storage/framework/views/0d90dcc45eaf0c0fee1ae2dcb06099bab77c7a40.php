<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
    Tasks
    @parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/todolist.css')); ?>"/>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/only_dashboard.css')); ?>"/>
    <!-- end of page level css -->
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <!--section starts-->
        <h1>Tasks</h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(route('dashboard')); ?>">
                    <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Dashboard
                </a>
            </li>
            <li class="active">Tasks</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <!-- To do list -->
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary todolist">
                    <div class="panel-heading border-light">
                        <h4 class="panel-title">
                            <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white"
                               data-l="true"></i>
                            To Do List
                        </h4>
                    </div>
                    <div class="panel-body nopadmar">
                        <div class="panel-body">
                            <div class="row list_of_items">
                            </div>
                        <div class="todolist_list adds">
                            <?php echo Form::open(['class'=>'form', 'id'=>'main_input_box']); ?>

                            <div class="form-group">
                                <?php echo Form::label('task_description', 'Task description: '); ?>

                                <?php echo Form::text('task_description', null, ['class' => 'form-control','id'=>'task_description', 'required' => 'required']); ?>

                            </div>
                            <div class="form-group">
                                <?php echo Form::label('task_deadline', 'Deadline: '); ?>

                                <?php echo Form::text('task_deadline', null, ['class' => 'form-control datepicker', 'id'=>'task_deadline', 'data-date-format'=> 'yyyy-mm-dd', 'required' => 'required']); ?>

                            </div>
                            <button type="submit" class="btn btn-primary add_button">
                                Add Task Todo
                            </button>
                            <?php echo Form::close(); ?>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content -->

<?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>

    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/moment/js/moment.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
    <script>
        $(function () {
            $(".datepicker").datepicker();
        });
    </script>

    <script type="text/javascript" src="<?php echo e(asset('assets/js/pages/tasklist.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>