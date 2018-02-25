function addFavortieGame(game_id) {

   var url = '../php/addFavGame.php';

   $.post( url, { game_id:game_id })
    .done(function( data ) {
      window.location.reload(1);
    });
}

function removeFavortieGame(game_id) {

  var url = '../php/removeFavGame.php';

  $.post( url, { game_id:game_id })
   .done(function( data ) {
     window.location.reload(1);
   });
}
