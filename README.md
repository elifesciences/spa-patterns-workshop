SPA Conference session: Integrate Pattern Libraries for Fast UX Feedback
========================================================================

Requirements
------------

* [Vagrant](https://www.vagrantup.com/)

Getting started
---------------

Execute `vagrant up`.

The code is split into three parts:

* [`application`](application) contains a demo application using the patterns
* [`patterns`](patterns) contains a Pattern Lab, comprised of a few patterns
* [`patterns-php`](patterns-php) contains the implementation of these patterns in PHP

Each contains a README with relevant information.

The pattern library can be viewed on your host http://localhost:8080/, and the application at http://localhost:8081 (the port mapping can be configured by creating a `vagrant.yaml` file (based on [`vagrant.yaml.dist`](vagrant.yaml.dist)) and restarting the VM).
