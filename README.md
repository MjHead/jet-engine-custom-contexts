## Description
Plugin allows to set current post term of selected taxonomy as context for current dynamic widget or tag.
Use case - when you need to show current category thumbnail and link (or any other term data) on the single post page or in the listing item.

## Config example
```php
add_action( 'jet-engine-custom-context', function( $config ) {
	$config->add_tax( 'taxonomy-slug' );
} );
```

## How to use
- Download, install and activate plugin;
- Add configuration code (see example above) into the end of **functions.php** file of your active theme.
- Set required taxonomy as Context for JetEngine dynamic widgets or dynamic tags.
