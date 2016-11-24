<?php if($errors->any()): ?>
<div class="alert alert-danger alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error:</strong> Please check the form below for errors
</div>
<?php endif; ?>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Success:</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
<div class="alert alert-danger alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error:</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>

<?php if($message = Session::get('warning')): ?>
<div class="alert alert-warning alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Warning:</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
<div class="alert alert-info alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Info:</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>


<div id="customNotifications" class="alert alert-info alert-dismissable margin5" style="display: none;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong id="customNotificationslb">Info:</strong>
    <span id="customNotificationsMess"></span>
</div>

<script type="text/javascript">
    function alertNotifications(type, message) {
        $("#customNotifications").removeClass('alert-danger');
        $("#customNotifications").removeClass('alert-success');
        $("#customNotifications").removeClass('alert-warning');
        $("#customNotifications").removeClass('alert-info');
        if (type == "success") {
            $("#customNotifications").addClass('alert-success');
            $("#customNotificationslb").html('<?php echo trans("message.success"); ?>' + ":");
        } else if (type == "error") {
            $("#customNotifications").addClass('alert-danger');
            $("#customNotificationslb").html('<?php echo trans("message.error"); ?>' + ":");
        } else if (type == "warning") {
            $("#customNotifications").addClass('alert-warning');
            $("#customNotificationslb").html('<?php echo trans("message.warning"); ?>' + ":");
        } else if (type == "info") {
            $("#customNotifications").addClass('alert-info');
            $("#customNotificationslb").html('<?php echo trans("message.info"); ?>' + ":");
        }
        $("#customNotificationsMess").html(message);
        $("#customNotifications").show();
    }
</script>
