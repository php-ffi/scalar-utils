# FFI Scalar Utils

<p align="center">
    <a href="https://packagist.org/packages/ffi/scalar-utils"><img src="https://poser.pugx.org/ffi/scalar-utils/require/php?style=for-the-badge" alt="PHP 8.1+"></a>
    <a href="https://packagist.org/packages/ffi/scalar-utils"><img src="https://poser.pugx.org/ffi/scalar-utils/version?style=for-the-badge" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/ffi/scalar-utils"><img src="https://poser.pugx.org/ffi/scalar-utils/v/unstable?style=for-the-badge" alt="Latest Unstable Version"></a>
    <a href="https://packagist.org/packages/ffi/scalar-utils"><img src="https://poser.pugx.org/ffi/scalar-utils/downloads?style=for-the-badge" alt="Total Downloads"></a>
    <a href="https://raw.githubusercontent.com/php-ffi/scalar-utils/master/LICENSE.md"><img src="https://poser.pugx.org/ffi/scalar-utils/license?style=for-the-badge" alt="License MIT"></a>
</p>
<p align="center">
    <a href="https://github.com/php-ffi/scalar-utils/actions"><img src="https://github.com/php-ffi/scalar-utils/workflows/build/badge.svg"></a>
</p>

A set of util methods to interact with PHP and C scalar types.

## Requirements

- PHP >= 7.4
- ext-ffi

## Installation

Library is available as composer repository and can be installed using the 
following command in a root of your project.

```sh
$ composer require ffi/scalar-utils
```

## Usage

### PHP To C Marshalling

```php
use FFI\Scalar\Type;

Type::int8(42);                 // object CData<int8_t> { cdata: 42 }
Type::int8Array([1, 2, 3]);     // object CData<int8_t[3]> { cdata: [1, 2, 3] }
Type::uint8(42);                // object CData<uint8_t> { cdata: 42 }
Type::uint8Array([1, 2, 3]);    // object CData<uint8_t[3]> { cdata: [1, 2, 3] }

Type::int16(42);                // object CData<int16_t> { cdata: 42 }
Type::int16Array([1, 2, 3]);    // object CData<int16_t[3]> { cdata: [1, 2, 3] }
Type::uint16(42);               // object CData<uint16_t> { cdata: 42 }
Type::uint16Array([1, 2, 3]);   // object CData<uint16_t[3]> { cdata: [1, 2, 3] }

Type::int32(42);                // object CData<int32_t> { cdata: 42 }
Type::int32Array([1, 2, 3]);    // object CData<int32_t[3]> { cdata: [1, 2, 3] }
Type::uint32(42);               // object CData<uint32_t> { cdata: 42 }
Type::uint32Array([1, 2, 3]);   // object CData<uint32_t[3]> { cdata: [1, 2, 3] }

Type::int64(42);                // object CData<int64_t> { cdata: 42 }
Type::int64Array([1, 2, 3]);    // object CData<int64_t[3]> { cdata: [1, 2, 3] }
Type::uint64(42);               // object CData<uint64_t> { cdata: 42 }
Type::uint64Array([1, 2, 3]);   // object CData<uint64_t[3]> { cdata: [1, 2, 3] }

Type::short(42);                // object CData<signed short int> { cdata: 42 }
Type::shortArray([1, 2, 3]);    // object CData<signed short int[3]> { cdata: [1, 2, 3] }
Type::ushort(42);               // object CData<unsigned short int> { cdata: 42 }
Type::ushortArray([1, 2, 3]);   // object CData<unsigned short int[3]> { cdata: [1, 2, 3] }

Type::int(42);                  // object CData<signed int> { cdata: 42 }
Type::intArray([1, 2, 3]);      // object CData<signed int[3]> { cdata: [1, 2, 3] }
Type::uint(42);                 // object CData<unsigned int> { cdata: 42 }
Type::uintArray([1, 2, 3]);     // object CData<unsigned int[3]> { cdata: [1, 2, 3] }

Type::long(42);                  // object CData<signed long int> { cdata: 42 }
Type::longArray([1, 2, 3]);      // object CData<signed long int[3]> { cdata: [1, 2, 3] }
Type::ulong(42);                 // object CData<unsigned long int> { cdata: 42 }
Type::ulongArray([1, 2, 3]);     // object CData<unsigned long int[3]> { cdata: [1, 2, 3] }

Type::float(42);                    // object CData<float> { cdata: 42.0 }
Type::floatArray([1, 2, 3]);        // object CData<float[3]> { cdata: [1.0, 2.0, 3.0] }

Type::double(42);                   // object CData<double> { cdata: 42.0 }
Type::doubleArray([1, 2, 3]);       // object CData<double[3]> { cdata: [1.0, 2.0, 3.0] }

Type::longDouble(42);               // object CData<long double> { cdata: 42.0 }
Type::longDoubleArray([1, 2, 3]);   // object CData<long double[3]> { cdata: [1.0, 2.0, 3.0] }

Type::bool(true);                       // object CData<bool> { cdata: true }
Type::boolArray([true, false, true]);   // object CData<bool[3]> { cdata: [true, false, true] }

Type::char('c');                    // object CData<char> { cdata: 'c' }
Type::charArray(['a', 'b', 'c']);   // object CData<char[3]> { cdata: ['a', 'b', 'c'] }

Type::string('hi');                 // object CData<char[3]> { cdata: ['h', 'i', '\0'] }
Type::stringArray(['a', 'b']);      // object CData<char[2][2]> { cdata: [['a' '\0'], ['b', '\0']] }

Type::wideString('hi');             // object CData<wchar_t[3]> { cdata: ['h', 'i', '\0\0'] }
Type::wideStringArray(['a', 'b']);  // object CData<wchar_t[2][2]> { cdata: [['a' '\0\0'], ['b', '\0\0']] }

// Direct API
Type::create($ffi->type('example'), $value); // object CData<example> { cdata: ... }
Type::array($ffi->type('example'), [$value]); // object CData<example[1]> { cdata: [ ... ] }
```

### C To PHP Marshalling

```php
use FFI\Scalar\Type;

Type::toString($cdata);     // string(x) "..."
Type::toWideString($cdata); // string(x) "..."
Type::toInt($cdata);        // int(x)
Type::toFloat($cdata);      // float(x)
Type::toBool($cdata);       // bool(x)
Type::toArray($cdata);      // array(...)
```
