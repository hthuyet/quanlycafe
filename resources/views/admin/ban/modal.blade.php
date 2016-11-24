{!! Form::open(['route' => ['admin.ban.save'],'id' => 'banForm']) !!}
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
<div class="modal fade in" id="banModal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="titleModalBan"> 
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
                    <input type="hidden" class="form-control" id="idBan" name="id">
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="ten">Tên bàn</label>
                            <input type="text" class="form-control" id="tenBan" name="ten" placeholder="Tên bàn">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="danh_muc_ban">Danh mục bàn</label>
                            <input type="text" class="form-control" id="danh_muc_ban" name="danh_muc_ban" 
                                   onChange="format_curency(this);" placeholder="Danh mục bàn">
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
                <button id="btnSaveBan" type="button" class="btn btn-primary ladda-button" 
                        data-style="expand-left">Lưu</button>
                <button type="button" data-dismiss="modal" class="btn">Đóng</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script type="text/javascript">
    $('#banModal').on('hide.bs.modal', function () {
        $('#banForm').bootstrapValidator('resetForm', true);
    });
    function format_curency(a) {
        a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    }

    $('#btnSaveBan').click(function (e) {
        e.preventDefault();
        var $validator = $('#banForm').data('bootstrapValidator').validate();
        if (!$validator.isValid()) {
            return false;
        }
        var l = Ladda.create(this);
        l.start();

        var data = {
            _token: $("#csrf-token").val(),
            id: $("#idBan").val(),
            ten: $("#tenBan").val(),
            danh_muc_ban: $("#danh_muc_ban").val(),
            ghi_chu: $("#ghi_chu").val(),
            trang_thai: 1,
        };
        $.ajax({
            method: "POST",
            url: "{{ route('admin.ban.save') }}",
            data: data,
            success: function (response) {
                l.stop();
                console.log(response);
                if (response.error) {
                    //Co loi
                    $("#error").html(response.error);
                    return;
                }
                $('#banModal').modal('hide');
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

    var messageRequired = '{{ trans("validation.required",[":attribute" => ":attribute"]) }}';
    function initValidator() {
        $("#banForm").bootstrapValidator({
            fields: {
                ten: {
                    validators: {
                        notEmpty: {
                            message: "Yêu cầu phải nhập tên bàn"
                        }
                    },
                    required: true,
                    rangelength: [6, 16],
                },
                danh_muc_ban: {
                    validators: {
                        notEmpty: {
                            message: "Yêu cầu phải nhập danh mục bàn"
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

