application-install:
  composer:
    - installed
    - user: ubuntu
    - name: /vagrant/application
    - composer_home: /home/ubuntu/.composer
    - require:
      - composer

application-nginx:
  file:
    - managed
    - name: /etc/nginx/sites-enabled/application.conf
    - source: salt://some-company/config/etc-nginx-sites-enabled-application.conf
    - require:
      - pkg: nginx
    - listen_in:
      - service: nginx
