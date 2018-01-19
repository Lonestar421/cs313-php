angular.module('App', ['ngMaterial'])
  .controller('Contentcontroller', ['$scope', '$mdDialog', function ($scope, $mdDialog) {
    var contentCtrl = this;

    contentCtrl.mainContent =
      "One of my favorite past times has become playing board games." +
      "Board games are such a great way to have a good time and get to know new people." +
      "Over time I have accrued quite a collection and so I thought I would share a few of my favorites to the right." +
      "There are plenty more that could be on the list, but these stuck out to me first." +
      "They embody some of my favorite types of board games, which are area control (Revolution), " +
      "cooperative (Escape: The Curse of the Temple), and party games (Walk the Plank)."

    contentCtrl.gameTypes = [{
        "name": "Roll and Move",
        "desc": "Monopoly and The Game of Life."
      }, {
        "name": "Worker Placement",
        "desc": "Agricola and Dungeon Lords"
      }, {
        "name": "Cooperative",
        "desc": "Flashpoint and Pandemic"
      }, {
        "name": "Deck-Building",
        "desc": "Dominion and Legendary: Marvel Deck Building Game"
      }, {
        "name": "Area Control",
        "desc": "Risk and Smash Up"
      }, {
        "name": "Social Deduction",
        "desc": "One Night Ultimate Werewolf and Coup"
      }, {
        "name": "Party Games",
        "desc": "Apples to Apples and Two Rooms and a Boom"
      }, {
        "name": "Combat Games",
        "desc": "King of Tokyo ans Neuroshima Hex 3.0"
      }];

    $scope.moreInformation = function(event, item) {
      $mdDialog.show(
        $mdDialog.alert()
          .title(item.name)
          .textContent(item.desc)
          .ok('Done')
          .clickOutsideToClose(true)
          .targetEvent(event)
      );
    };
  }])
  .controller('CardController', function() {
    var cardCtrl = this
    cardCtrl.cards = [{
        "title": "Revolution",
        "desc": "Revolution is all about acquiring the most support to win. This is a very strategic and competitive game of bidding to gain influence in a town and in turn gaining there support.",
        "link": "https://images-na.ssl-images-amazon.com/images/I/91swA9eVg-L._SL1500_.jpg",
        "watch": "https://youtu.be/WEfDV_sub6E",
        "buy": "http://a.co/4RXd1BY"
      },{
        "title": "Walk the Plank",
        "desc": "Walk the Plank has players trying to push each other off the plank and into the Kraken. The random, simple, and fast gameplay make it fun to play again and again.",
        "link": "https://images-na.ssl-images-amazon.com/images/I/A1ippbHxiLL._SL1500_.jpg",
        "watch": "https://youtu.be/a294DWVlto0",
        "buy": "http://a.co/8kFS2UA"
      },{
        "title": "Escape: The Curse of the Temple",
        "desc": "Escape is a cooperative game where players seek to find the exit in 10 minutes. This intense game will be sure to get your heart pumping as you race to the exit, just be sure you don't leave anyone behind.",
        "link": "https://cf.geekdo-images.com/images/pic1724684_md.jpg",
        "watch": "https://youtu.be/PjzE1N9tvPU",
        "buy": "http://a.co/iXuEMkk"
      }];
  });
