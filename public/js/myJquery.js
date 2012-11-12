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
                  '<li><a href="/project/list">My Projects</a></li>' +
                  '<li><a href="/task/list">My Tasks</a></li>' +
                  '<li><a href="/note/list">My Notes</a></li>' +
                  '<li><a href="">Help</a></li>' +
                  '</ul>' +
                  '<hr style="margin: 10px 0px 4px 0px;" />' +
                  '<ul class="ul-balloon">' +
                  '<li><a href="/user/me">My account</a></li>' +
                  '<li><a href="" style="color: orange;">LOGOUT</a></li>' +
                  '</ul>'
    });
    
    $('#nav li').each(function(iterator){
        $(this).on("click", function(){
            window.location = $(this).find('a').attr('href'); 
        }); 
    });
    
    $('.ul-btn-add li').each(function(iterator){
        var href = $(this).find('a').attr('href');
        var options = {
            delay: 0,
            minLifetime: 0,
            showDuration: 0,
            showAnimation: null,
            hideDuration: 0,
            position: 'bottom',
            offsetX: 0,
            offsetY: 20,
            css: {
                padding: '10px 6px 10px 4px',
                color: '#ffffff',
                fontWeight: 'bold',
                background: 'orange',
                border: 'none',
                boxShadow: "0px 0px 2px 0px #000000",
                opacity: 1
            },
            contents: 'You need to fill the form before...'
        }
                
        $(this).on("click", function(){
            window.location = href; 
        });
        //*
        if (href == 'javascript: return false;') {
            //*
            $(this).balloon(options);
            $(this).find('a').css({
               textDecoration: 'none',
               cursor: 'default'
            });
            // */ alert ('chco');
        } else {
            $(this).css({
                cursor: 'pointer'
            });
        }
        
        $(this).on("mouseover", function(){
            $(this).css({
                opacity: '0.8'
            });
            $(this).find('a').css({
                textDecoration: 'underline',
                cursor: 'pointre'
            });
        });
        $(this).on("mouseout", function(){
           $(this).css({
               opacity: '1'
           });
           $(this).find("a").css({
               textDecoration: 'none'
           }); 
        });
    });
    
    $(".td-index-bottom-link-a, .td-index-bottom-link-b").each( function() {
       $(this).on('mouseover', function() {
           $(this).css({
              cursor: 'pointer' 
           });
       });
       $(this).on('mouseovut', function() {
           
       });
       $(this).on('click', function() {
           window.location = $(this).find("a").attr('href');
       });
    }); 
});

    