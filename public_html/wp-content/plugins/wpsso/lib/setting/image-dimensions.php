<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2012-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoSettingImagedimensions' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoSettingImagedimensions extends WpssoAdmin {

		public function __construct( &$plugin, $id, $name ) {
			$this->p =& $plugin;
			$this->p->debug->mark();
			$this->menu_id = $id;
			$this->menu_name = $name;
		}

		protected function add_meta_boxes() {
			// add_meta_box( $id, $title, $callback, $post_type, $context, $priority, $callback_args );
			add_meta_box( $this->pagehook.'_image_dimensions',
				_x( 'Social Image Dimensions', 'metabox title', 'wpsso' ), 
					array( &$this, 'show_metabox_image_dimensions' ), $this->pagehook, 'normal' );
		}

		public function show_metabox_image_dimensions() {
			$metabox = $this->menu_id;
			echo '<table class="sucom-setting '.$this->p->cf['lca'].'">';
			echo '<tr><td colspan="2">'.$this->p->msgs->get( 'info-'.$metabox ).'</td></tr>';

			$rows = array_merge( $this->get_rows( $metabox, 'general' ), 
				apply_filters( $this->p->cf['lca'].'_'.$metabox.'_general_rows', array(), $this->form ) );
			natsort( $rows );

			foreach ( $rows as $num => $row ) 
				echo '<tr>'.$row.'</tr>'."\n";

			echo '</table>';
		}

		protected function get_rows( $metabox, $key ) {
			$rows = array();

			switch ( $metabox.'-'.$key ) {

				case 'image-dimensions-general':

					$rows[] = $this->p->util->get_th( _x( 'Facebook / Open Graph',
						'option label', 'wpsso' ), null, 'og_img_dimensions' ).
					'<td>'.$this->form->get_image_dimensions_input( 'og_img', false, false ).'</td>';

					if ( ! SucomUtil::get_const( 'WPSSO_RICH_PIN_DISABLE' ) ) {
						$rows[] = $this->p->util->get_th( _x( 'Pinterest Rich Pin',
							'option label', 'wpsso' ), null, 'rp_img_dimensions' ).
						'<td>'.$this->form->get_image_dimensions_input( 'rp_img' ).'</td>';
					}
	
					$rows[] = $this->p->util->get_th( _x( 'Twitter <em>Summary</em> Card',
						'option label', 'wpsso' ), null, 'tc_sum_dimensions' ).
					'<td>'.$this->form->get_image_dimensions_input( 'tc_sum' ).'</td>';
	
					$rows[] = $this->p->util->get_th( _x( 'Twitter <em>Large Image Summary</em> Card',
						'option label', 'wpsso' ), null, 'tc_lrgimg_dimensions' ).
					'<td>'.$this->form->get_image_dimensions_input( 'tc_lrgimg' ).'</td>';

					break;
			}
			return $rows;
		}
	}
}

?>
