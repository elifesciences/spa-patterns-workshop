SPA Conference session: Integrate Pattern Libraries for Fast UX Feedback
========================================================================

Requirements
------------

* [Vagrant](https://www.vagrantup.com/)

Getting started
---------------

Execute `vagrant up`.

The code is split into three parts:

* `application` contains a demo application using the patterns
* `patterns` contains a Pattern Lab, comprised of a few patterns
* `patterns-php` contains the implementation of these patterns in PHP

The pattern library can be viewed on your host http://localhost:8080/, and the application at http://localhost:8081 (the port mapping can be configured by creating a `vagrant.yaml` file (based on `vagrant.yaml.dist`) and restarting the VM).

For more information on the patterns part, see the readme file in `patterns/`.

