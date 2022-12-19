<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage PLUMBING
 * @since PLUMBING 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'plumbing_storage_get' ) ) {
	function plumbing_storage_get( $var_name, $default = '' ) {
		global $PLUMBING_STORAGE;
		return isset( $PLUMBING_STORAGE[ $var_name ] ) ? $PLUMBING_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'plumbing_storage_set' ) ) {
	function plumbing_storage_set( $var_name, $value ) {
		global $PLUMBING_STORAGE;
		$PLUMBING_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'plumbing_storage_empty' ) ) {
	function plumbing_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $PLUMBING_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $PLUMBING_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $PLUMBING_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $PLUMBING_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'plumbing_storage_isset' ) ) {
	function plumbing_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $PLUMBING_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $PLUMBING_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $PLUMBING_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $PLUMBING_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'plumbing_storage_inc' ) ) {
	function plumbing_storage_inc( $var_name, $value = 1 ) {
		global $PLUMBING_STORAGE;
		if ( empty( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = 0;
		}
		$PLUMBING_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'plumbing_storage_concat' ) ) {
	function plumbing_storage_concat( $var_name, $value ) {
		global $PLUMBING_STORAGE;
		if ( empty( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = '';
		}
		$PLUMBING_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'plumbing_storage_get_array' ) ) {
	function plumbing_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $PLUMBING_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $PLUMBING_STORAGE[ $var_name ][ $key ] ) ? $PLUMBING_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $PLUMBING_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $PLUMBING_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'plumbing_storage_set_array' ) ) {
	function plumbing_storage_set_array( $var_name, $key, $value ) {
		global $PLUMBING_STORAGE;
		if ( ! isset( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$PLUMBING_STORAGE[ $var_name ][] = $value;
		} else {
			$PLUMBING_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'plumbing_storage_set_array2' ) ) {
	function plumbing_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $PLUMBING_STORAGE;
		if ( ! isset( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $PLUMBING_STORAGE[ $var_name ][ $key ] ) ) {
			$PLUMBING_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$PLUMBING_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$PLUMBING_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'plumbing_storage_merge_array' ) ) {
	function plumbing_storage_merge_array( $var_name, $key, $value ) {
		global $PLUMBING_STORAGE;
		if ( ! isset( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$PLUMBING_STORAGE[ $var_name ] = array_merge( $PLUMBING_STORAGE[ $var_name ], $value );
		} else {
			$PLUMBING_STORAGE[ $var_name ][ $key ] = array_merge( $PLUMBING_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'plumbing_storage_set_array_after' ) ) {
	function plumbing_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $PLUMBING_STORAGE;
		if ( ! isset( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			plumbing_array_insert_after( $PLUMBING_STORAGE[ $var_name ], $after, $key );
		} else {
			plumbing_array_insert_after( $PLUMBING_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'plumbing_storage_set_array_before' ) ) {
	function plumbing_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $PLUMBING_STORAGE;
		if ( ! isset( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			plumbing_array_insert_before( $PLUMBING_STORAGE[ $var_name ], $before, $key );
		} else {
			plumbing_array_insert_before( $PLUMBING_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'plumbing_storage_push_array' ) ) {
	function plumbing_storage_push_array( $var_name, $key, $value ) {
		global $PLUMBING_STORAGE;
		if ( ! isset( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $PLUMBING_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $PLUMBING_STORAGE[ $var_name ][ $key ] ) ) {
				$PLUMBING_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $PLUMBING_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'plumbing_storage_pop_array' ) ) {
	function plumbing_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $PLUMBING_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $PLUMBING_STORAGE[ $var_name ] ) && is_array( $PLUMBING_STORAGE[ $var_name ] ) && count( $PLUMBING_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $PLUMBING_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $PLUMBING_STORAGE[ $var_name ][ $key ] ) && is_array( $PLUMBING_STORAGE[ $var_name ][ $key ] ) && count( $PLUMBING_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $PLUMBING_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'plumbing_storage_inc_array' ) ) {
	function plumbing_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $PLUMBING_STORAGE;
		if ( ! isset( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = array();
		}
		if ( empty( $PLUMBING_STORAGE[ $var_name ][ $key ] ) ) {
			$PLUMBING_STORAGE[ $var_name ][ $key ] = 0;
		}
		$PLUMBING_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'plumbing_storage_concat_array' ) ) {
	function plumbing_storage_concat_array( $var_name, $key, $value ) {
		global $PLUMBING_STORAGE;
		if ( ! isset( $PLUMBING_STORAGE[ $var_name ] ) ) {
			$PLUMBING_STORAGE[ $var_name ] = array();
		}
		if ( empty( $PLUMBING_STORAGE[ $var_name ][ $key ] ) ) {
			$PLUMBING_STORAGE[ $var_name ][ $key ] = '';
		}
		$PLUMBING_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'plumbing_storage_call_obj_method' ) ) {
	function plumbing_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $PLUMBING_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $PLUMBING_STORAGE[ $var_name ] ) ? $PLUMBING_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $PLUMBING_STORAGE[ $var_name ] ) ? $PLUMBING_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'plumbing_storage_get_obj_property' ) ) {
	function plumbing_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $PLUMBING_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $PLUMBING_STORAGE[ $var_name ]->$prop ) ? $PLUMBING_STORAGE[ $var_name ]->$prop : $default;
	}
}
