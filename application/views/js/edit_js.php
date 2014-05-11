<script type="text/javascript">
$(function(){
    $('table td').click(function(){
        if(!$(this).is('.input') & !$(this).is('.admin')){
            $(this).addClass('input').html('<input type="text" value="'+ $(this).text() +'" />').find('input').focus().blur(function(){
                var thisid = $(this).parent().siblings("th:eq(0)").text();
                var thisvalue= $(this).val();
                var thisclass = $(this).parent().attr("class").replace(' input', '');  
                var thisparent = $(this).parent();

                $.ajax({
                  type: 'POST',
                  url: '/admin/edit/',
                  data: "thisid="+thisid+"&thisclass="+thisclass+"&thisvalue="+thisvalue,
                  success: function(data){
                            thisparent.removeClass('input').html(thisvalue); 
                        },
                });      
            }); 
        }
    });    
});    
</script>