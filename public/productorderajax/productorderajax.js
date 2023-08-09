$(document).ready(function(){

    $('.plus').click(function(){
        $main = $(this).parents('tr');
        $proprices = Number($main.find('#price').text().replace('Kyats',''));
        $amount =  $main.find('.count').val();
        $final = $proprices * $amount ;
       $main.find('#one').text($final + 'Kyats');

       ssd();




       });

       $('.minus').click(function(){
        $main = $(this).parents('tr');
        $proprices = Number($main.find('#price').text().replace('Kyats',''));
        $amount =  $main.find('.count').val();
        $final = $proprices * $amount ;
       $main.find('#one').text($final + 'Kyats');

       ssd();
        });

        function ssd(){
            $sub = 0 ;
            $('#tab tbody tr').each(function(index,row){
                $sub += Number($(row).find('#one').text().replace('Kyats' ,''));
            });

            $('#finalsss').text($sub + 'Kyats');
            $('#ok').text($sub+2000+'Kyats');

        }

        $('#order').click(function(){
            $list = [];
            $code = Math.floor(Math.random() * 10000);

            $('#tab tbody tr').each(function(index,row){
                $list.push({
                    'user_id' : $(row).find('#ids').val() ,
                    'pro_id' : $(row).find('#item').val() ,
                    'order_code': $code,
                    'qty' : $(row).find('.count').val(),
                    'total' : Number( $(row).find('#one').text().replace('Kyats','')),
                });
            });

            $.ajax({
                type : 'get',
                dataType : 'json',
                url : 'http://127.0.0.1:8000/productordering' ,
                data : Object.assign({}, $list) ,
                success : function(response){
                    if(response.condition == 'ok'){
                        window.location.href = '/order_page' ;
                    }
                }
            });


         });

});
