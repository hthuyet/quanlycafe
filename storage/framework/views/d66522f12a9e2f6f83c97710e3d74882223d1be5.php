<?php echo Form::open(['route' => ['admin.groups.savePermissions'],'id' => 'roleForm']); ?>

<input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
<div class="modal fade in" id="roleModal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="titleModalRole"> 
                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                </h4>
            </div>
            <div class="modal-body">
                <?php if($errors->any()): ?>
                <ul class="alert alert-danger">
                    <?php foreach($errors->all() as $error): ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>


                <div class="row">
                    <input type="hidden" class="form-control" id="idRole" name="id">
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="name"><?php echo trans('groups/form.name'); ?></label>
                            <input type="text" class="form-control" id="nameRole" name="name" placeholder="Enter name">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-md-12 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="listPermissions"><?php echo trans('groups/form.permission'); ?></label>
                            <span id='treePermissions' style="height: 40%;overflow-y: scroll;">
                                <select name="listPermissions" id="listPermissions" multiple="multiple">
                                </select>
                                <p class="help-block"></p>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="btnSaveRole" type="button" class="btn btn-primary ladda-button" 
                        data-style="expand-left"><?php echo trans('button.save'); ?></button>
                <button type="button" data-dismiss="modal" class="btn"><?php echo trans('button.close'); ?></button>
            </div>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>


<script type="text/javascript">
    $('#roleModal').on('hide.bs.modal', function () {
        $('#roleForm').bootstrapValidator('resetForm', true);
    });

    $('#btnSaveRole').click(function (e) {
        e.preventDefault();
        var $validator = $('#roleForm').data('bootstrapValidator').validate();
        if (!$validator.isValid()) {
            return false;
        }
        var l = Ladda.create(this);
        l.start();

        var data = {
            _token: $("#csrf-token").val(),
            id: $("#idRole").val(),
            name: $("#nameRole").val(),
            listRoutes: $("#listPermissions").val(),
        };

        $.ajax({
            method: "POST",
            url: "<?php echo e(route('admin.groups.savePermissions')); ?>",
            data: data,
            success: function (response) {
                l.stop();
                console.log(response);
                if (response.error) {
                    //Co loi
                    $("#error").html(response.error);
                    return;
                }
                $('#roleModal').modal('hide');
                alertNotifications("success", response.success);
                //redirect to index
                window.location.href = "<?php echo e(URL::to('admin/groups')); ?>";
            }, error: function (response) {
                l.stop();
                if (response.responseJSON) {
                    $("#error").html(response.responseJSON.error);
                }
                console.log(response);
            }
        });
    });

    var messageRequired = '<?php echo e(trans("validation.required",[":attribute" => ":attribute"])); ?>';
    function initValidator() {
        $("#roleForm").bootstrapValidator({
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: messageRequired.replace(':attribute', '<?php echo trans("groups/form.name"); ?>')
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

