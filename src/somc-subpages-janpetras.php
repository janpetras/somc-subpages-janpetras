<?php
/*
Author: Ioan Petras
Author URI: http://www.ioanpetras.com/
Plugin Name: somc-subpages-janpetras
Plugin URI: http://github.com/janpetras/somc-subpages
Description: [somc], [subpages], [siblings] and [somc_ext] shortcodes
Version: 0.1
License: GNU GPLv3
*/

if ( !function_exists('somc_unqprfx_add_stylesheet') ) {
	function somc_unqprfx_add_stylesheet() {
		wp_enqueue_style( 'somc-style', plugins_url( '/css/somc.css', __FILE__ ), false, '0.1', 'all' );
	}
	add_action('wp_print_styles', 'somc_unqprfx_add_stylesheet');
}


$somc_unqprfx_powered_line = "\n".'<!-- somc plugin v0.1 github.com/janpetras/somc-subpages -->'."\n";


if ( !function_exists('somc_unqprfx_shortcode') ) {
	function somc_unqprfx_shortcode( $atts ) {
		global $post, $somc_unqprfx_powered_line;
		$return = '';
		extract( shortcode_atts( array(
			'depth' => '0',
			'child_of' => '0',
			'exclude' => '0',
			'exclude_tree' => '',
			'include' => '0',
			'title_li' => '',
			'number' => '',
			'offset' => '',
			'meta_key' => '',
			'meta_value' => '',
			'show_date' => '',
			'sort_column' => 'menu_order, post_title',
			'sort_order' => 'ASC',
			'link_before' => '',
			'link_after' => '',
			'class' => ''
		), $atts ) );

		$somc_args = array(
			'depth'        => $depth,
			'child_of'     => somc_unqprfx_norm_params($child_of),
			'exclude'      => somc_unqprfx_norm_params($exclude),
			'exclude_tree' => $exclude_tree,
			'include'      => $include,
			'title_li'     => $title_li,
			'number'       => $number,
			'offset'       => $offset,
			'meta_key'     => $meta_key,
			'meta_value'   => $meta_value,
			'show_date'    => $show_date,
			'date_format'  => get_option('date_format'),
			'echo'         => 0,
			'authors'      => '',
			'sort_column'  => $sort_column,
			'sort_order'   => $sort_order,
			'link_before'  => $link_before,
			'link_after'   => $link_after,
			'walker' => ''
		);
		$somc = wp_somc( $somc_args );

		$return = $somc_unqprfx_powered_line;
		if ($somc) {
			$return .= '<ul class="somc '.$class.'">'."\n".$somc."\n".'</ul>';
		}else{
			$return .= '<!-- no pages to show -->';
		}
		return $return;
	}
	add_shortcode( 'somc', 'somc_unqprfx_shortcode' );
	add_shortcode( 'somc', 'somc_unqprfx_shortcode' );
	add_shortcode( 'somc', 'somc_unqprfx_shortcode' );
	add_shortcode( 'sitemap', 'somc_unqprfx_shortcode' );
}


if ( !function_exists('subpages_unqprfx_shortcode') ) {
	function subpages_unqprfx_shortcode( $atts ) {
		global $post, $somc_unqprfx_powered_line;
		$return = '';
		extract( shortcode_atts( array(
			'depth' => '0',
			'exclude' => '0',
			'exclude_tree' => '',
			'include' => '0',
			'title_li' => '',
			'number' => '',
			'offset' => '',
			'meta_key' => '',
			'meta_value' => '',
			'show_date' => '',
			'sort_column' => 'menu_order, post_title',
			'sort_order' => 'ASC',
			'link_before' => '',
			'link_after' => '',
			'class' => ''
		), $atts ) );

		$somc_args = array(
			'depth'        => $depth,
			'child_of'     => $post->ID,
			'exclude'      => somc_unqprfx_norm_params($exclude),
			'exclude_tree' => $exclude_tree,
			'include'      => $include,
			'title_li'     => $title_li,
			'number'       => $number,
			'offset'       => $offset,
			'meta_key'     => $meta_key,
			'meta_value'   => $meta_value,
			'show_date'    => $show_date,
			'date_format'  => get_option('date_format'),
			'echo'         => 0,
			'authors'      => '',
			'sort_column'  => $sort_column,
			'sort_order'   => $sort_order,
			'link_before'  => $link_before,
			'link_after'   => $link_after,
			'walker' => ''
		);
		$somc = wp_somc( $somc_args );

		$return = $somc_unqprfx_powered_line;
		if ($somc) {
			$return .= '<ul class="somc subpages-somc '.$class.'">'."\n".$somc."\n".'</ul>';
		}else{
			$return .= '<!-- no pages to show -->';
		}
		return $return;
	}
	add_shortcode( 'subpages', 'subpages_unqprfx_shortcode' );
	add_shortcode( 'sub_pages', 'subpages_unqprfx_shortcode' );
	add_shortcode( 'sub-pages', 'subpages_unqprfx_shortcode' );
	add_shortcode( 'children', 'subpages_unqprfx_shortcode' );
}


