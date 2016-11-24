<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
<?php echo e($blog->title); ?>

@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/frontend/blog.css')); ?>">
    <!--end of page level css-->
<?php $__env->stopSection(); ?>

<?php /* breadcrumb */ ?>
<?php $__env->startSection('top'); ?>
    <div class="breadcum">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(route('home')); ?>"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="#">Blog Item</a>
                </li>
            </ol>
            <div class="pull-right">
                <i class="livicon icon3" data-name="doc-landscape" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Blog Item
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>


<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>
    <!-- Container Section Start -->
    <div class="container">
        <h2 class="primary marl12"><?php echo e($blog->title); ?></h2>
        <div class="row content">
            <!-- Business Deal Section Start -->
            <div class="col-sm-8 col-md-8">
                <div class=" thumbnail featured-post-wide img">
                    <?php if($blog->image): ?>
                        <img src="<?php echo e(URL::to('/uploads/blog/'.$blog->image)); ?>" class="img-responsive" alt="Image">
                    <?php endif; ?>
                    <!-- /.blog-detail-image -->
                    <div class="the-box no-border blog-detail-content">
                        <p class="additional-post-wrap">
                            <span class="additional-post">
                                    <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i> by&nbsp;<a href="#"><?php echo e($blog->author->first_name . ' ' . $blog->author->last_name); ?></a>
                                </span>
                            <span class="additional-post">
                                    <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i><a href="#"> <?php echo e($blog->created_at->diffForHumans()); ?> </a>
                                </span>
                            <span class="additional-post">
                                    <i class="livicon" data-name="comment" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i><a href="#"> <?php echo e($blog->comments->count()); ?> comments</a>
                                </span>
                        </p>
                        <p class="text-justify">
                            <?php echo $blog->content; ?>

                        </p>
                        <p>
                            <strong>Tags: </strong>
                            <?php $__empty_1 = true; foreach($blog->tags as $tag): $__empty_1 = false; ?>
                                <a href="<?php echo e(URL::to('blog/'.mb_strtolower($tag).'/tag')); ?>"><?php echo e($tag); ?></a>,
                            <?php endforeach; if ($__empty_1): ?>
                                No Tags
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
                <!-- /the.box .no-border -->
                <!-- Media left section start -->
                <h3 class="comments"><?php echo e($blog->comments->count()); ?> Comments</h3><br />
                <ul class="media-list">
                    <?php foreach($blog->comments as $comment): ?>
                    <li class="media">
                        <div class="media-body">
                            <h4 class="media-heading"><i><?php echo e($comment->name); ?></i></h4>
                            <p><?php echo e($comment->comment); ?></p>
                            <p class="text-danger">
                                <small> <?php echo $comment->created_at; ?></small>
                            </p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <!-- //Media left section End -->
                <!-- Comment Section Start -->
                <h3>Leave a Comment</h3>
                <?php echo Form::open(array('url' => URL::to('blogitem/'.$blog->id.'/comment'), 'method' => 'post', 'class' => 'bf', 'files'=> true)); ?>


                <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                    <?php echo Form::text('name', null, array('class' => 'form-control input-lg','required' => 'required', 'placeholder'=>'Your name')); ?>

                    <span class="help-block"><?php echo e($errors->first('name', ':message')); ?></span>
                </div>
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                    <?php echo Form::text('email', null, array('class' => 'form-control input-lg','required' => 'required', 'placeholder'=>'Your email')); ?>

                    <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                </div>
                <div class="form-group <?php echo e($errors->has('website') ? 'has-error' : ''); ?>">
                    <?php echo Form::text('website', null, array('class' => 'form-control input-lg', 'placeholder'=>'Your website')); ?>

                    <span class="help-block"><?php echo e($errors->first('website', ':message')); ?></span>
                </div>
                <div class="form-group <?php echo e($errors->has('comment') ? 'has-error' : ''); ?>">
                    <?php echo Form::textarea('comment', null, array('class' => 'form-control input-lg no-resize','required' => 'required', 'style'=>'height: 200px', 'placeholder'=>'Your comment')); ?>

                    <span class="help-block"><?php echo e($errors->first('comment', ':message')); ?></span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md"><i class="fa fa-comment"></i>
                        Submit
                    </button>
                </div>
                <?php echo Form::close(); ?>

                <!-- //Comment Section End -->
            </div>
            <!-- //Business Deal Section End -->
            <!-- /.col-sm-9 -->
            <!-- Recent Posts Section Start -->
            <div class="col-sm-4 col-md-4 col-full-width-left">
                <div class="the-box">
                        <h3 class="small-heading text-center">RECENT POSTS</h3>
                        <ul class="media-list media-xs media-dotted">
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img src="<?php echo e(asset('assets/images/authors/avatar1.jpg')); ?>" class="img-circle img-responsive pull-left" alt="riot">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading primary">
                                                        <a href="#">Elizabeth Owens at Duis autem vel eum iriure dolor in hendrerit in</a>
                                                    </h4>
                                    <p class="date">
                                        <small class="text-danger">2hours ago</small>
                                    </p>
                                    <p class="small">
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo
                                    </p>
                                </div>
                            </li>
                            <hr>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img src="<?php echo e(asset('assets/images/authors/avatar4.jpg')); ?>" class="img-circle img-responsive pull-left" alt="riot">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading primary">
                                                        <a href="#">Harold Chavez at Duis autem vel eum iriure dolor in hendrerit in</a>
                                                    </h4>
                                    <p class="date">
                                        <small class="text-danger">5hours ago</small>
                                    </p>
                                    <p class="small">
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo
                                    </p>
                                </div>
                            </li>
                            <hr>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img src="<?php echo e(asset('assets/images/authors/avatar5.jpg')); ?>" class="img-circle img-responsive pull-left" alt="riot">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading primary">
                                                        <a href="#">Mihaela Cihac at Duis autem vel eum iriure dolor in hendrerit in</a>
                                                    </h4>
                                    <p class="date">
                                        <small class="text-danger">10hours ago</small>
                                    </p>
                                    <p class="small">
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo
                                    </p>
                                </div>
                            </li>
                        </ul>
                </div>
                <!-- /.the-box .bg-primary .no-border .text-center .no-margin -->
            </div>
            <!-- //Recent Posts Section End -->
            <!-- /.col-sm-3 -->
        </div>
    </div>
    <!-- //Conatainer Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>