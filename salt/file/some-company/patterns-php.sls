patterns-php-install:
  composer:
    - installed
    - user: vagrant
    - name: /vagrant/patterns-php
    - composer_home: /home/vagrant/.composer
    - require:
      - composer