if ( !function_exists('siblings_unqprfx_shortcode') ) {
	function siblings_unqprfx_shortcode( $atts ) {
		global $post, $somc_unqprfx_powered_line;
		$return = '';
		extract( shortcode_atts( array(
			'depth' => '0',
			//'child_of' => '0',
			'exclude' => '0',
			'exclude_tree' => '',
			'include' => '0',
			'title_li' => '',
			'number' => '',
			'offset' => '',
			'meta_key' => '',
			'meta_value' => '',
			'show_date' => '',
			'sort_column' => 'menu_order, post_title',
			'sort_order' => 'ASC',
			'link_before' => '',
			'link_after' => '',
			'class' => ''
		), $atts ) );

		if( $exclude == 'current' || $exclude == 'this' ){
			$exclude = $post->ID;
		}

		$somc_args = array(
			'depth'        => $depth,
			'child_of'     => $post->post_parent,
			'exclude'      => somc_unqprfx_norm_params($exclude),
			'exclude_tree' => $exclude_tree,
			'include'      => $include,
			'title_li'     => $title_li,
			'number'       => $number,
			'offset'       => $offset,
			'meta_key'     => $meta_key,
			'meta_value'   => $meta_value,
			'show_date'    => $show_date,
			'date_format'  => get_option('date_format'),
			'echo'         => 0,
			'authors'      => '',
			'sort_column'  => $sort_column,
			'sort_order'   => $sort_order,
			'link_before'  => $link_before,
			'link_after'   => $link_after,
			'walker' => ''
		);
		$somc = wp_somc( $somc_args );

		$return = $somc_unqprfx_powered_line;
		if ($somc) {
			$return .= '<ul class="somc siblings-somc '.$class.'">'."\n".$somc."\n".'</ul>';
		}else{
			$return .= '<!-- no pages to show -->';
		}
		return $return;
	}
	add_shortcode( 'siblings', 'siblings_unqprfx_shortcode' );
}


