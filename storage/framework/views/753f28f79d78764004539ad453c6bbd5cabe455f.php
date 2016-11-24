<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
Gallery
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>    
    
	<!-- Add fancyBox main CSS files -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/fancybox/jquery.fancybox.css')); ?>" media="screen" />
    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/fancybox/helpers/jquery.fancybox-buttons.css')); ?>" />
    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/fancybox/helpers/jquery.fancybox-thumbs.css')); ?>" />
    <!--page level css end-->
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
                <h1>Gallery</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo e(route('dashboard')); ?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Gallery</a>
                    </li>
                    <li class="active">
                        <a href="#">Gallery</a>
                    </li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary tabtop">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="livicon" data-name="image" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Gallery
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1" data-toggle="tab">Basic Gallery</a>
                                            </li>
                                            <li>
                                                <a href="#tab_2" data-toggle="tab">Standard Gallery</a>
                                            </li>
                                            <li>
                                                <a href="#tab_3" data-toggle="tab">Button Helper</a>
                                            </li>
                                            <li>
                                                <a href="#tab_4" data-toggle="tab">Thubnail Helper</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active gallery-padding" id="tab_1">
                                                <div class="col-md-12">
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-b" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-c" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click on popup for exit">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-effects-a" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" title="Click aside to exit popup">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/1.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /basic gallery -->
                                            <div class="tab-pane gallery-padding" id="tab_2">
                                                <div class="col-md-12">
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 1">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 2">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 3">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 4">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 4">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 1">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 2">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 3">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 4">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 4">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 1">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 ol-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 2">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 3">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 4">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 4">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 1">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 2">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 3">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 4">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Image Title 4">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/2.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /standard gallery -->
                                            <div class="tab-pane gallery-padding" id="tab_3">
                                                <div class="col-md-12">
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo e(asset('assets/img/img_holder/400-x-699-orange.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/3.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /button helper gallery -->
                                            <div class="tab-pane gallery-padding" id="tab_4">
                                                <div class="col-md-12">
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-xs-6 col-sm-3 gallery-border">
                                                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo e(asset('assets/img/img_holder/400-x-699-sky.jpg')); ?>">
                                                            <img src="<?php echo e(asset('assets/img/img_holder/gal/4.jpg')); ?>" class="img-responsive gallery-style" alt="Image">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /thumnail helper gallery -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <!-- nav-tabs-custom -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
        
    <?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>
    
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fancybox/jquery.mousewheel-3.0.6.pack.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fancybox/jquery.fancybox.pack.js?v=2.1.5')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fancybox/helpers/jquery.fancybox-thumbs.js')); ?>" ></script>
    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fancybox/helpers/jquery.fancybox-media.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/pages/gallery.js')); ?>"  ></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>