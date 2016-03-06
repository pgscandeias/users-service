FROM quay.io/hellofresh/php56

#
# php-mongo
#

RUN \
    apt-get update && \
    apt-get install -y \
        curl \
        php5-mongo


#
# filebeat
#

# Install
RUN curl -L -O https://download.elastic.co/beats/filebeat/filebeat_1.0.1_amd64.deb \
    && dpkg -i filebeat_1.0.1_amd64.deb \
    && rm filebeat_1.0.1_amd64.deb

# config file
ADD ./docker/filebeat.yml /etc/filebeat/filebeat.yml

# CA cert
RUN mkdir -p /etc/pki/tls/certs
ADD ./docker/logstash-beats.crt /etc/pki/tls/certs/logstash-beats.crt

WORKDIR /server/http

#
# Start the thing up
#
ADD ./docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh
CMD [ "/usr/local/bin/start.sh" ]
