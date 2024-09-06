# WPCompat

This work-in-progress repo will contain a collection of tools for checking and managing the WordPress version compatibility of plugins, themes, and other WordPress tooling.

Please don't open PRs or issues just yet, this is a brand new repo.

## Installation

```shell
composer require --dev johnbillion/wp-compat
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details>
  <summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include rules.neon in your project's PHPStan config:

```
includes:
    - vendor/johnbillion/wp-compat/rules.neon
```
</details>

## Tools

### PHPStan extension

A PHPStan extension which determines if your code is compatible with any given version of WordPress based on the symbols that it uses.

### symbols.json

The [symbols.json](symbols.json) file contains a dictionary of all functions and methods in WordPress along with the version of WordPress in which they were introduced.

The file can be regenerated by running:

```shell
composer generate
```

The JSON schema for the file can be found in [schemas/symbols.json](schemas/symbols.json).

## License

MIT
