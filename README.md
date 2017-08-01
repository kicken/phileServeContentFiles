# Serve Content Files Plugin for PhileCMS #

This plugin enables phile to serve non-markdown files from within the content folder.

### 1.1 Installation (composer) ###

```json
"require": {
   "kicken/phile-serve-content-files": "*"
}
```

### 2. Activation

After you have installed the plugin you need to activate it. Add the following line to Phile's root `config.php` file:

```php
$config['plugins'][Phile\Plugin\ServeContentFiles\Plugin::class] = [
    'active' => true
];
```
