php-fpm:
  pkg:
    - installed
    - require:
      - pkg: php-cli
  file:
    - managed
    - name: /etc/php/7.0/fpm/pool.d/www.conf
    - source: salt://php/config/etc-php-7.0-fpm-pool.d-www.conf
    - listen_in:
      - service: php-fpm
    - require:
      - pkg: php-fpm
  service:
    - running
    - name: php7.0-fpm
