<?php

/**
 * This file is part of FFI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FFI\Scalar;

use FFI\CData;
use FFI\CType;

/**
 * @internal TypeConstructorsTrait is an internal library trait, please do not use it in your code.
 * @psalm-internal FFI\Scalar
 */
trait TypeConstructorsTrait
{
    /**
     * @param int $value
     * @param bool $owned
     * @return CData
     */
    public static function int8(int $value = 0, bool $owned = true): CData
    {
        return self::create('int8_t', $value, $owned);
    }

    /**
     * @param string|CType $type
     * @param mixed $value
     * @param bool $owned
     * @return CData
     */
    public static function create(string|CType $type, mixed $value, bool $owned = true): CData
    {
        $instance = \FFI::new($type, $owned);
        $instance->cdata = $value;

        return $instance;
    }

    /**
     * @param int[] $value
     * @param bool $owned
     * @return CData
     */
    public static function int8Array(iterable $value = [], bool $owned = true): CData
    {
        return self::array('int8_t', $value, $owned);
    }

    /**
     * @param string|CType $type
     * @param iterable $initializer
     * @param bool $owned
     * @return CData
     */
    public static function array(string|CType $type, iterable $initializer = [], bool $owned = true): CData
    {
        $initializer = self::iterableValues($initializer);

        if (\is_string($type)) {
            $type = \FFI::type($type);
        }

        if (\count($initializer) === 0) {
            return \FFI::addr(\FFI::new($type, $owned));
        }

        $instance = \FFI::new(\FFI::arrayType($type, [\count($initializer)]), $owned);

        foreach ($initializer as $i => $value) {
            $instance[$i] = $value;
        }

        return $instance;
    }

    /**
     * @psalm-template T
     *
     * @param iterable<mixed, T> $initializer
     * @return array<positive-int, T>
     */
    private static function iterableValues(iterable $initializer): array
    {
        return $initializer instanceof \Traversable
            ? \iterator_to_array($initializer, false)
            : [...$initializer];
    }

    /**
     * @param int $value
     * @param bool $owned
     * @return CData
     */
    public static function uint8(int $value = 0, bool $owned = true): CData
    {
        return self::create('uint8_t', $value, $owned);
    }

    /**
     * @param int[] $value
     * @param bool $owned
     * @return CData
     */
    public static function uint8Array(iterable $value = [], bool $owned = true): CData
    {
        return self::array('uint8_t', $value, $owned);
    }

    /**
     * @param int $value
     * @param bool $owned
     * @return CData
     */
    public static function int16(int $value = 0, bool $owned = true): CData
    {
        return self::create('int16_t', $value, $owned);
    }

    /**
     * @param int[] $value
     * @param bool $owned
     * @return CData
     */
    public static function int16Array(iterable $value = [], bool $owned = true): CData
    {
        return self::array('int16_t', $value, $owned);
    }

    /**
     * @param int $value
     * @param bool $owned
     * @return CData
     */
    public static function uint16(int $value = 0, bool $owned = true): CData
    {
        return self::create('uint16_t', $value, $owned);
    }

    /**
     * @param int[] $value
     * @param bool $owned
     * @return CData
     */
    public static function uint16Array(iterable $value = [], bool $owned = true): CData
    {
        return self::array('uint16_t', $value, $owned);
    }

    /**
     * @param int $value
     * @param bool $owned
     * @return CData
     */
    public static function int32(int $value = 0, bool $owned = true): CData
    {
        return self::create('int32_t', $value, $owned);
    }

    /**
     * @param int[] $value
     * @param bool $owned
     * @return CData
     */
    public static function int32Array(iterable $value = [], bool $owned = true): CData
    {
        return self::array('int32_t', $value, $owned);
    }

    /**
     * @param int $value
     * @param bool $owned
     * @return CData
     */
    public static function uint32(int $value = 0, bool $owned = true): CData
    {
        return self::create('uint32_t', $value, $owned);
    }

    /**
     * @param int[] $value
     * @param bool $owned
     * @return CData
     */
    public static function uint32Array(iterable $value = [], bool $owned = true): CData
    {
        return self::array('uint32_t', $value, $owned);
    }

    /**
     * @param int $value
     * @param bool $owned
     * @return CData
     */
    public static function int64(int $value = 0, bool $owned = true): CData
    {
        return self::create('int64_t', $value, $owned);
    }

