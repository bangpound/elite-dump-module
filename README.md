# elite-dump-module

Use Symfony's var dumper component in Twig and elsewhere for Drupal 8.

Installation
------------

In composer.json:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/bangpound/elite-dump-module.git"
        }
    ],
    "require-dev": {
        "drupal/elite_dump": "^1.0",
    }
}
```

Usage
-----

In Twig, your `{{ dump() }}` output will be rendered through Symfony's Var Dumper.

Elsewhere, you can just use `dump($somevar)` in your PHP to see its contents.