if ( !function_exists('somc_unqprfx_ext_shortcode') ) {
	function somc_unqprfx_ext_shortcode( $atts ) {
		global $post, $somc_unqprfx_powered_line;
		$return = '';
		extract( shortcode_atts( array(
			'show_image' => 1,
			'show_first_image' => 0,
			'show_title' => 1,
			'show_content' => 1,
			'more_tag' => 1,
			'limit_content' => 250,
			'image_width' => '150',
			'image_height' => '150',
			'child_of' => '',
			'sort_order' => 'ASC',
			'sort_column' => 'menu_order, post_title',
			'hierarchical' => 1,
			'exclude' => '0',
			'include' => '0',
			'meta_key' => '',
			'meta_value' => '',
			'authors' => '',
			'parent' => -1,
			'exclude_tree' => '',
			'number' => '',
			'offset' => 0,
			'post_type' => 'page',
			'post_status' => 'publish',
			'class' => '',
			'strip_tags' => 1,
			'strip_shortcodes' => 1,
			'show_child_count' => 0,
			'child_count_template' => 'Subpages: %child_count%',
			'show_meta_key' => '',
			'meta_template' => '%meta%'
		), $atts ) );

		if( $child_of == '' ){
			$child_of = $post->ID;
		}

		$somc_ext_args = array(
			'show_image' => $show_image,
			'show_first_image' => $show_first_image,
			'show_title' => $show_title,
			'show_content' => $show_content,
			'more_tag' => $more_tag,
			'limit_content' => $limit_content,
			'image_width' => $image_width,
			'image_height' => $image_height,
			'child_of' => somc_unqprfx_norm_params($child_of),
			'sort_order' => $sort_order,
			'sort_column' => $sort_column,
			'hierarchical' => $hierarchical,
			'exclude' => somc_unqprfx_norm_params($exclude),
			'include' => $include,
			'meta_key'     => $meta_key,
			'meta_value'   => $meta_value,
			'authors' => $authors,
			'parent' => somc_unqprfx_norm_params($parent),
			'exclude_tree' => $exclude_tree,
			'number' => '', 
			'offset' => 0, 
			'post_type' => $post_type,
			'post_status' => $post_status,
			'class' => $class,
			'strip_tags' => $strip_tags,
			'strip_shortcodes' => $strip_shortcodes,
			'show_child_count' => $show_child_count,
			'child_count_template' => $child_count_template,
			'show_meta_key' => $show_meta_key,
			'meta_template' => $meta_template
		);
		$somc_ext_args_all = array(
			'show_image' => $show_image,
			'show_first_image' => $show_first_image,
			'show_title' => $show_title,
			'show_content' => $show_content,
			'more_tag' => $more_tag,
			'limit_content' => $limit_content,
			'image_width' => $image_width,
			'image_height' => $image_height,
			'child_of' => 0, 
			'sort_order' => $sort_order,
			'sort_column' => $sort_column,
			'hierarchical' => $hierarchical,
			'exclude' => somc_unqprfx_norm_params($exclude),
			'include' => $include,
			'meta_key'     => $meta_key,
			'meta_value'   => $meta_value,
			'authors' => $authors,
			'parent' => somc_unqprfx_norm_params($parent),
			'exclude_tree' => $exclude_tree,
			'number' => '', 
			'offset' => 0, 
			'post_type' => $post_type,
			'post_status' => $post_status,
			'class' => $class,
			'strip_tags' => $strip_tags,
			'strip_shortcodes' => $strip_shortcodes,
			'show_child_count' => $show_child_count,
			'child_count_template' => $child_count_template,
			'show_meta_key' => $show_meta_key,
			'meta_template' => $meta_template
		);
		$somc = get_pages( $somc_ext_args );
		if( count( $somc ) == 0 ){ 
			$somc = get_pages( $somc_ext_args_all );
		}
		$somc_html = '';
		$count = 0;
		$offset_count = 0;
		if( $somc !== false && count( $somc ) > 0 ){
			foreach($somc as $page){
				$count++;
				$offset_count++;
				if ( !empty( $offset ) && is_numeric( $offset ) && $offset_count <= $offset ) {
					$count = 0; // number counter to zero if offset is not finished
				}
				if ( ( !empty( $offset ) && is_numeric( $offset ) && $offset_count > $offset ) || ( empty( $offset ) ) || ( !empty( $offset ) && !is_numeric( $offset ) ) ) {
					if ( ( !empty( $number ) && is_numeric( $number ) && $count <= $number ) || ( empty( $number ) ) || ( !empty( $number ) && !is_numeric( $number ) ) ) {
						$link = get_permalink( $page->ID );
						$somc_html .= '<div class="somc-ext-item">';
						if( $show_image == 1 ){
							if ( function_exists( 'get_the_post_thumbnail' ) ) { 
								if( get_the_post_thumbnail( $page->ID ) ){
									$somc_html .= '<div class="somc-ext-image"><a href="'.$link.'" title="'.esc_attr($page->post_title).'">';
									

									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), array($image_width,$image_height) );
									$img_url = $image[0];
									$somc_html .= '<img src="'.$img_url.'" width="'.$image_width.'" alt="'.esc_attr($page->post_title).'" />';

									$somc_html .= '</a></div> ';
								}else{
									if( $show_first_image == 1 ){
										$img_scr = somc_unqprfx_get_first_image( $page->post_content );
										if( !empty( $img_scr ) ){
											$somc_html .= '<div class="somc-ext-image"><a href="'.$link.'" title="'.esc_attr($page->post_title).'">';
											$somc_html .= '<img src="'.$img_scr.'" width="'.$image_width.'" alt="'.esc_attr($page->post_title).'" />';
											$somc_html .= '</a></div> ';
										}
									}
								}
							}else{
								if( $show_first_image == 1 ){
									$img_scr = somc_unqprfx_get_first_image( $page->post_content );
									if( !empty( $img_scr ) ){
										$somc_html .= '<div class="somc-ext-image"><a href="'.$link.'" title="'.esc_attr($page->post_title).'">';
										$somc_html .= '<img src="'.$img_scr.'" width="'.$image_width.'" />';
										$somc_html .= '</a></div> ';
									}
								}
							}
						}


						if( $show_title == 1 ){
							$somc_html .= '<h3 class="somc-ext-title"><a href="'.$link.'" title="'.esc_attr($page->post_title).'">'.$page->post_title.'</a></h3>';
						}
						if( $show_content == 1 ){
							if( !empty( $page->post_excerpt ) ){
								$text_content = $page->post_excerpt;
							}else{
								$text_content = $page->post_content;
							}

							if ( post_password_required($page) ) {
								$content = '<!-- password protected -->';
							}else{
								$content = somc_unqprfx_parse_content( $text_content, $limit_content, $strip_tags, $strip_shortcodes, $more_tag );
								$content = do_shortcode( $content );

								if( $show_title == 0 ){
									$content = '<a href="'.$link.'">'.$content.'</a>';
								}
							}

							$somc_html .= '<div class="somc-ext-item-content">'.$content.'</div>';

						}
						if( $show_child_count == 1 ){
							$count_subpages = count(get_pages("child_of=".$page->ID));
							if( $count_subpages > 0 ){
								$child_count_pos = strpos($child_count_template, '%child_count%');
								if($child_count_pos === false) {
									$child_count_template_html =  $child_count_template.' '.$count_subpages;
									$somc_html .= '<div class="somc-ext-child-count">'.$child_count_template_html.'</div>';
								} else {
									$child_count_template_html =  str_replace('%child_count%', $count_subpages, $child_count_template);
									$somc_html .= '<div class="somc-ext-child-count">'.$child_count_template_html.'</div>';
								}
							}
						}
						if( $show_meta_key != '' ){
							$post_meta = get_post_meta($page->ID, $show_meta_key, true);
							if( !empty($post_meta) ){
								$meta_pos = strpos($meta_template, '%meta%');
								if($meta_pos === false) {
									$meta_template_html =  $meta_template.' '.$post_meta;
									$somc_html .= '<div class="somc-ext-meta">'.$meta_template_html.'</div>';
								} else {
									$meta_template_html =  str_replace('%meta%', $post_meta, $meta_template);
									$somc_html .= '<div class="somc-ext-meta">'.$meta_template_html.'</div>';
								}
							}
						}
						$somc_html .= '</div>'."\n";
					}
				}
			}
		}
		$return = $somc_unqprfx_powered_line;
		if ($somc_html) {
			$return .= '<div class="somc somc-ext '.$class.'">'."\n".$somc_html."\n".'</div>';
		}else{
			$return .= '<!-- no pages to show -->';
		}
		return $return;
	}
	add_shortcode( 'somc_ext', 'somc_unqprfx_ext_shortcode' );
	add_shortcode( 'somcext', 'somc_unqprfx_ext_shortcode' );
}


