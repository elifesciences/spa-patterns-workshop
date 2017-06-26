Application
===========

This is a basic [Silex](https://silex.sensiolabs.org/) application that uses the [patterns-php](../patterns-php) library.

The code is in [src/App.php](src/App.php). It starts with a basic usage of the Site Header pattern. The _page_-level templating is done with [Twig](https://twig.sensiolabs.org/) (rather that Mustache). These templates are inside [`views`](views) (note the use of the `render_pattern` function to render the Mustache Patterns from the Twig template).

When updating the patterns-php library, run `composer update some-company/patterns` here to see the changes pulled through.
