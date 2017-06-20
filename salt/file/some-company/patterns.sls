patterns-generate:
  cmd:
    - run
    - cwd: /vagrant/patterns
    - name: |
        php core/builder.php --generate
    - require:
      - pkg: php-cli

patterns-nginx:
  file:
    - managed
    - name: /etc/nginx/sites-enabled/patterns.conf
    - source: salt://some-company/config/etc-nginx-sites-enabled-patterns.conf
    - require:
      - pkg: nginx
    - listen_in:
      - service: nginx
