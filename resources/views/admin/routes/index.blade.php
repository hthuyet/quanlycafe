@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
routes List
@parent
@stop



@section('header_styles')
@parent
<link href="{{ asset('assets/plugins/Multi-Selectable-Tree/dist/jquery.tree-multiselect.min.css') }}" rel="stylesheet" type="text/css"/>
@stop




{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Routes</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>routes</li>
        <li class="active">routes</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Routes List
                </h4>
                <div class="pull-right">
                    <a class="btn btn-sm btn-default" onclick="newPermission()"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                </div>
            </div>
            <br />
            <div class="panel-body">
                <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Path</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($routes as $route)
                        <tr>
                            <td>{!! $route->id !!}</td>
                            <td>{!! $route->name !!}</td>
                            <td>{!! $route->path !!}</td>
                            <td>
                                <a href="{{ route('admin.routes.show', $route->id) }}">
                                    <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view route"></i>
                                </a>
                                <a href="{{ route('admin.routes.edit', $route->id) }}">
                                    <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit route"></i>
                                </a>
                                <a href="{{ route('admin.routes.confirm-delete', $route->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                    <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete route"></i>
                                </a>
                                <a href="#" onclick="editPermission(this, 1,{{ $route->id }})">
                                    <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit route"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>    <!-- row-->
</section>
@stop

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
@parent
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<script>
    
    function initTree(){
        $("#listRoutes").treeMultiselect({
            // Sections have checkboxes which when checked, check everything within them
            allowBatchSelection: true,
            // Selected options can be sorted by dragging
            // Requires jQuery UI
            sortable: false,
            //	Enables selection of all or no options
            enableSelectAll: true,
            // Adds collapsibility to sections
            collapsible: true,
            // Disables selection/deselection of options; aka display-only
            freeze: false,
            // Hide the right panel showing all the selected items
            hideSidePanel: false,
            // Only sections can be checked, not individual items
            onlyBatchSelection: false,
            // Separator between sections in the select option data-section attribute
            sectionDelimiter: '/',
            // Show section name on the selected items
            showSectionOnSelected: true,
            // Activated only if collapsible is true; sections are collapsed initially
            startCollapsed: false,
            // Callback
            onChange: null

        });
    }
    function newPermission() {

    }

    function editPermission(item, type,id) {
        var url = '{{ route("admin.routes.getPermission", ":id") }}';
        console.log(url);
        url = url.replace(':id', id);
        $.ajax({
            method: "GET",
            url: url,
            success: function (response) {
                var obj = null;
                var bodyRoutes = "";
                for(var i=0;i<response.arrayRoutes.length;i++){
                    obj = response.arrayRoutes[i];
                    if(obj.selected === true){
                        bodyRoutes += '<option value="' + obj.id + '" data-section=" ' + obj.section + '" selected="selected">' + obj.value + '</option>';
                    }else{
                        bodyRoutes += '<option value="' + obj.id + '" data-section=" ' + obj.section + '">' + obj.value + '</option>';
                    }
                }
                $("#listRoutes").html(bodyRoutes);
                initTree();
                $("#permissionsModal").modal();
            }, error: function (response) {
                console.log(response);
            }
        });
    }
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
    $(document).ready(function () {
//        initTree();
    });
</script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/Multi-Selectable-Tree/dist/jquery.tree-multiselect.min.js') }}"></script>

@include('admin.routes.modal')
@stop

