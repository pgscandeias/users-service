#!/bin/bash

# Filebeat
curl -XPUT 'http://elk:9200/_template/filebeat?pretty' -d@/etc/filebeat/filebeat.template.json
/etc/init.d/filebeat start

# webserver
service php5-fpm start
nginx

# logs to stdout
tail \
    -f /var/log/nginx/access.log \
    -f /var/log/nginx/error.log \
    -f /server/http/logs/app.log
