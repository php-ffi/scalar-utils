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

final class Type
{
    use TypeConstructorsTrait;
    use TypeSerializersTrait;

    /**
     * @var string
     */
    private const NAME_PATTERN = '/FFI\\\\CData:(?:struct\h)?(.+?)\h*Object/ium';

    /**
     * @param CData $type
     * @param string $name
     * @return bool
     */
    public static function of(CData $type, string $name): bool
    {
        return self::name($type) === $name;
    }

    /**
     * @param CData $type
     * @return string
     */
    public static function name(CData $type): string
    {
        \preg_match(self::NAME_PATTERN, \print_r($type, true), $matches);

        return $matches[1] ?? 'unknown';
    }
}
