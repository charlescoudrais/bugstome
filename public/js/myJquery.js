/* 
 * My application jquery functions, listeners and events...
 */

$(document).ready(function(){
    $('#nav li').each(function(iterator){
        $(this).click(function(){
            window.location = $(this).children('a').attr('href'); 
        });
    });
    
});

