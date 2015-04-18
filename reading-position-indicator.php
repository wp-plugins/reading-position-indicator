<?php
/**
Plugin Name: Reading Position Indicator
Plugin URI: http:/iworks.pl/
Description: Add reading position indicator on page top.
Author: Marcin Pietrzak
Version: 1.0.1
Author URI: http://iworks.pl/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Copyright Marcin Pietrzak (marcin@iworks.pl)

this program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

 */

if ( !defined( 'WPINC' ) ) {
    die;
}

include_once dirname(__FILE__).'/etc/options.php';

$vendor = dirname(__FILE__).'/vendor';

if ( !class_exists('iworks_options') ) {
    include_once $vendor.'/iworks/options.php';
}
include_once $vendor.'/iworks/position.php';

/**
 * i18n
 */
load_plugin_textdomain( 'reading-position-indicator', false, dirname( plugin_basename( __FILE__) ).'/languages' );

/**
 * load options
 */
function get_iworks_reading_position_indicator_options()
{
    $options = new iworks_options();
    $options->set_option_function_name( 'iworks_reading_position_indicator_options' );
    $options->set_option_prefix( 'irpi_' );
    $options->init();
    return $options;
}

function iworks_reading_position_indicator_activate()
{
    $options = get_iworks_reading_position_indicator_options();
    $options->activate();
}

function iworks_reading_position_indicator_deactivate()
{
    $options->set_option_prefix( iworks_reading_position_indicator);
    $options->deactivate();
}
/**
 * start
 */
new iworks_position();
