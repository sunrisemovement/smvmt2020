<?php

namespace smvmt2020;

class Utils {
    public static function getTextColor ($bg){
        $bg = trim($bg, '#');
        $r = hexdec(substr($bg,0,2));
        $g = hexdec(substr($bg,2,2));
        $b = hexdec(substr($bg,4,2));
    
        $squared_contrast = (
            $r * $r * .299 +
            $g * $g * .587 +
            $b * $b * .114
        );
    
        if($squared_contrast > pow(130, 2)){
            return 'rgb(51,52,46)';
        }else{
            return '#FFFFFF';
        }
    }
    
    public static function shiftColor ($color, $shift){
        $color = trim($color, '#');
        $r = hexdec(substr($color,0,2)) + $shift < 255 ? hexdec(substr($color,0,2)) + $shift : 255;
        $g = hexdec(substr($color,2,2)) + $shift < 255 ? hexdec(substr($color,2,2)) + $shift : 255;
        $b = hexdec(substr($color,4,2)) + $shift < 255 ? hexdec(substr($color,4,2)) + $shift : 255;
        return sprintf("#%02x%02x%02x", $r, $g, $b);
    }

    public static function generateCss( $selector, $style, $value, $prefix = '', $suffix = '', $echo = true ) {
		$return = '';
		if ( ! $value || ! $selector ) {
			return;
		}
		$return = sprintf( '%s { %s: %s; }', $selector, $style, $prefix . $value . $suffix );
		if ( $echo ) {
			echo $return;
		}
		return $return;
	}
}