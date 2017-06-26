patterns-php
============

This library implements the [patterns](../patterns) in PHP.

Updating/adding patterns
------------------------

Run [`bin/update`](bin/update). This will read the pattern library, and find all of the templates, schemas, and assets. They will be placed in the [`resources`](resources) directory.

The PHP code is inside [`src`](src). The patterns store their variables as `private` properties and use the [`ArrayAccessFromProperties`](src/ArrayAccessFromProperties.php) and [`ArrayFromProperties`](src/ArrayFromProperties.php) traits to make them accessible (and read-only).

For the tests (including schema validation), run `vendor/bin/phpunit`.
