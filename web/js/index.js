angular.module('App', ['ngMaterial'])
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
