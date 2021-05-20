<?php

declare(strict_types=1);

namespace Stepapo\Menu;


class Utils
{
	public static function replaceParams(array $array, mixed $params)
	{
		$parsedArray = [];
		foreach ($array as $key => $value) {
			$parsedArray[self::replace($key, $params)] = is_array($value)
				? self::replaceParams($value, $params)
				: self::replace($value, $params);
		}
		return $parsedArray;
	}


	public static function replace(mixed $value, array $params)
	{
		if (is_array($value)) {
			array_walk($value, function(&$v) use ($params) {
				$v = self::replace($v, $params);
			});
			return $value;
		} else if (is_string($value)) {
			preg_match('/^%(.*)%$/', $value, $m);
			if (isset($m[1])) {
				return array_key_exists($m[1], $params) ? $params[$m[1]] : $value;
			}
			return $value;
		}
		return $value;
	}
}
