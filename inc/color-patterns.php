<?php
/**
 * Newspack Theme: Color Patterns
 *
 * @package Newspack
 */

/**
 * Generate the CSS for the current primary color.
 */
function newspack_custom_colors_css() {

	$primary_color = newspack_get_primary_color();
	$secondary_color = newspack_get_secondary_color();

	if ( 'default' !== get_theme_mod( 'theme_colors', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hex', $primary_color );
		$secondary_color = get_theme_mod( 'secondary_color_hex', $secondary_color );
	}

	$primary_color_contrast   = newspack_get_color_contrast( $primary_color );
	$secondary_color_contrast = newspack_get_color_contrast( $secondary_color );

	/**
	 * Checks if color has sufficient contrast against white; if no, replaces it.
	 */
	function newspack_color_with_contrast( $color ) {
		$contrast = newspack_get_color_contrast( $color );
		if ( '#000' === $contrast ) {
			return '#5a5a5a';
		}
		return $color;
	}

	$theme_css = '
		/* Set primary background color */

		.main-navigation .sub-menu,
		.mobile-sidebar,
		.site-header .main-navigation .main-menu .sub-menu,
		body.header-default-background.header-default-height .site-header .tertiary-menu .menu-highlight a,
		.entry .entry-content > .has-primary-background-color,
		.entry .entry-content > *[class^="wp-block-"].has-primary-background-color,
		.entry .entry-content > *[class^="wp-block-"] .has-primary-background-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color.has-primary-background-color,
		.entry .entry-content .wp-block-file .wp-block-file__button {
			background-color: ' . $primary_color . '; /* base: #0073a8; */
		}

		/* Set primary color that contrasts against white */

		.main-navigation .main-menu > li,
		.main-navigation ul.main-menu > li > a,
		.entry .entry-content .more-link:hover,
		.main-navigation .main-menu > li > a + svg,
		.comment .comment-metadata > a:hover,
		.comment .comment-metadata .comment-edit-link:hover,
		.site-info a:hover,
		.entry .entry-content .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color) {
			color: ' . newspack_color_with_contrast( $primary_color ) . ';
		}

		/* Set primary color */

		.entry .entry-content > .has-primary-color,
		.entry .entry-content > *[class^="wp-block-"] .has-primary-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color blockquote.has-primary-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color blockquote.has-primary-color p {
			color: ' . $primary_color . ';
		}

		.mobile-sidebar,
		.mobile-sidebar a,
		.mobile-sidebar a:visited,
		.mobile-sidebar .main-navigation .sub-menu > li > a,
		.mobile-sidebar .main-navigation ul.main-menu > li > a,
		.site-header .main-navigation .sub-menu > li > a,
		body.header-default-background.header-default-height .site-header .tertiary-menu .menu-highlight a {
			color: ' . $primary_color_contrast . ';
		}

		/* Set primary border color */

		blockquote,
		.entry .entry-content blockquote,
		.entry .entry-content .wp-block-quote:not(.is-large),
		.entry .entry-content .wp-block-quote:not(.is-style-large) {
			border-color: ' . $primary_color . '; /* base: #0073a8; */
		}

		.gallery-item > div > a:focus {
			box-shadow: 0 0 0 2px ' . $primary_color . '; /* base: #0073a8; */
		}

		/* Set secondary background color */

		.entry .entry-content .wp-block-button .wp-block-button__link:not(.has-background),
		.entry .button, button, input[type="button"], input[type="reset"], input[type="submit"],
		.entry .entry-content > .has-secondary-background-color,
		.entry .entry-content > *[class^="wp-block-"].has-secondary-background-color,
		.entry .entry-content > *[class^="wp-block-"] .has-secondary-background-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color.has-secondary-background-color {
			background-color:' . $secondary_color . '; /* base: #666 */
		}

		/* Set colour that contrasts against the secondary background */

		.entry .entry-content .wp-block-button .wp-block-button__link:not(.has-background),
		.entry .button, button, input[type="button"], input[type="reset"], input[type="submit"] {
			color: ' . $secondary_color_contrast . ';
		}

		/* Set secondary color */

		.entry .entry-content > .has-secondary-color,
		.entry .entry-content > *[class^="wp-block-"] .has-secondary-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color blockquote.has-secondary-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color blockquote.has-secondary-color p {
			color:' . $secondary_color . '; /* base: #666 */
		}

		/* Set secondary color with contrast */

		.entry-content a,
		.entry-content a:visited,
		.author-bio .author-link,
		.entry .entry-content .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color) {
			color:' . newspack_color_with_contrast( $secondary_color ) . ';
		}

		/* Set secondary border color */

		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="range"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="week"]:focus,
		input[type="time"]:focus,
		input[type="datetime"]:focus,
		input[type="datetime-local"]:focus,
		input[type="color"]:focus,
		textarea:focus {
			border-color: ' . $secondary_color . '; /* base: #0073a8; */
		}

		/* Set primary variation background color */

		.site-header .main-navigation .sub-menu > li > a:hover,
		.site-header .main-navigation .sub-menu > li > a:focus,
		.site-header .main-navigation .sub-menu > li > a:hover:after,
		.site-header .main-navigation .sub-menu > li > a:focus:after,
		.site-header .main-navigation .sub-menu > li > .menu-item-link-return:hover,
		.site-header .main-navigation .sub-menu > li > .menu-item-link-return:focus,
		.site-header .main-navigation .sub-menu > li > a:not(.submenu-expand):hover,
		.site-header .main-navigation .sub-menu > li > a:not(.submenu-expand):focus,
		.entry .entry-content > .has-primary-variation-background-color,
		.entry .entry-content > *[class^="wp-block-"].has-primary-variation-background-color,
		.entry .entry-content > *[class^="wp-block-"] .has-primary-variation-background-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color.has-primary-variation-background-color {
			background-color: ' . newspack_adjust_brightness( $primary_color, -30 ) . '; /* base: #005177; */
		}

		/* Set primary variation color */

		.main-navigation .main-menu > li > a:hover,
		.main-navigation .main-menu > li > a:hover + svg,
		.author-bio .author-description .author-link:hover,
		.entry .entry-content > .has-primary-variation-color,
		.entry .entry-content > *[class^="wp-block-"] .has-primary-variation-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color blockquote.has-primary-variation-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color blockquote.has-primary-variation-color p,
		.comment .comment-author .fn a:hover,
		.comment-reply-link:hover,
		.comment-navigation .nav-previous a:hover,
		.comment-navigation .nav-next a:hover,
		#cancel-comment-reply-link:hover {
			color: ' . newspack_adjust_brightness( $primary_color, -40 ) . '; /* base: #0073a8; */
		}

		/* Set secondary variation background color */

		.entry .entry-content > .has-secondary-variation-background-color,
		.entry .entry-content > *[class^="wp-block-"].has-secondary-variation-ackground-color,
		.entry .entry-content > *[class^="wp-block-"] .has-secondary-variation-background-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color.has-secondary-variation-background-color {
			background-color:' . newspack_adjust_brightness( $secondary_color, -40 ) . '; /* base: #666 */
		}

		/* Set secondary variation color */

		.entry .entry-content a:hover,
		.widget a:hover,
		.author-bio .author-link:hover,
		.entry .entry-content > .has-secondary-variation-color,
		.entry .entry-content > *[class^="wp-block-"] .has-secondary-variation-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color blockquote.has-secondary-variation-color,
		.entry .entry-content > *[class^="wp-block-"].is-style-solid-color blockquote.has-secondary-variation-color p {
			color:' . newspack_adjust_brightness( $secondary_color, -40 ) . '; /* base: #666 */
		}

		';

	if ( newspack_is_active_style_pack( 'default' ) ) {
		$theme_css .= '
			.cat-links a,
			.cat-links a:visited,
			body.header-default-background.header-default-height .site-header .tertiary-menu .menu-highlight a {
				background-color: ' . $primary_color . ';
				color: ' . $primary_color_contrast . ';
			}
			.cat-links a:hover {
				background-color: ' . newspack_adjust_brightness( $primary_color, -40 ) . ';
				color: ' . $primary_color_contrast . ';
			}
			.accent-header, .article-section-title,
			.entry .entry-footer a:hover {
				color: ' . newspack_color_with_contrast( $primary_color ) . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'default', 'style-3', 'style-4' ) ) {
		$theme_css .= '
			.archive .page-title,
			.entry-meta .byline a, .entry-meta .byline a:visited,
			.entry .entry-content .entry-meta .byline a, .entry .entry-content .entry-meta .byline a:visited,
			.entry .entry-meta a:hover {
				color: ' . newspack_color_with_contrast( $primary_color ) . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'style-1' ) ) {
		$theme_css .= '
			.accent-header:before,
			.article-section-title:before,
			.cat-links:before,
			.page-title:before {
				background-color: ' . $primary_color . ';
			}

			.entry .entry-content .wp-block-pullquote blockquote:before {
				color: ' . $primary_color . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'style-2' ) ) {
		$theme_css .= '
			.site-content #primary {
				border-color: ' . newspack_adjust_brightness( $primary_color, -40 ) . ';
			}

			.site-footer {
				background-color: ' . $primary_color . ';
				color: ' . $primary_color_contrast . ';
			}

			.entry .entry-content .has-drop-cap:not(:focus)::first-letter {
				border-color: ' . $primary_color . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'style-3' ) ) {
		$theme_css .= '
			.cat-links a,
			.site-content .wp-block-newspack-blocks-homepage-articles .article-section-title,
			.entry .entry-footer {
				color: ' . $primary_color . ';
			}

			.cat-links a:hover {
				color: ' . newspack_adjust_brightness( $primary_color, -40 ) . ';
			}

			.accent-header:before,
			.site-content .wp-block-newspack-blocks-homepage-articles .article-section-title:before,
			.cat-links:before,
			.archive .page-title:before,
			.entry .entry-content .wp-block-image figcaption:after {
				background-color: ' . $primary_color . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'style-4' ) ) {
		$theme_css .= '
			.accent-header,
			.site-content .wp-block-newspack-blocks-homepage-articles .article-section-title,
			.cat-links,
			.entry .entry-footer {
				color: ' . $primary_color . ';
			}

			.entry .entry-content .has-drop-cap:not(:focus)::first-letter {
				background-color: ' . $primary_color . ';
				color: ' . $primary_color_contrast . ';
			}

			.site-footer .widget .widget-title {
				color: ' . $primary_color . ';
			}
		';
	}

	if ( true === get_theme_mod( 'header_solid_background', false ) && ! newspack_is_active_style_pack( 'style-3', 'style-4' ) ) {
		$theme_css .= '
			.header-solid-background .site-header {
				background-color: ' . $primary_color . ';
			}
			.header-solid-background .top-header-contain {
				background-color: ' . newspack_adjust_brightness( $primary_color, -10 ) . ';
				border-bottom-color: ' . newspack_adjust_brightness( $primary_color, -15 ) . ';
			}

			.header-solid-background .site-header,
			.header-solid-background .site-title,
			.header-solid-background .site-title a:link,
			.header-solid-background .site-title a:visited,
			.header-solid-background .site-description,
			.header-solid-background.header-simplified .main-navigation .main-menu > li,
			.header-solid-background.header-simplified .main-navigation ul.main-menu > li > a,
			.header-solid-background.header-simplified .main-navigation ul.main-menu > li > a:hover,
			.header-solid-background .top-header-contain,
			.header-solid-background .middle-header-contain,
			.main-navigation .sub-menu a {
				color: ' . $primary_color_contrast . ';
			}
		';
	}

	$editor_css = '
		/*
		 * Set colors for:
		 * - links
		 * - blockquote
		 * - pullquote (solid color)
		 * - buttons
		 */

		.entry-meta .byline a {
			color: ' . newspack_color_with_contrast( $primary_color ) . '; /* base: #0073a8; */
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-quote:not(.is-large):not(.is-style-large),
		.editor-styles-wrapper .editor-block-list__layout .wp-block-freeform blockquote {
			border-color: ' . $primary_color . '; /* base: #0073a8; */
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-pullquote.is-style-solid-color:not(.has-background-color) {
			background-color: ' . $primary_color . '; /* base: #0073a8; */
		}

		/* Secondary color */

		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__button,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:active,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:focus,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover {
			background-color: ' . $secondary_color . '; /* base: #0073a8; */
		}

		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__button,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:active,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:focus,
		.editor-block-list__layout .editor-block-list__block .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover {
			color: ' . $secondary_color_contrast . '; /* base: #0073a8; */
		}

		/* Hover colors */
		.editor-block-list__layout .editor-block-list__block a:hover,
		.editor-block-list__layout .editor-block-list__block a:active,
		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__textlink:hover {
			color: ' . newspack_adjust_brightness( $secondary_color, -40 ) . '; /* base: #005177; */
		}

		.editor-block-list__layout .editor-block-list__block a,
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color),
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline:hover .wp-block-button__link:not(.has-text-color),
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline:focus .wp-block-button__link:not(.has-text-color),
		.editor-block-list__layout .editor-block-list__block .wp-block-button.is-style-outline:active .wp-block-button__link:not(.has-text-color),
		.editor-block-list__layout .editor-block-list__block .wp-block-file .wp-block-file__textlink {
			color: ' . newspack_color_with_contrast( $secondary_color ) . ';
		}

		/* Do not overwrite solid color pullquote or cover links */
		.editor-block-list__layout .editor-block-list__block .wp-block-pullquote.is-style-solid-color a,
		.editor-block-list__layout .editor-block-list__block .wp-block-cover a {
			color: inherit;
		}
		';

	if ( newspack_is_active_style_pack( 'default', 'style-3', 'style-4' ) ) {
		$editor_css .= '
			.editor-block-list__layout .editor-block-list__block .entry-meta .byline a {
				color: ' . newspack_color_with_contrast( $primary_color ) . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'default' ) ) {
		$editor_css .= '
			.editor-block-list__layout .editor-block-list__block .article-section-title {
				color: ' . newspack_color_with_contrast( $primary_color ) . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'style-1' ) ) {
		$editor_css .= '
			.editor-block-list__layout .editor-block-list__block .accent-header:before,
			.editor-block-list__layout .editor-block-list__block .article-section-title:before {
				background-color: ' . $primary_color . ';
			}
			.editor-styles-wrapper .wp-block[data-type="core/pullquote"] .wp-block-pullquote:not(.is-style-solid-color) blockquote::before {
				color: ' . $primary_color . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'style-2' ) ) {
		$editor_css .= '
			.editor-block-list__layout .editor-block-list__block .wp-block-paragraph.has-drop-cap:not(:focus)::first-letter {
				border-color: ' . $primary_color . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'style-3' ) ) {
		$editor_css .= '
			.editor-block-list__layout .editor-block-list__block .accent-header,
			.editor-block-list__layout .editor-block-list__block .article-section-title {
				color: ' . $primary_color . ';
			}

			.editor-block-list__layout .editor-block-list__block .accent-header:before,
			.editor-block-list__layout .editor-block-list__block .article-section-title:before,
			.editor-block-list__layout .editor-block-list__block .wp-block-image figcaption.block-editor-rich-text__editable:after {
				background-color: ' . $primary_color . ';
			}
		';
	}

	if ( newspack_is_active_style_pack( 'style-4' ) ) {
		$editor_css .= '
			.editor-block-list__layout .editor-block-list__block .accent-header,
			.editor-block-list__layout .editor-block-list__block .article-section-title {
				color: ' . $primary_color . ';
			}
		';

		$editor_css .= '
			.editor-block-list__layout .editor-block-list__block .wp-block-paragraph.has-drop-cap:not(:focus)::first-letter {
				background-color: ' . $primary_color . ';
				color: ' . $primary_color_contrast . ';
			}
		';

	}

	if ( function_exists( 'register_block_type' ) && is_admin() ) {
		$theme_css = $editor_css;
	}

	/**
	 * Filters Newspack Theme custom colors CSS.
	 *
	 * @since Newspack Theme 1.0
	 *
	 * @param string $css           Base theme colors CSS.
	 * @param int    $primary_color The user's selected color hex.
	 * @param string $saturation    Filtered theme color saturation level.
	 */
	return apply_filters( 'newspack_custom_colors_css', $theme_css, $primary_color );
}
