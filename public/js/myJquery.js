/* 
 * My application jquery functions, listeners and events...
 */
$(document).ready(function(){
    
    $('#user-links').balloon({
        position: 'bottom',
        offsetX: -50,
        offsetY: 6,
        css: {
            minWidth: "100px",
            padding: '10px 6px 10px 4px',
            color: '#00ff33',
            background: '#696969',
            border: '1px solid #505050',
            boxShadow: "0px 0px 2px 1px #606060",
            opacity: 0.9
        },
        contents: '<ul class="ul-balloon">' +
                  '<li><a href="">YOUR_PARAMS</a></li>' +
                  '<li><a href="">HELP</a></li>' +
                  '<li><a href="">etc...</a></li>' +
                  '</ul>' +
                  '<hr style="margin: 10px 0px 4px 0px;" />' +
                  '<ul class="ul-balloon">' +
                  '<li><a href="" style="color: orange;">LOGOUT</a></li>' +
                  '</ul>'
    });
    
    $('#nav li').each(function(iterator){
        $(this).click(function(){
            window.location = $(this).children('a').attr('href'); 
        });
    });
});

    