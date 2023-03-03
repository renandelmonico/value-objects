# Value Objects Library

![Packagist Downloads](https://img.shields.io/packagist/dt/renandelmonico/value-objects)
![Packagist Stars](https://img.shields.io/packagist/stars/renandelmonico/value-objects)
![GitHub release (latest by date)](https://img.shields.io/github/v/release/renandelmonico/value-objects)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/renandelmonico/value-objects)
![Packagist License](https://img.shields.io/packagist/l/renandelmonico/value-objects)

A lib to aggregate in your projects with most commons VO's.

> Produced by Renan Delmonico to use in his projects

# Summary

- [What's Value Objects](#whats-value-objects)
- [Documentation](#documentation)
- [Value Objects](#value-objects)
- [Enums](#enums)
- [Pull Requests](#pull-requests)

## What's Value Objects?

- [Martin Fowler's Blog: ValueObject](https://martinfowler.com/bliki/ValueObject.html)

## Documentation

To read the documentation run the Makefile command:
```sh
make doc-generate
```

## Value Objects

- Address
- Boolean
- City
- DateTime
- Email
- Integer
- IP (IPv4 and IPv6)
- Numeric
- Password
- Str
- Text
- UUID

## Enums

- Country
- PasswordAlgo
- State (Brazil)

## Pull Requests

Before you submit a Pull Request you must run the unit and mutation tests and check if the coverage is 100%.

### How?

There are three commands in Makefile (`test-unit`, `test-mutation` and `test-coverage`). You must run this commands.

> Please, rate this lib ❤️ and give stars ⭐
