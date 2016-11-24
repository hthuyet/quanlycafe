{!! Form::open(['route' => ['admin.booktests.saveBook'],'id' => 'bookForm']) !!}
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
<div class="modal fade in" id="bookModal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="titleModalBook"> 
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
                    <input type="hidden" class="form-control" id="idBook" name="id">
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="title">{!! trans('book/form.title') !!}</label>
                            <input type="text" class="form-control" id="titleBook" name="title" placeholder="Enter email">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="col-md-6 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="author">{!! trans('book/form.author') !!}</label>
                            <input type="text" class="form-control" id="authorBook" name="author"  placeholder="Enter email">
                            <p class="help-block"></p>
                        </div>
                    </div>


                    <div class="clearfix"></div>

                    <div class="col-md-12 display-no" style="display: block;">
                        <div class="form-group ui-draggable-handle" style="position: static;">
                            <label for="description">{!! trans('book/form.description') !!}</label>
                            <textarea class="form-control" id="descriptionBook" name="description"  placeholder="Enter email"></textarea>
                            <p class="help-block"></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="btnSaveBook" type="button" class="btn btn-primary ladda-button" 
                        data-style="expand-left" onclick="saveBook()">{!! trans('button.save') !!}</button>
                <button type="button" data-dismiss="modal" class="btn">{!! trans('button.close') !!}</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script type="text/javascript">
    $('#bookForm').on('show.bs.modal', function () {
        $('#bookForm').bootstrapValidator('resetForm', true);
//        console.log($(window).height() - $("#bookModal .modal-content").height());
//        setTimeout(function () {
//            var aa = $(window).height() - $("#bookModal .modal-content").height();
//            console.log(aa);
//            console.log(aa / 3);
//            $("#bookModal").css({top: aa / 3});
//        }, 200);
    });
    $('#btnSaveBook').click(function (e) {
        e.preventDefault();
        var $validator = $('#bookForm').data('bootstrapValidator').validate();
        if (!$validator.isValid()) {
            return false;
        }
        var l = Ladda.create(this);
        l.start();

        var data = {
            _token: $("#csrf-token").val(),
            id: $("#idBook").val(),
            title: $("#titleBook").val(),
            author: $("#authorBook").val(),
            description: $("#descriptionBook").val(),
        };
        $.ajax({
            method: "POST",
            url: "{{ route('admin.booktests.saveBook') }}",
            data: data,
            success: function (response) {
                l.stop();
                console.log(response);
                if (response.error) {
                    //Co loi
                    $("#error").html(response.error);
                    return;
                }
                $('#bookModal').modal('hide');
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

//        alert($('#bookForm').attr('action'));
//        $("#bookForm").submit(function (event) {
//            alert("sf");
//            event.preventDefault();
//        });
//        $("#bookForm").submit(function (event) {
//            alert("Handler for .submit() called.");
//            event.preventDefault();
//        });

//        $('#bookForm').submit(function (event) {
//            console.log("--------------");
//            event.preventDefault();
////            console.log($(this).attr('action'));
////            $.post($(this).attr('action'), $(this).serialize(), function (json) {
////                alert(json);
////            }, 'json');
////            return false;
//        });
    });

    var messageRequired = '{{ trans("validation.required",[":attribute" => ":attribute"]) }}';
    function initValidator() {
        $("#bookForm").bootstrapValidator({
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message: messageRequired.replace(':attribute', '{!! trans("book/form.title") !!}')
                        }
                    },
                    required: true,
                    rangelength: [6, 16],
                },
                author: {
                    validators: {
                        notEmpty: {
                            message: messageRequired.replace(':attribute', '{!! trans("book/form.author") !!}')
                        }
                    },
                    required: true,
                    minlength: 3
                },
                description: {
                    validators: {
                        notEmpty: {
                            message: messageRequired.replace(':attribute', '{!! trans("book/form.description") !!}')
                        }
                    },
                    required: true,
                    minlength: 4
                },
            }
        });
    }

    $(document).ready(function () {
        initValidator();
    });
</script>

