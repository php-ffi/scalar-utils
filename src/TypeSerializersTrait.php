<?php

declare(strict_types=1);

namespace FFI\Scalar;

use FFI\CData;

/**
 * @internal TypeSerializersTrait is an internal library trait, please do not use it in your code.
 * @psalm-internal FFI\Scalar
 */
trait TypeSerializersTrait
{
    /**
     * @param CData|\ArrayAccess $cdata
     * @param positive-int|null $size
     * @return string
     */
    public static function toWideString($cdata, int $size = null): string
    {
        [$i, $result] = [0, ''];

        if ($size !== null) {
            for ($i = 0; $i < $size; ++$i) {
                $char = $cdata[$i];
                $result .= \is_int($char) ? \mb_chr($char) : $char;
            }

            return $result;
        }

        do {
            $char = $cdata[$i];

            if ($char === 0 || $char === "\0") {
                return $result;
            }

            $result .= \is_int($char) ? \mb_chr($char) : $char;
        } while (++$i);

        return $result;
    }


    /**
     * @param CData|\ArrayAccess $cdata
     * @param positive-int|null $size
     * @return string
     */
    public static function toString($cdata, int $size = null): string
    {
        assert($size === null || $size > 0, 'Size value must be greater that 0');

        if ($cdata instanceof CData) {
            return \FFI::string(\FFI::cast('char*', $cdata), $size);
        }

        [$i, $result] = [0, ''];

        if ($size !== null) {
            for ($i = 0; $i < $size; ++$i) {
                $char = $cdata[$i];
                $result .= \is_int($char) ? \chr($char) : $char;
            }

            return $result;
        }

        do {
            $char = $cdata[$i];

            if ($char === 0 || $char === "\0") {
                return $result;
            }

            $result .= \is_int($char) ? \chr($char) : $char;
        } while (++$i);

        return $result;
    }

    /**
     * @param CData $cdata
     * @return int
     */
    public static function toInt(CData $cdata): int
    {
        return (int)$cdata->cdata;
    }

    /**
     * @param CData $cdata
     * @return float
     */
    public static function toFloat(CData $cdata): float
    {
        return (float)$cdata->cdata;
    }

    /**
     * @param CData $cdata
     * @return bool
     */
    public static function toBool(CData $cdata): bool
    {
        return (bool)$cdata->cdata;
    }

    /**
     * @param CData|iterable $array
     * @param positive-int|null $size
     * @return array
     */
    public static function toArray($array, int $size = null): array
    {
        assert($size === null || $size > 0, 'Size value must be greater that 0');

        $data = [];

        if ($size === null) {
            foreach ($array as $item) {
                $data[] = $item;
            }

            return $data;
        }

        for ($i = 0; $i < $size; ++$i) {
            $data[] = $array[$i];
        }

        return $data;
    }
}
