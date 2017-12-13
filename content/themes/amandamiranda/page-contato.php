<?php
/**
 * Página de contato
 *
 * @package Amanda Miranda
 * @version 1.0
 */
get_header();
the_post();
?>
<div class="contato">

<div class="box-title">
	<h2><?php the_title(); ?></h2>
</div>

<div class="imagem">
	<?php the_post_thumbnail( 'contato' ); ?>
</div>

<div class="form col-xm-6">
	<h2>Fale<br /><span class="medium">c</span><span class="small">onosco</span></h2>
	<br /><br />
	<?php echo do_shortcode( '[contact-form-7 id="14" title="Formulário de contato 1"]' ); ?>

	<div class="info">
		<?php the_content(); ?>
	</div>
</div>

<div id="map_canvas" style="width:100%; height:526px"></div>

<div class="email-detail">
	<div class="line"><hr /></div>
	<div class="email">@amandamirandaarquitetura</div>
</div>

<div id="instafeed" class="redes-sociais-contato images"></div>

<div class="row nopadding"></div>

</div>
<?php get_footer(); ?>
<script>
	window.marker = '<?php echo get_stylesheet_directory_uri(); ?>/img/logo-mini.png';

	var el = $('#map_canvas');
	var map;

	function enableScrollingWithMouseWheel() {
		map.setOptions({ scrollwheel: true });
	}

	function disableScrollingWithMouseWheel() {
		map.setOptions({ scrollwheel: false });
	}

	function init() {

		var position = new google.maps.LatLng(-22.9159147, -43.0840068);

		map = new google.maps.Map(el[0], {
			zoom: 13,
			center: position,
			scrollwheel: false // disableScrollingWithMouseWheel as default
		});

		var marker = new google.maps.Marker({
			position: position,
			map: map,
			title:"",
			icon: window.marker
		});

		google.maps.event.addListener(map, 'mousedown', function(){
			enableScrollingWithMouseWheel()
		});

		map.set('styles', [
		{
			"featureType": "administrative",
			"elementType": "labels.text.fill",
			"stylers": [
			{
				"color": "#444444"
			}
			]
		},
		{
			"featureType": "landscape",
			"elementType": "all",
			"stylers": [
			{
				"color": "#f2f2f2"
			}
			]
		},
		{
			"featureType": "poi",
			"elementType": "all",
			"stylers": [
			{
				"visibility": "off"
			}
			]
		},
		{
			"featureType": "road",
			"elementType": "all",
			"stylers": [
			{
				"saturation": -100
			},
			{
				"lightness": 45
			}
			]
		},
		{
			"featureType": "road.highway",
			"elementType": "all",
			"stylers": [
			{
				"visibility": "simplified"
			}
			]
		},
		{
			"featureType": "road.arterial",
			"elementType": "labels.icon",
			"stylers": [
			{
				"visibility": "off"
			}
			]
		},
		{
			"featureType": "transit",
			"elementType": "all",
			"stylers": [
			{
				"visibility": "off"
			}
			]
		},
		{
			"featureType": "water",
			"elementType": "all",
			"stylers": [
			{
				"color": "#ffffff"
			},
			{
				"visibility": "on"
			}
			]
		}
		]);
	}

	google.maps.event.addDomListener(window, 'load', init);

	jQuery('body').on('mousedown', function(event) {
		var clickedInsideMap = $(event.target).parents('#map_canvas').length > 0;

		if(!clickedInsideMap) {
			disableScrollingWithMouseWheel();
		}
	});

	jQuery(window).scroll(function() {
		disableScrollingWithMouseWheel();
	});
</script>
