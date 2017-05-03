
var player = (function ($,SC){
  'use strict';
  var temp = {
    scWidget: SC.Widget($('#sc-widget').get(0)),
    scLoadedTrackName: null,
    scLoadedTrackIcon: null,

    // Initialization function
    scInitialize: function(track) {
      temp.scLoadedTrackName = track;
      temp.scSetLoadedTrackIcon(track);
      temp.scBindWidgetEvents();
    },
    // Builds the tracks URL
    loadSCWidget: function (element) {
      var scSite = 'https://soundcloud.com/',
          artist = element.getAttribute('data-band'),
          song = element.getAttribute('data-track'),
          url = scSite + artist + '/' + song;
      {
        // Widget opions 
        temp.scWidget.load(url, {
          show_artwork: true,
          download: false,
          sharing: true,
          show_comments: false,
          show_playcount: true,
          show_user: true,
          start_track: 0,
          hide_related: true,
          buying: false,
          visual: false
        });
        temp.scLoadedTrackName = song;
      }
    }
  };
  return temp;
}($, SC));
