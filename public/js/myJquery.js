/* 
 * My application jquery functions, listeners and events...
 */


    
$(document).ready(function(){
   
   $('#user-links').balloon({
        position: 'bottom',
        offsetX: -30,
        offsetY: 6,
        tipSize: 20,
        css: {
            minWidth: "300px",
            padding: '10px 6px 10px 4px',
            color: '#00ff33',
            background: '#696969',
            border: '3px solid #efefef',
            borderRadius: '1px',
            boxShadow: "0px 0px 2px 0px #606060",
            opacity: 1
        },
        contents: '<ul class="ul-balloon">'
                    + '<li class="li-balloon">'
                      + '<a href="/project/list">My Projects</a>'
                    + '</li>'
                    + '<li class="li-balloon">'
                      + '<a href="/task/list">My Tasks</a>'
                    + '</li>'
                    + '<li class="li-balloon">'
                      + '<a href="/note/list">My Notes</a>'
                    + '</li>'
                    + '<li class="li-balloon">'
                      + '<a href="">Help</a>'
                    + '</li>'
                    + '<li class="li-balloon li-balloon-separator">'
                      + '&nbsp;'
                    + '</li>'
                    + '<li class="li-balloon">'
                        + '<a href="/user/me">My account</a>'
                    + '</li>'
                    + '<li class="li-balloon">'
                        + '<a href="/user/logout" style="color: orange;">LOGOUT</a>'
                    + '</li>'
                  + '</ul>'
    });
    
    $('li-balloon').each(function(i){
        $(this).on("click", function(){
            window.location = $(this).find('a').attr('href'); 
        });
    });
    $('#nav li').each(function(iterator) {
        $(this).on("click", function() {
            window.location = $(this).find('a').attr('href'); 
        });
        $(this).on("mouseover", function() {
            $(this).find('ul').show();
        });
        $(this).on("mouseout", function() {
            $(this).find('ul').hide();
        });
    });
    
    $('.ul-btn-add li').each(function(iterator) {
        var href = $(this).find('a').attr('href');
        var options = {
            position: 'left',
            offsetX: 0,
            offsetY: 0,
            tipSize: 16,
            showAnimation: null,
            hideDuration: 0,
            css: {
                minWidth: "100px",
                padding: '10px 6px 10px 4px',
                color: 'maroon',
                background: 'orange',
                border: '2px solid maroon',
                borderRadius: '1px',
                boxShadow: "0px 0px 2px 0px #606060",
                opacity: 0.9
            },
            contents: 'You need to fill the form before...'
        }
                
        $(this).on("click", function() {
            window.location = href; 
        });
        
        if (href == 'javascript: var i = 0; return false;') {
            $(this).balloon(options);
            $(this).find('a').css({
               textDecoration: 'none',
               cursor: 'default'
            });
        } else {
            $(this).css({
                cursor: 'pointer'
            });
        }
        
        $(this).on("mouseover", function() {
            $(this).css({
                backgroundColor: '#f5f5f5'
            });
            
            $(this).find('a').css({
                textDecoration: 'underline',
                cursor: 'pointer',
                color: ((href.indexOf('task/0') > 0) ? '#b16500' : '#1f6ba2')
            });
        });
        $(this).on("mouseout", function() {
           $(this).css({
               background: 'none'
           });
           $(this).find("a").css({
               textDecoration: 'none',
               color: ((href.indexOf('task/0') > 0) ? '#d98e2b' : '#49a0df')
           }); 
        });
    }); 
    
    $(".td-index-bottom-link-a, .td-index-bottom-link-b ,"
        + ".td-to-project-link-a, .td-to-project-link-b, "
        + ".td-to-task-link-a, .td-to-task-link-b, "
        + ".li-tasks, .li-projects"
    ).each( function() {
       $(this).on('mouseover', function() {
           $(this).css({
              cursor: 'pointer'
           });
           $(this).find("a:not(.create)").css({
              color: '#1f6ba2' 
           });
       });
       $(this).on('mouseout', function() {
           $(this).css({
              cursor: 'normal' 
           });
           $(this).find("a:not(.create)").css({
              color: '#49a0df' 
           });
       });
       $(this).on('click', function() {
           window.location = $(this).find("a").attr('href');
       });
    });
    
    // POPUP
    $('.ul-btn-add li:last-child').on('click', function() {
       $('#popup').slideDown(100);
    });
    
    $('#popup-close-btn').on('mouseover', function() {
        $(this).css({
            cursor: 'pointer' 
        });
    });
    
    $('#popup-close-btn').on('click', function() {
        $('#popup-close-btn a').click();
    });
    
    $('#popup-close-btn a').on('click', function() {
       $('#popup').slideUp(100);
       return false;
    });
    
});

    