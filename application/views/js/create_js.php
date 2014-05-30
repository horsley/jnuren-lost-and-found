<script src="/static/js/jquery.min.js"></script>
<script type="text/javascript">
    $('.btn-group>.btn').click( function() {
        $(this).addClass('active').siblings().removeClass('active');
        $("#info_type").val($(this).val());
      });
</script>