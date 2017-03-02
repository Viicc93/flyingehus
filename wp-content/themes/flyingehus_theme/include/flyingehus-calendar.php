<?php

function calendar_init() {
  $args = array(
    'label'=> 'Kalender',
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'rewrite' => array(' slug'=> 'flyingehus-calendar'),
    'query_var' => true,
    'menu_icon' => 'dashicons-calendar-alt',
  );
  register_post_type('flyingehus-calendar', $args);
}
add_action( 'init', 'calendar_init');

function remove_post_support() {
  remove_post_type_support('flyingehus-calendar', 'editor');
}
add_action( 'init', 'remove_post_support');


function create_calendar_tax() {
	register_taxonomy(
		'caltypes',
		'flyingehus-calendar',
		array(
			'label' => __( 'Kalender Typ' ),
			'rewrite' => array( 'slug' => 'caltypes' ),
			'hierarchical' => true,
		)
	);
}
add_action( 'init', 'create_calendar_tax' );

  function build_calendar( $atts ) {
  	$atts = shortcode_atts( array(
  		'typ' => 'no type',
  	), $atts, 'kalender' );
    $type = $atts['typ'];
    $months = array('januari' => 'januari',
                    'februari' => 'februari',
                    'mars' => 'mars',
                    'april' => 'april',
                    'maj' => 'maj',
                    'juni' => 'juni',
                    'juli' => 'juli',
                    'augusti' => 'augusti',
                    'september' => 'september',
                    'oktober' => 'oktober',
                    'november' => 'november',
                    'december' => 'december',
                  );
    $check = new WP_Query( array('post_type' => 'flyingehus-calendar',
                  'tax_query' => array(
                  array(
                    'taxonomy' => 'caltypes',
                    'field' => 'slug', //can be set to ID
                    'terms' => $type //if field is ID you can reference by cat/term number
                  )
                ) ));
      if ( $type == "terrangbana-bokad" || $type == "ridhus-bokat" ) {
        $fhcHTML = "<div class=\"flyingehus-calendar \"><h3  class=\"calendar-title\">BOKNINGAR</h3>";
        if ($check->have_posts()) {
            foreach ($months as $month) {
                $label = strtoupper($month);
                $key = new WP_Query( kArgs($type, $month));

                if( $key->have_posts() ) {
                   $fhcHTML .="<div class=\"fhc-label\"><h5 class=\"fhc-month\">$label</h5></div>";
                  while( $key->have_posts() ) {
                    $key->the_post();
                    $date = get_field( "k_start");
                    $dateEnd = get_field( "k_end");
                    $desc = get_field( "k_desc");
                    $time = get_field( "k_time");
                    $title = get_the_title();
                    $sep = '-';

                    if ($dateEnd == 0) {
                        $dateEnd = ' ';
                        $sep = ' ';
                    }
                    $fhcHTML .="<div class='fhc-content'><div class=\"fhc-header\"> <div class=\"fhc-date\"><h5>$date$sep$dateEnd</h5></div>";
                    $fhcHTML .="<div class=\"fhc-title\"><h5>$title</h5></div></div><div class=\"fhc-body\"><div class=\"fhc-description\"><p>$desc</p><p><span class=\"fa fa-clock-o\"></span>$time</p></div></div></div>";
                  }
                }
            }
        } else {
                $fhcHTML .= '<p class="flyingehus-empty-calendar">Inga bokningar för tillfället..</p>';
        }
        $fhcHTML .= "</div>";
        return $fhcHTML;
      }
      else {
        $fhcHTML = "<div class=\"flyingehus-calendar \"><h3  class=\"calendar-title\">KALENDER</h3>";
        if ($check->have_posts()) {
            foreach ($months as $month) {
                $label = strtoupper($month);
                $key = new WP_Query( kArgs($type, $month));

                if( $key->have_posts() ) {
                   $fhcHTML .="<div class=\"fhc-label\"><h5 class=\"fhc-month\">$label</h5></div>";
                  while( $key->have_posts() ) {
                    $key->the_post();
                    $date = get_field( "k_start");
                    $dateEnd = get_field( "k_end");
                    $desc = get_field( "k_desc");
                    $place = get_field( "k_place");
                    $maps = get_field( "k_maps");
                    $pageLink = get_field( "k_page_link");
                    $title = get_the_title();
                    $sep = '-';

                    if ($dateEnd == 0) {
                        $dateEnd = ' ';
                        $sep = ' ';
                    }
                    $fhcHTML .="<div class='fhc-content'><div class=\"fhc-header\"> <div class=\"fhc-date\"><h5>$date$sep$dateEnd</h5></div>";
                    $fhcHTML .="<div class=\"fhc-title\"><h5>";
                    if (!empty($pageLink)) {
                      $fhcHTML .="<a target=\"_blank\" href=\"$pageLink\">$title</a>";
                    }
                    else {
                    $fhcHTML .=$title;
                    }
                    $fhcHTML .="</h5></div></div><div class=\"fhc-body\"><div class=\"fhc-description\"><p>$desc</p></div></div>
                                <div class=\"fhc-place\">";
                    if (!empty($maps)) {
                      $fhcHTML .="<a target=\"_blank\" href=\"$maps\"><span class=\"fa fa-map-marker\" aria-hidden=\"true\"></span>$place</a>";
                    }
                    else {
                      $fhcHTML .="<p><span class=\"fa fa-map-marker\" aria-hidden=\"true\"></span>$place</p>";
                    }
                    $fhcHTML .="</div></div>";
                  }
                }
            }
        } else {
                $fhcHTML .= '<p class="flyingehus-empty-calendar">Kalendern är för tillfället tom...</p>';
        }
        $fhcHTML .= "</div>";
        return $fhcHTML;
      }
    }

    function kArgs($type, $month){
            $args = array('post_type' => 'flyingehus-calendar',
            'tax_query' => array(
              array(
                'taxonomy' => 'caltypes',
                'field' => 'slug', //can be set to ID
                'terms' => $type //if field is ID you can reference by cat/term number
              )
            ), 'meta_key'=>'k_start',  'orderby' => 'meta_key', 'order' => 'ASC','meta_query' => array(array('key'  => 'k_month','value' => $month, 'compare'   => 'LIKE')));
            return $args;
        }
  add_shortcode( 'kalender', 'build_calendar' );
