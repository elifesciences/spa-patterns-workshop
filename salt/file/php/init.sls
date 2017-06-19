php-cli:
  pkg:
    - installed

php-zip:
  pkg:
    - installed
    - require:
      - pkg: php-cli
