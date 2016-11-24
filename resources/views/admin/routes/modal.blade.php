{!! Form::open(['route' => ['admin.routes.savePermissions'],'id' => 'permissionForm']) !!}
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
<div class="modal fade in" id="permissionsModal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="titleModalPermissions"> 
                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                </h4>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif


                <div class="row">
                    <input type="hidden" class="form-control" id="idPermissions" name="id">
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="name">{!! trans('permission/form.name') !!}</label>
                            <input type="text" class="form-control" id="namePermissions" name="name" placeholder="Enter name">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-md-12 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="description">{!! trans('book/form.description') !!}</label>
                            <textarea class="form-control" id="descriptionBook" name="description"  placeholder="Enter email"></textarea>
                            <select id="listRoutes" multiple="multiple">
                                <?php if (isset($arrayRoutes) && count($arrayRoutes)) { ?>
                                    <?php foreach ($arrayRoutes as $route) { ?>
                                        <?php if ($route->selected === true) { ?>
                                            <option value="{!! $route->id !!}" data-section="{!! $route->section !!}" selected="selected">{!! $route->value !!}</option>
                                        <?php } else { ?> 
                                            <option value="{!! $route->id !!}" data-section="{!! $route->section !!}">{!! $route->value !!}</option>
                                        <?php } ?> 
                                    <?php } ?> 
                                <?php } ?>
                            </select>
                            <p class="help-block"></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="btnSavePermissions" type="button" class="btn btn-primary ladda-button" 
                        data-style="expand-left">{!! trans('button.save') !!}</button>
                <button type="button" data-dismiss="modal" class="btn">{!! trans('button.close') !!}</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script type="text/javascript">
    $('#permissionsModal').on('show.bs.modal', function () {
        $('#permissionForm').bootstrapValidator('resetForm', true);
//        console.log($(window).height() - $("#bookModal .modal-content").height());
//        setTimeout(function () {
//            var aa = $(window).height() - $("#bookModal .modal-content").height();
//            console.log(aa);
//            console.log(aa / 3);
//            $("#bookModal").css({top: aa / 3});
//        }, 200);
    });
    $('#btnSavePermissions').click(function (e) {
        e.preventDefault();
        var $validator = $('#permissionForm').data('bootstrapValidator').validate();
        if (!$validator.isValid()) {
            return false;
        }
        var l = Ladda.create(this);
        l.start();

        var data = {
            _token: $("#csrf-token").val(),
            id: $("#idPermissions").val(),
            name: $("#namePermissions").val(),
            listRoutes: $("#listRoutes").val(),
        };
        l.stop();
        console.log(data);
        return;
        
        $.ajax({
            method: "POST",
            url: "{{ route('admin.routes.savePermissions') }}",
            data: data,
            success: function (response) {
                l.stop();
                console.log(response);
                if (response.error) {
                    //Co loi
                    $("#error").html(response.error);
                    return;
                }
                $('#permissionsModal').modal('hide');
                alertNotifications("success", response.success);
//                $('#table').DataTable().ajax.reload();
            }, error: function (response) {
                l.stop();
                if (response.responseJSON) {
                    $("#error").html(response.responseJSON.error);
                }
                console.log(response);
            }
        });
    });

    var messageRequired = '{{ trans("validation.required",[":attribute" => ":attribute"]) }}';
    function initValidator() {
        $("#permissionForm").bootstrapValidator({
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: messageRequired.replace(':attribute', '{!! trans("permission/form.name") !!}')
                        }
                    },
                    required: true,
                    rangelength: [6, 16],
                },
            }
        });
    }

    $(document).ready(function () {
        initValidator();
    });
</script>

