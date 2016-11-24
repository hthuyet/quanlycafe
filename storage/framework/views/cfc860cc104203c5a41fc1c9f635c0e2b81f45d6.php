<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('blog/title.blogdetail'); ?>
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/pages/blog.css')); ?>" />
<?php $__env->stopSection(); ?>


<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <!--section starts-->
    <h1><?php echo $blog->title; ?></h1>
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo e(route('dashboard')); ?>"> <i class="livicon" data-name="home" data-size="14" data-c="#000" data-loop="true"></i>
                <?php echo app('translator')->get('general.dashboard'); ?>
            </a>
        </li>
        <li> <?php echo app('translator')->get('blog/title.blog'); ?></li>
        <li class="active"><?php echo app('translator')->get('blog/title.blogdetail'); ?></li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-sm-11 col-md-12 col-full-width-right">
            <div class="blog-detail-image">
                <?php if(!empty($blog->image)): ?>
                <img src="<?php echo e(URL::to('uploads/blog/'.$blog->image)); ?>" class="img-responsive" alt="Image">
                <?php else: ?>
                <img data-src="holder.js/791x380/#6cc66c:#fff" class="img-responsive" alt="Image">
                <?php endif; ?>
                </div>
            <!-- /.blog-detail-image -->
            <div class="the-box no-border blog-detail-content">
                <p>
                    <span class="label label-danger square"><?php echo $blog->created_at; ?></span>
                </p>
                <p class="text-justify">
                <?php echo $blog->content; ?>

                </p>
                <p><strong>Tags:</strong> <?php echo $blog->tagList; ?></p>
                <hr>
                    <p>
                        <span class="label label-success square"><?php echo app('translator')->get('blog/title.comments'); ?></span>
                    </p>
                    <?php if(!empty($comments)): ?>
                        <ul class="media-list media-sm media-dotted recent-post">
                            <?php foreach($comments as $comment): ?>
                                <li class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="<?php echo $comment->website; ?>"><?php echo $comment->name; ?></a>
                                        </h4>
                                        <p>
                                            <?php echo $comment->comment; ?>

                                        </p>
                                        <p class="text-danger">
                                            <small> <?php echo $comment->created_at; ?></small>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <hr>
                <p>
                    <span class="label label-info square"><?php echo app('translator')->get('blog/title.leavecomment'); ?></span>
                </p>
                 <?php echo Form::open(array('url' => URL::to('admin/blog/'.$blog->id.'/storecomment'), 'method' => 'post', 'class' => 'bf', 'files'=> true)); ?>


                <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <?php echo Form::text('name', null, array('class' => 'form-control input-lg','required' => 'required', 'placeholder'=>trans('blog/form.ph-name'))); ?>

                    <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                </div>
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <?php echo Form::text('email', null, array('class' => 'form-control input-lg','required' => 'required', 'placeholder'=>trans('blog/form.ph-email'))); ?>

                    <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                </div>
                <div class="form-group <?php echo e($errors->has('website') ? 'has-error' : ''); ?>">
                    <?php echo Form::text('website', null, array('class' => 'form-control input-lg', 'placeholder'=>trans('blog/form.ph-website'))); ?>

                        <span class="help-block"><?php echo e($errors->first('website', ':message')); ?></span>
                </div>
                <div class="form-group <?php echo e($errors->has('comment') ? 'has-error' : ''); ?>">
                    <?php echo Form::textarea('comment', null, array('class' => 'form-control input-lg no-resize','required' => 'required', 'style'=>'height: 200px', 'placeholder'=>trans('blog/form.ph-comment'))); ?>

                    <span class="help-block"><?php echo e($errors->first('comment', ':message')); ?></span>
                </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-md"><i class="fa fa-comment"></i>
                            <?php echo app('translator')->get('blog/form.save-comment'); ?>
                        </button>
                    </div>
                <?php echo Form::close(); ?>

            </div>
            <!-- /the.box .no-border --> </div>
        <!-- /.col-sm-9 --></div>
    <!--main content ends-->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>