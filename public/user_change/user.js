$(document).ready(function(){

    $('.role').change(function() {
        $main = $(this).parents('tr');

        $data = $main.find('.role').val();
        $id = $main.find('#id').val();



        $.ajax({
             dataType : 'json' ,
             type : 'get' ,
             url : 'http://127.0.0.1:8000/userch' ,
             data : { 'main' : $data ,
            'id' : $id } ,
             success : function (response) {
                if(response.status == 'true'){
                    window.location.href = 'http://127.0.0.1:8000/user_list'
                }
              }
        });
     });
});
