patterns-public-dir:
  file:
    - directory
    - name: /vagrant/patterns/public/

patterns-styleguide:
  cmd:
    - run
    - cwd: /vagrant/patterns
    - name: |
        cp --recursive ./core/styleguide ./public/
    - require:
      - file: patterns-public-dir

patterns-generate:
  cmd:
    - run
    - cwd: /vagrant/patterns
    - name: |
        php core/builder.php --generate
    - require:
      - pkg: php-cli
      - cmd: patterns-styleguide

patterns-nginx:
  file:
    - managed
    - name: /etc/nginx/sites-enabled/patterns.conf
    - source: salt://some-company/config/etc-nginx-sites-enabled-patterns.conf
    - require:
      - pkg: nginx
    - listen_in:
      - service: nginx
