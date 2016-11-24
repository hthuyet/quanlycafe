@if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('admin.users')|| Sentinel::hasAccess('admin.users.index'))
<li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
           data-loop="true"></i>
        <span class="title">Users</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/users') }}">
                <i class="fa fa-angle-double-right"></i>
                Users
            </a>
        </li>
        <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/users/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New User
            </a>
        </li>
        <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::route('users.show',Sentinel::getUser()->id) }}">
                <i class="fa fa-angle-double-right"></i>
                View Profile
            </a>
        </li>
        <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/deleted_users') }}">
                <i class="fa fa-angle-double-right"></i>
                Deleted Users
            </a>
        </li>
    </ul>
</li>
@endif

@if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('admin.groups') || Sentinel::hasAccess('admin.groups.index'))
<li {!! (Request::is('admin/groups') || Request::is('admin/groups/create') || Request::is('admin/groups/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA"
           data-loop="true"></i>
        <span class="title">Groups</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/groups') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/groups') }}">
                <i class="fa fa-angle-double-right"></i>
                Groups
            </a>
        </li>
        <li {!! (Request::is('admin/groups/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/groups/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Group
            </a>
        </li>
    </ul>
</li>
@endif

@if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('admin.sanpham') || Sentinel::hasAccess('admin.sanpham.index'))
<li {!! (Request::is('admin/sanpham') || Request::is('admin/sanpham/create') || Request::is('admin/sanpham/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA"
           data-loop="true"></i>
        <span class="title">Sản phẩm</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/sanpham') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/sanpham') }}">
                <i class="fa fa-angle-double-right"></i>
                Sản phẩm
            </a>
        </li>
    </ul>
</li>
@endif

@if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('admin.ban')|| Sentinel::hasAccess('admin.ban.index'))
<li {!! (Request::is('admin/ban') || Request::is('admin/ban/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA"
           data-loop="true"></i>
        <span class="title">Bàn</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/ban') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/ban') }}">
                <i class="fa fa-angle-double-right"></i>
                Bàn
            </a>
        </li>
    </ul>
</li>
@endif

@if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('admin.chi')|| Sentinel::hasAccess('admin.chi.index'))
<li {!! (Request::is('admin/chi') || Request::is('admin/chi/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA"
           data-loop="true"></i>
        <span class="title">Chi</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/chi') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/chi') }}">
                <i class="fa fa-angle-double-right"></i>
                Chi
            </a>
        </li>
    </ul>
</li>
@endif


@if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('admin.hoadon')|| Sentinel::hasAccess('admin.hoadon.index'))
<li {!! (Request::is('admin/hoadon') || Request::is('admin/hoadon/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA"
           data-loop="true"></i>
        <span class="title">Hóa đơn</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/hoadon') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/hoadon') }}">
                <i class="fa fa-angle-double-right"></i>
                Hóa đơn
            </a>
        </li>
    </ul>
</li>
@endif