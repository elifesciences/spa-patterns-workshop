#!/usr/bin/env bash
php ./core/builder.php -g
php -S localhost:8999 -t public/
