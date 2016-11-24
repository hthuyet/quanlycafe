@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('groups/title.management')
@parent
@stop

@section('header_styles')
@parent
<link href="{{ asset('assets/plugins/Multi-Selectable-Tree/dist/jquery.tree-multiselect.min.css') }}" rel="stylesheet" type="text/css"/>
@stop

{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>@lang('groups/title.management')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('dashboard') }}">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>
                @lang('general.dashboard')
            </a>
        </li>
        <li>@lang('groups/title.groups')</li>
        <li class="active">@lang('groups/title.groups')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        @lang('groups/title.groupslist')
                    </h4>
                    <div class="pull-right">
                        <a class="btn btn-sm btn-default" onclick="newPermission()"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                    @if ($roles->count() >= 1)

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('groups/table.id')</th>
                                <th>@lang('groups/table.name')</th>
                                <th>@lang('groups/table.users')</th>
                                <th>@lang('groups/table.created_at')</th>
                                <th>@lang('groups/table.actions')</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $role)
                            <tr>
                                <td>{!! $role->id !!}</td>
                                <td>{!! $role->name !!}</td>
                                <td>{!! $role->users()->count() !!}</td>
                                <td>{!! $role->created_at->diffForHumans() !!}</td>
                                <td>
                                    @if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('groups/savePermissions'))
                                    <a href="#" onclick="editPermission(this, 1,{{ $role->id }})" data-obj='{!! $role !!}'>
                                        <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit group"></i>
                                    </a>
                                    @endif
                                    <!-- let's not delete 'Admin' group by accident -->
                                    @if ($role->id !== 1)
                                    @if($role->users()->count())
                                    <a href="#" data-toggle="modal" data-target="#users_exists" data-name="{!! $role->name !!}" class="users_exists">
                                        <i class="livicon" data-name="warning-alt" data-size="18"
                                           data-loop="true" data-c="#f56954" data-hc="#f56954"
                                           title="@lang('groups/form.users_exists')"></i>
                                    </a>
                                    @else
                                    @if(Sentinel::hasAccess('admin') || Sentinel::hasAccess('delete/group'))
                                    <a href="{{ route('confirm-delete/group', $role->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                        <i class="livicon" data-name="remove-alt" data-size="18"
                                           data-loop="true" data-c="#f56954" data-hc="#f56954"
                                           title="@lang('groups/form.delete_group')"></i>
                                    </a>
                                    @endif
                                    @endif

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    @lang('general.noresults')
                    @endif   
                </div>
            </div>
        </div>
    </div>    <!-- row-->
</section>




@stop

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<div class="modal fade" id="users_exists" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                @lang('groups/message.users_exists')
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
    });
    $(document).on("click", ".users_exists", function () {
        var group_name = $(this).data('name');
        $(".modal-header h4").text(group_name + " Group");
    });
</script>

<!--Thuyetlv-->
<script>
    function initTree(){
        $("#listPermissions").treeMultiselect({
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
    function resetForm(){
        $("#idRole").val("");
        $("#nameRole").val("");
        $("#treePermissions").html('<select name="listPermissions" id="listPermissions" multiple="multiple">');
        $("#nameRole").val("");
    }
    function showModal(id,obj) {
        if(obj){
            $("#idRole").val(obj.id);
            $("#nameRole").val(obj.name);
        }
        var url = '{{ route("admin.groups.getPermission", ":id") }}';
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
                $("#listPermissions").html(bodyRoutes);
                initTree();
                $("#roleModal").modal();
            }, error: function (response) {
                console.log(response);
            }
        });
    }
    
    function newPermission() {
        resetForm();
        showModal(0,null);
    }

    function editPermission(item, type,id) {
        resetForm();
        if(type == "0"){
            $("#btnSaveRole").hide();
        }else{
            $("#btnSaveRole").show();
        }
        
        var obj = $(item).data("obj");
        showModal(id,obj);
    }
</script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/Multi-Selectable-Tree/dist/jquery.tree-multiselect.min.js') }}"></script>

@include('admin.groups.modal')
@stop
