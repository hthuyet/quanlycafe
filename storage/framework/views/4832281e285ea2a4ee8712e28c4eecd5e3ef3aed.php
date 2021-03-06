<?php /* Page title */ ?>
<?php $__env->startSection('title'); ?>
Gallery
@parent
<?php $__env->stopSection(); ?>

<?php /* page level styles */ ?>
<?php $__env->startSection('header_styles'); ?>    
    
	<link href="<?php echo e(asset('assets/css/pages/animated-masonry-gallery.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/fancybox/jquery.fancybox.css')); ?>" media="screen" />
    
<?php $__env->stopSection(); ?>

<?php /* Page content */ ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
                <h1>Masonry Gallery</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo e(route('dashboard')); ?>">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Gallery</a>
                    </li>
                    <li class="active">Masonry Gallery</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="content gallery">
                    <div class="row" id="slim">
                        <div id="gallery">
                            <div class="col-md-5 col-xs-12" id="gallery-header-center-left-title">All Galleries</div>
                            <div class="pull-right">
                                <div class="col-xs-12">
                                    <button type="button" id="filter-all" class="btn btn-responsive btn-info btn-xs">All</button>
                                    <button type="button" id="filter-studio" class="btn btn-responsive btn-primary btn-xs">Studio</button>
                                    <button type="button" id="filter-landscape" class="btn btn-responsive btn-success btn-xs">Landscape</button>
                                </div>
                            </div>
                            <div id="gallery-content">
                                <div class="row" id="gallery-content-center">
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/1.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/1.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>

                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/1.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/1.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>

                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/1.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/1.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>

                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/1.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>

                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/2.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/1.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>

                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/1.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/1.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/1.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/1.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/1.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>

                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/1.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/1.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/1.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/2.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/1.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/big/2.jpg')); ?>" class="img-responsive all landscape" alt="gallery">
                                    </a>
                                    <a class="fancybox img-responsive" href="<?php echo e(asset('assets/img/img_holder/400-x-699-green.jpg')); ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet">
                                        <img src="<?php echo e(asset('assets/img/img_holder/small/2.jpg')); ?>" class="img-responsive all studio" alt="gallery">
                                    </a>
                                </div>
                            </div>
                            <!-- .images-box -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        
    <?php $__env->stopSection(); ?>

<?php /* page level scripts */ ?>
<?php $__env->startSection('footer_scripts'); ?>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/js/pages/jquery.isotope.min.js')); ?>" ></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/pages/animated-masonry-gallery.js')); ?>" ></script>
    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="<?php echo e(asset('assets/vendors/fancybox/jquery.fancybox.js')); ?>" ></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>