/* 
 * contains apllication prototype classes
 */

var ButtonNavigationClick = Class.create({
    initialize: function(msg) {
    this.msg = msg;
  },
  handleClick: function(event) {
    event.stop();
    alert(this.msg);
  }
});

