<li <?php echo (Request::is('admin/booktests') || Request::is('admin/booktests/create') || Request::is('admin/booktests/*') ? 'class="active"' : ''); ?>>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Book</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li <?php echo (Request::is('admin/booktests') ? 'class="active" id="active"' : ''); ?>>
            <a href="<?php echo e(URL::to('admin/booktests')); ?>">
                <i class="fa fa-angle-double-right"></i>
                Booktests
            </a>
        </li>
        <li <?php echo (Request::is('admin/booktests/create') ? 'class="active" id="active"' : ''); ?>>
            <a href="<?php echo e(URL::to('admin/booktests/create')); ?>">
                <i class="fa fa-angle-double-right"></i>
                Add New Booktest
            </a>
        </li>
    </ul>
</li>