    /**
     * @param int[] $value
     * @param bool $owned
     * @return CData
     */
    public static function int64Array(iterable $value = [], bool $owned = true): CData
    {
        return self::array('int64_t', $value, $owned);
    }

    /**
     * @param int $value
     * @param bool $owned
     * @return CData
     */
    public static function uint64(int $value = 0, bool $owned = true): CData
    {
        return self::create('uint64_t', $value, $owned);
    }

    /**
     * @param int[] $value
     * @param bool $owned
     * @return CData
     */
    public static function uint64Array(iterable $value = [], bool $owned = true): CData
    {
        return self::array('uint64_t', $value, $owned);
    }

    /**
     * @param float $value
     * @param bool $owned
     * @return CData
     */
    public static function float(float $value = 0.0, bool $owned = true): CData
    {
        return self::create('float', $value, $owned);
    }

    /**
     * @param float[] $value
     * @param bool $owned
     * @return CData
     */
    public static function floatArray(iterable $value = [], bool $owned = true): CData
    {
        return self::array('float', $value, $owned);
    }

    /**
     * @param float $value
     * @param bool $owned
     * @return CData
     */
    public static function double(float $value = 0.0, bool $owned = true): CData
    {
        return self::create('double', $value, $owned);
    }

    /**
     * @param float[] $value
     * @param bool $owned
     * @return CData
     */
    public static function doubleArray(iterable $value = [], bool $owned = true): CData
    {
        return self::array('double', $value, $owned);
    }

    /**
     * @param float $value
     * @param bool $owned
     * @return CData
     */
    public static function longDouble(float $value = 0.0, bool $owned = true): CData
    {
        return self::create('long double', $value, $owned);
    }

    /**
     * @param float[] $value
     * @param bool $owned
     * @return CData
     */
    public static function longDoubleArray(iterable $value = [], bool $owned = true): CData
    {
        return self::array('long double', $value, $owned);
    }

    /**
     * @param bool $value
     * @param bool $owned
     * @return CData
     */
    public static function bool(bool $value = true, bool $owned = true): CData
    {
        return self::create('bool', $value, $owned);
    }

    /**
     * @param bool[] $value
     * @param bool $owned
     * @return CData
     */
    public static function boolArray(iterable $value = [], bool $owned = true): CData
    {
        return self::array('bool', $value, $owned);
    }

    /**
     * @param string $char
     * @param bool $owned
     * @return CData
     */
    public static function char(string $char = "\0", bool $owned = true): CData
    {
        assert(strlen($char) === 1);

        return self::create('char', $char, $owned);
    }

    /**
     * @param string[] $value
     * @param bool $owned
     * @return CData
     */
    public static function charArray(iterable $value = [], bool $owned = true): CData
    {
        return self::array('char', $value, $owned);
    }

    /**
     * @param string[] $strings
     * @param bool $owned
     * @return CData|string|string[]
     * @psalm-return CData
     */
    public static function stringArray(iterable $strings, bool $owned = true): CData
    {
        $result = [];

        foreach ($strings as $item) {
            $result[] = self::string($item, false);
        }

        return self::array('char *', $result, $owned);
    }

    /**
     * @param string[] $strings
     * @param bool $owned
     * @return CData|string|string[]
     * @psalm-return CData
     */
    public static function wideStringArray(iterable $strings, bool $owned = true): CData
    {
        $result = [];

        foreach ($strings as $item) {
            $result[] = self::wideString($item, false);
        }

        return self::array('char *', $result, $owned);
    }

    /**
     * @param string $string
     * @param bool $owned
     * @return CData|string|string[]
     * @psalm-return CData
     */
    public static function string(string $string, bool $owned = true): CData
    {
        $length = \strlen($nullTerminated = $string . "\0");
        $instance = \FFI::new("char[$length]", $owned);

        \FFI::memcpy($instance, $nullTerminated, $length);

        return $instance;
    }

    /**
     * @param string $string
     * @param bool $owned
     * @return CData|string|string[]
     * @psalm-return CData
     */
    public static function wideString(string $string, bool $owned = true): CData
    {
        $length = \strlen($nullTerminated = $string . "\0\0");
        $instance = \FFI::new("char[$length]", $owned);

        \FFI::memcpy($instance, $nullTerminated, $length);

        return $instance;
    }
}
