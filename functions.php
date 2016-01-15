<?php

function getValue($array, $key, $default = null) {
	return isset($array[$key]) ? $array[$key] : $default;
}

function validateRequiredField($value) {
	return !empty($value);
}

function validateLength($value, $min, $max = null) {
	$length = mb_strlen($value, "UTF-8");
	if ($min && $min > $length) {
		return false;
	}
	
	if ($max && $max < $length) {
		return false;
	}
	
	return true;
}

function getErrorClass($errors, $fieldName, $errorClass = 'error') {
	return !empty($errors[$fieldName]) ? $errorClass : '';
}

function getFieldErrors($errors, $fieldName) {
	$html = '';
	foreach (getValue($errors, $fieldName, []) as $error) {
		$html .= sprintf('<p>%s</p>', $error);
	}
	return $html;
	
}

function options($data, $selected) {
	$html = '';
	foreach ($data as $value => $text) {
		$html .= sprintf('<option value="%s" %s>%s</option>',
				$value,
				$value == $selected ? 'selected="selected"' : '',
				$text);
	}
	return $html;
}