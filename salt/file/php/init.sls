php-cli:
  pkg:
    - installed

php-dom:
  pkg:
    - installed
    - require:
      - pkg: php-cli

php-mbstring:
  pkg:
    - installed
    - require:
      - pkg: php-cli

php-zip:
  pkg:
    - installed
    - require:
      - pkg: php-cli
