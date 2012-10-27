/* 
 * My application jquery functions, listeners and events...
 */
$(document).ready(function(){
    
    $('#user-links').balloon({
        position: 'bottom',
        offsetX: -30,
        offsetY: 6,
        css: {
            minWidth: "100px",
            color: '#00ff33',
            background: '#696969',
            border: '1px solid #ECECEC',
            boxShadow: "0px 0px 3px #ECECEC",
            opacity: 1
        },
        contents: '<ul class="ul-balloon">' +
                  '<li><a href="">Paramètres</a></li>' +
                  '<li><a href="">etc...</a></li>' +
                  '</ul>' +
                  '<hr style="margin: 10px 0px 4px 0px;" />' +
                  '<ul class="ul-balloon">' +
                  '<li><a href="">Déconnexion</a></li>' +
                  '</ul>'
    });
    
    $('#nav li').each(function(iterator){
        $(this).click(function(){
            window.location = $(this).children('a').attr('href'); 
        });
    });
});

    