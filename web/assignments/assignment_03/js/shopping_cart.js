function addItem(item) {
  $.post( "php/add_item.php", { selected: item } );
}

function removeItem(item) {
  $.post( "php/remove_item.php", { selected: item } )
    .done(function( data ) {
      window.location.reload(true);
    });
}

function view_chart() {
  window.location.href = "https://quiet-river-98527.herokuapp.com/assignments/assignment_03/view_cart.php?";
}
