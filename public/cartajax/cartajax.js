$(document).ready(function(){

    $('#add').click(function(){
         $proid = $('#proid').val();
        $count = $('#count').val();
        $in = $('#userid').val();


        $.ajax({
            type : 'get',
            url : 'http://127.0.0.1:8000/addtocart',
            dataType : 'json',
            data : {
                'usid' : $in ,
                'proid' : $proid ,
                'count' : $count,
            },
            success : function (response){
                if(response.process == 'ok'){
                    window.location.href = 'http://127.0.0.1:8000/category_product' ;
                }
             }
        });

       });


       $.ajax({
        type : 'get' ,
        url : 'http://127.0.0.1:8000/view' ,
        dataType : 'json',
        data : {'id' : $('#proid').val()}
       });



});
