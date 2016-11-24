<?php echo Form::open(['route' => ['admin.chi.save'],'id' => 'chiForm']); ?>

<input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
<div class="modal fade in" id="chiModal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="titleModalChi"> 
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
                    <input type="hidden" class="form-control" id="idChi" name="id">
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="ngay_thang_chi">Ngày tháng</label>
                            <input type="text" class="form-control" id="ngay_thang_chi" name="ngay_thang_chi" placeholder="Ngày tháng">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="tien">Tiền</label>
                            <input type="text" class="form-control" id="tien" name="tien" 
                                   onChange="format_curency(this);" placeholder="Tiền">
                            <p class="help-block"></p>
                        </div>
                    </div>


                    <div class="clearfix"></div>

                    <div class="col-md-12 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="noi_dung">Nội dung</label>
                            <textarea class="form-control" id="noi_dung" name="noi_dung"  placeholder="Nội dung"></textarea>
                            <p class="help-block"></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="btnSaveChi" type="button" class="btn btn-primary ladda-button" 
                        data-style="expand-left">Lưu</button>
                <button type="button" data-dismiss="modal" class="btn">Đóng</button>
            </div>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>


<script type="text/javascript">
    $('#chiModal').on('hide.bs.modal', function () {
        $('#chiForm').bootstrapValidator('resetForm', true);
    });
    function format_curency(a) {
        a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    }

    $('#btnSaveChi').click(function (e) {
        e.preventDefault();
        var $validator = $('#chiForm').data('bootstrapValidator').validate();
        if (!$validator.isValid()) {
            return false;
        }
        var l = Ladda.create(this);
        l.start();

        var data = {
            _token: $("#csrf-token").val(),
            id: $("#idChi").val(),
            ngay_thang_chi: $("#ngay_thang_chi").val(),
            tien: $("#tien").val(),
            noi_dung: $("#noi_dung").val(),
        };
        $.ajax({
            method: "POST",
            url: "<?php echo e(route('admin.chi.save')); ?>",
            data: data,
            success: function (response) {
                l.stop();
                console.log(response);
                if (response.error) {
                    //Co loi
                    $("#error").html(response.error);
                    return;
                }
                $('#chiModal').modal('hide');
                alertNotifications("success", response.success);
                $('#table').DataTable().ajax.reload();
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
        $("#chiForm").bootstrapValidator({
            fields: {
                ten: {
                    validators: {
                        notEmpty: {
                            message: "Yêu cầu phải nhập tên sản phẩm"
                        }
                    },
                    required: true,
                    rangelength: [6, 16],
                },
                gia: {
                    validators: {
                        notEmpty: {
                            message: "Yêu cầu phải nhập giá sản phẩm"
                        }
                    },
                    required: true,
                    minlength: 3
                },
            }
        });
    }

    $(document).ready(function () {
        initValidator();
    });
</script>

