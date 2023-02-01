$(function(){
  /*----------SEARCH----------*/
    var timer;

    $('body').on('keyup', '#search', function(e){
      e.stopPropagation();

      var code = (e.keyCode ? e.keyCode : e.which);
      if(code != 9 && code != 16 && code != 17 && code != 18 && code != 20 && code != 13 && code != 27){

        var el = $(this);
        var search = el.val();
        var file = el.attr('ajax');
        
        clearTimeout(timer);
        timer = setTimeout(function(){
          $.ajax({
            beforeSend:function(){},
            url:'ajax/search/'+file+'.php',
            type:'POST',
            dataType:'json',
            data:{search: search}
          }).done(function(data){
            if(data.success){
              el.closest('.search').find('ul.result-list').html(data.result);
            }
            else if(data.reload){
              location.reload();
            }
            else{
              console.log('Error');
            }
          });
        }, 500);
      }

      return false;
    });
  /*------------------------------*/

});