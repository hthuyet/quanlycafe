<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('blog/title.create'); ?> :: @parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>

    <link href="<?php echo e(asset('assets/vendors/summernote/summernote.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/vendors/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/pages/blog.css')); ?>" rel="stylesheet" type="text/css">

    <!--end of page level css-->
<?php $__env->stopSection(); ?>


<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <!--section starts-->
    <h1><?php echo app('translator')->get('blog/title.add-blog'); ?></h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                <?php echo app('translator')->get('general.home'); ?>
            </a>
        </li>
        <li>
            <a href="#"><?php echo app('translator')->get('blog/title.blog'); ?></a>
        </li>
        <li class="active"><?php echo app('translator')->get('blog/title.add-blog'); ?></li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
            <!-- errors -->
            <div class="has-error">
                <?php echo $errors->first('title', '<span class="help-block">:message</span>'); ?>

                <?php echo $errors->first('content', '<span class="help-block">:message</span>'); ?>

                <?php echo $errors->first('blog_category_id', '<span class="help-block">:message</span>'); ?>

            </div>
            <?php echo Form::open(array('url' => URL::to('admin/blog/create'), 'method' => 'post', 'class' => 'bf', 'files'=> true)); ?>

                 <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <?php echo Form::text('title', null, array('class' => 'form-control input-lg', 'required' => 'required', 'placeholder'=> trans('blog/form.ph-title'))); ?>

                        </div>
                        <div class='box-body pad'>
                            <?php echo Form::textarea('content', null, array('class' => 'textarea form-control', 'rows'=>'5', 'placeholder'=>trans('blog/form.ph-content'), 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')); ?>

                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php echo Form::label('blog_category_id', trans('blog/form.ll-postcategory')); ?>

                            <?php echo Form::select('blog_category_id',$blogcategory ,null, array('class' => 'form-control select2', 'placeholder'=>trans('blog/form.select-category'))); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::text('tags', null, array('class' => 'form-control input-lg', 'data-role'=>"tagsinput", 'placeholder'=>trans('blog/form.tags'))); ?>

                        </div>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('blog/form.lb-featured-img'); ?></label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileupload-new"><?php echo app('translator')->get('blog/form.select-file'); ?></span>
                                    <span class="fileupload-exists"><?php echo app('translator')->get('blog/form.change'); ?></span>
                                     <?php echo Form::file('image', null, array('class' => 'form-control')); ?>

                                </span>
                                <span class="fileupload-preview"></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><?php echo app('translator')->get('blog/form.publish'); ?></button>
                            <a href="<?php echo URL::to('admin/blog'); ?>"
                               class="btn btn-danger"><?php echo app('translator')->get('blog/form.discard'); ?></a>
                        </div>
                    </div>
                    <!-- /.col-sm-4 --> </div>
                <?php echo Form::close(); ?>

        </div>
    </div>
    <!--main content ends-->
</section>
<?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>
<!-- begining of page level js -->
<!--edit blog-->
<script src="<?php echo e(asset('assets/vendors/summernote/summernote.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/select2/js/select2.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js')); ?>" type="text/javascript" ></script>
<script src="<?php echo e(asset('assets/js/pages/add_newblog.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>