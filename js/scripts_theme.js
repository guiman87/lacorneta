// delay
//Accordion

jQuery(document).ready(function($) {
  $('#proba').delay(100).show(100);
});

jQuery(document).ready(function($) {
  $('#diapositivas').delay(100).show(100);
});



jQuery(document).ready(function() {
  var table1 = jQuery('.restotablas').DataTable({
    "columnDefs": [
    { "visible": true, "targets": 0 },
    { "visible": false, "targets": 5 },
    { "visible": false, "targets": 6 },
    { "visible": false, "targets": 7 },
    { "width": "12%", "targets": 0 },
    { "width": "28%", "targets": 1 },
    { "width": "22%", "targets": 4 },
    { "width": "40%", "targets": 2 }
    ],
    "order": [[ 0, "asc" ],[ 1, "asc" ] ],
    "bProcessing": true,
    "ordering": false,
    "paging":         false,
    "bInfo": false,
    "oLanguage": {
      "sSearch": "<span class='buscatabla'>BUSCA</span>"
      }
  } );

jQuery(document).ready(function() {
  var table = jQuery('#proba').DataTable({
    "columnDefs": [
    { "visible": false, "targets": 0 },
    { "visible": false, "targets": 5 },
    { "visible": false, "targets": 6 },
    { "visible": false, "targets": 7 },
    { "width": "25%", "targets": 4 },
    { "width": "40%", "targets": 2 }
    ],
    "order": [[ 0, "asc" ],[ 1, "asc" ] ],
    "scrollY":        "600px",
    "bProcessing": true,
    "bInfo": false,
    "ordering": false,
    "scrollCollapse": false,
    "paging":         false,
    "oLanguage": {
      "sSearch": "<span class='buscatabla'>BUSCA</span>"
    },
    "drawCallback": function ( settings ) {
      var api = this.api();
      var rows = api.rows( {page:'current'} ).nodes();
      var last=null;
      
      api.column(0, {page:'current'} ).data().each( function ( group, i ) {
	if ( last !== group ) {
	  jQuery(rows).eq( i ).before(
	    '<tr class="group"><td colspan="4">'+group+'</td></tr>'
	  );
	  
	  last = group;
	}
      } );
    }
  } );
  
  
  // Order by the grouping
  jQuery('#proba tbody').on( 'click', 'tr.group', function () {
    var currentOrder = table.order()[0];
    if ( currentOrder[0] === 0 && currentOrder[1] === 'asc' ) {
      table.order( [ 0, 'desc' ] ).draw();
    }
    else {
      table.order( [ 0, 'asc' ] ).draw();
    }
  } );
  
  //Agrego texto al search input
  jQuery('.dataTables_filter input').attr("placeholder", "Departamento, Barrio, Ciudad, Toques, Fiestas").val("").focus().blur();
} );



//CAMBIO 23:59 por 00:00
jQuery(function($) {
$('.hoytime, .hora_single').each(function() {
    var text = $(this).text();
    $(this).text(text.replace('23:59', '00:00')); 
});
});



// add all your scripts here
//Accordion
/*
(function(){ 
  jQuery("#accordion, #accordioninterior").accordion({
    collapsible: true,
    active: false,
    heightStyle: "content",
    icons: { "header": "ui-icon-plus", "activeHeader": "ui-icon-minus" }
  }); 
})();

*/



//Lightbox
jQuery(document).ready(function($) {
  $(".fancybox").fancybox();
  $("a.video").click(function() {
    $.fancybox({
      'padding'		: 0,
      'autoScale'		: false,
      'transitionIn'	: 'none',
      'transitionOut'	: 'none',
      'title'			: this.title,
      'width'		: 680,
      'height'		: 495,
      'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/' ),
	       'type'			: 'swf',
	       'swf'			: {
		 'wmode'		: 'transparent',
	       'allowfullscreen'	: 'true'
	       }
    });
    
    return false;
  });
});




//location_map
jQuery(document).ready(function($){
  jQuery(document).bind('em_maps_location_hook', function( e, map, infowindow, marker ){
    
    // Setting the current zoomlevel of the map
    map.setZoom(15);
    map.setCenter(marker.getPosition());
    var styles = [
    {
      "stylers": [
      { "invert_lightness": true  }
      ]
    }
    ];
    map.setOptions({styles: styles});		
  });
});


jQuery(document).bind('em_maps_locations_hook', function( e, map, infowindow, marker ){
	// Setting the current zoomlevel of the map
    map.setZoom(2);
    var styles = [
    {
      "stylers": [
      { "invert_lightness": true  }
      ]
    }
    ];
    map.setOptions({styles: styles});		
  });
});