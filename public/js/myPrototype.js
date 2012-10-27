/* 
 * My application prototype functions, listeners and events...
 * 
 */
var buttonNavs = $$('#nav ul li');
//var buttonNavOnClick = new ButtonNavigationClick('ZOBY OR NOT...');
buttonNavs.each(function(item){
    var btnLink = item.down('a');
    item.onclick = function(){
        window.location = btnLink.href;
    }
});

