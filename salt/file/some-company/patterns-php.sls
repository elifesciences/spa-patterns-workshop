patterns-php-install:
  composer:
    - installed
    - user: ubuntu
    - name: /vagrant/patterns-php
    - composer_home: /home/ubuntu/.composer
    - require:
      - composer
