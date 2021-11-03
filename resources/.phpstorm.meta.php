<?php

namespace PHPSTORM_META {

    registerArgumentsSet('FFIScalarType',
        'void *',

        'bool',

        'float',
        'double',
        'long double',

        'char',
        'signed char',
        'unsigned char',
        'int',
        'signed int',
        'unsigned int',
        'long',
        'signed long',
        'unsigned long',
        'long long',
        'signed long long',
        'unsigned long long',

        'intptr_t',
        'uintptr_t',
        'size_t',
        'ssize_t',
        'ptrdiff_t',
        'off_t',
        'va_list',
        '__builtin_va_list',
        '__gnuc_va_list',

        // stdint.h
        'int8_t',
        'uint8_t',
        'int16_t',
        'uint16_t',
        'int32_t',
        'uint32_t',
        'int64_t',
        'uint64_t',
    );

    expectedArguments(\FFI\Scalar\Type::array(), 0, argumentsSet('FFIScalarType'));
    expectedArguments(\FFI\Scalar\Type::create(), 0, argumentsSet('FFIScalarType'));
}