if ( !function_exists('somc_unqprfx_norm_params') ) {
	function somc_unqprfx_norm_params( $str ) {
		global $post;
		$new_str = $str;
		$new_str = str_replace('this', $post->ID, $new_str); 
		$new_str = str_replace('current', $post->ID, $new_str); 
		$new_str = str_replace('curent', $post->ID, $new_str);
		$new_str = str_replace('parent', $post->post_parent, $new_str);
		return $new_str;
	}
}


if ( !function_exists('somc_unqprfx_parse_content') ) {
	function somc_unqprfx_parse_content($content, $limit_content = 250, $strip_tags = 1, $strip_shortcodes = 1, $more_tag = 1) {

		$more_tag_found = 0;
		$content_before_more_tag_length = 0;

		if( $more_tag ){
			if ( preg_match('/<!--more(.*?)?-->/', $content, $matches) ) {
				$more_tag_found = 1;
				$more_tag = $matches[0];
				$content_temp = explode($matches[0], $content);
				$content_temp = $content_temp[0];
				$content_before_more_tag_length = strlen($content_temp);
				$content = substr_replace($content, '###more###', $content_before_more_tag_length, 0);
			}
		}

		if( $strip_tags ){
			$content = str_replace('</', ' </', $content);
			$content = strip_tags($content);
		}

		if( $strip_shortcodes ){
			$content = strip_shortcodes( $content );
		}

		if( $more_tag && $more_tag_found ){
			$fake_more_pos = mb_strpos($content, '###more###', 0, 'UTF-8');
			if( $fake_more_pos === false ) {
			} else {
				$content = mb_substr($content, 0, $fake_more_pos, 'UTF-8');
			}
		}else{
			if( strlen($content) > $limit_content ){ 
				$pos = strpos($content, ' ', $limit_content);
				if ($pos !== false) {
					$first_space_pos = $pos;
				}else{
					$first_space_pos = $limit_content;
				}
				$content = mb_substr($content, 0, $first_space_pos, 'UTF-8') . '...';
			}
		}

		$output = force_balance_tags($content);
		return $output;
	}
}


if ( !function_exists('somc_unqprfx_get_first_image') ) {
	function somc_unqprfx_get_first_image( $content='' ) {
		$first_img = '';
		$matchCount = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
		if ( $matchCount !== 0 ) {
			$first_img = $matches[1][0];
		}
		return $first_img;
	}
}

if ( ! function_exists('somc_unqprfx_plugin_meta') ) {
	function somc_unqprfx_plugin_meta( $links, $file ) {
		if ( strpos( $file, 'somc.php' ) !== false ) {
			$links = array_merge( $links, array( '<a href="http://web-profile.com.ua/wordpress/plugins/somc/" title="Plugin page">' . __('somc') . '</a>' ) );
		}
		return $links;
	}
	add_filter( 'plugin_row_meta', 'somc_unqprfx_plugin_meta', 10, 2 );
}