/* 
 * My application jquery functions, listeners and events...
 */

$(function() {
    $( ".datepicker" ).datepicker({ 
        regional: "Fr",
        constrainInput: true,
        //currentText: "Now",
        dateFormat: "dd-mm-yy",
        minDate: "-0"
    });
});
    
$(document).ready(function(){
    
    $('#user-links').balloon({
        position: 'bottom',
        offsetX: -30,
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
                  '<li><a href="/task/list">My Tasks</a></li>' +
                  '<li><a href="/project/list">My Projects</a></li>' +
                  '<li><a href="">Help</a></li>' +
                  '<li><a href="">etc...</a></li>' +
                  '</ul>' +
                  '<hr style="margin: 10px 0px 4px 0px;" />' +
                  '<ul class="ul-balloon">' +
                  '<li><a href="/user/user">My account</a></li>' +
                  '<li><a href="" style="color: orange;">LOGOUT</a></li>' +
                  '</ul>'
    });
    
    $('#nav li').each(function(iterator){
        $(this).on("click", function(){
            window.location = $(this).find('a').attr('href'); 
        });
    });
    
    $('.ul-btn-add li').each(function(iterator){
        $(this).on("click", function(){
            window.location = $(this).find('a').attr('href'); 
        });
        $(this).css({
           cursor: 'pointer'
        });
        //*
        $(this).on("mouseover", function(){
           $(this).css({
               opacity: '0.9'
           });
           $(this).find('a').css({
               textDecoration: 'underline'
           });
        });
        $(this).on("mouseout", function(){
           $(this).css({
               opacity: '1'
           });
           $(this).find('a').css({
               textDecoration: 'none'
           }); 
        });
        // */
    });
});

    