<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
Edit a booktest
@parent
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1>Booktests</h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>booktests</li>
        <li class="active">Create New booktest</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> 
                        <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Edit booktest
                    </h4>
                </div>
                <div class="panel-body">
                    <?php if($errors->any()): ?>
                    <ul class="alert alert-danger">
                        <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>

                    <?php echo Form::model($booktest, ['method' => 'PATCH', 'action' => ['BooktestsController@update', $booktest->id]]); ?>


                    <div class="form-group">
                        <?php echo Form::label('title', 'Title: '); ?>

                        <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('author', 'Author: '); ?>

                        <?php echo Form::text('author', null, ['class' => 'form-control']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('description', 'Description: '); ?>

                        <?php echo Form::textarea('description', null, ['class' => 'form-control']); ?>

                    </div>



                    <div class="form-group">
                        <?php echo Form::submit('Update', ['class' => 'btn btn-primary form-control']); ?>

                    </div>
                    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>