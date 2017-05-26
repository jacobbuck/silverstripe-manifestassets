# silverstripe-manifestassets

Get the path of an asset from a generated assets manifest file.

## Usage

In your template you can get the url to your asset:

```html
<script src="$ManifestAsset('awesome.js')" type="script/javascript"></script>
```

It also works with Requirements:

```
<% require js($ManifestAsset('awesome.js')) %>
```

To get the url to your asset in PHP:

```
$pathToAwesomeJs = ManifestAssets::getPath('awesome.js');
```

## Configuration

In your site config, you'll must configure a base path to your assets manifest file:

```yaml
ManifestAssets:
  base_path: themes/awesome/dist/js
```

By default it looks for a `manifest.json` file, but if you have a different name:

```yaml
ManifestAssets:
  base_path: themes/awesome/dist/js
  file_name: assets.json
```

## Requirements

- Silverstripe 3+

## Installation

The recommended way to install is through Composer:

```
composer require jacobbuck/silverstripe-manifestassets
```
