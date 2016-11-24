<?php echo Form::open(['route' => ['admin.hoadon.save'],'id' => 'hoaDonForm']); ?>

<input type="hidden" name="_token" id="csrf-token" value="<?php echo e(Session::token()); ?>" />
<div class="modal fade in" id="hoaDonModal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="titleModalHD"> 
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
                    <input type="hidden" class="form-control" id="idHd" name="id">
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="ban_id">Bàn</label>
                            <input type="text" class="form-control" id="ban_id" name="ban_id" placeholder="Bàn">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="ngay_thanh_toan">Ngày thanh toán</label>
                            <input type="text" class="form-control" id="ngay_thanh_toan" name="ngay_thanh_toan" placeholder="Ngày thanh toán">
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
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="giam_gia">Giảm giá</label>
                            <input type="text" class="form-control" id="giam_gia" name="giam_gia"  placeholder="Giảm giá">
                            <p class="help-block"></p>
                        </div>
                    </div>


                    <div class="clearfix"></div>

                    <div class="col-md-12 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="ghi_chu">Ghi chú</label>
                            <textarea class="form-control" id="ghi_chu" name="ghi_chu"  placeholder="Ghi chú"></textarea>
                            <p class="help-block"></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="btnSaveHd" type="button" class="btn btn-primary ladda-button" 
                        data-style="expand-left" onclick="saveBook()">Lưu</button>
                <button type="button" data-dismiss="modal" class="btn">Đóng</button>
            </div>
        </div>
    </div>
</div>
<?php echo Form::close(); ?>


<script type="text/javascript">
    $('#hoaDonModal').on('hide.bs.modal', function () {
        $('#hoaDonForm').bootstrapValidator('resetForm', true);
    });
    function format_curency(a) {
        a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    }

    $('#btnSaveHd').click(function (e) {
        e.preventDefault();
        var $validator = $('#hoaDonForm').data('bootstrapValidator').validate();
        if (!$validator.isValid()) {
            return false;
        }
        var l = Ladda.create(this);
        l.start();

        var data = {
            _token: $("#csrf-token").val(),
            id: $("#idHd").val(),
            ban_id: $("#ban_id").val(),
            ngay_thanh_toan: $("#ngay_thanh_toan").val(),
            tien: $("#tien").val(),
            giam_gia: $("#giam_gia").val(),
            ghi_chu: $("#ghi_chu").val(),
            trang_thai: 1,
        };
        $.ajax({
            method: "POST",
            url: "<?php echo e(route('admin.hoadon.save')); ?>",
            data: data,
            success: function (response) {
                l.stop();
                console.log(response);
                if (response.error) {
                    //Co loi
                    $("#error").html(response.error);
                    return;
                }
                $('#hoaDonModal').modal('hide');
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
        $("#hoaDonForm").bootstrapValidator({
            fields: {
                ten: {
                    ban_id: {
                        notEmpty: {
                            message: "Yêu cầu phải nhập bàn"
                        }
                    },
                    required: true,
                    rangelength: [6, 16],
                },
                ngay_thanh_toan: {
                    validators: {
                        notEmpty: {
                            message: "Yêu cầu phải nhập ngày thanh toán"
                        }
                    },
                    required: true,
                    minlength: 3
                },
                tien: {
                    validators: {
                        notEmpty: {
                            message: "Yêu cầu phải nhập tiền"
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

