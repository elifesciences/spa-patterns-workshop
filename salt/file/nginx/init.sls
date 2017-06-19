nginx:
  pkg:
    - installed
  file:
    - managed
    - name: /etc/nginx/nginx.conf
    - source: salt://nginx/config/etc-nginx-nginx.conf
    - listen_in:
      - service: nginx
    - require:
      - pkg: nginx
  service:
    - running
    - require:
      - file: nginx

nginx-default-vhost:
  file:
    - absent
    - name: /etc/nginx/sites-available/default
    - listen_in:
      - service: nginx
    - require:
      - pkg: nginx
