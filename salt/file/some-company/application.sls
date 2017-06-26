application-install:
  composer:
    - installed
    - user: vagrant
    - name: /vagrant/application
    - composer_home: /home/vagrant/.composer
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
