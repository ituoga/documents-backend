#!/bin/bash

echo "###########"
sed -i "s/www\/html/www\/public/g" /etc/apache2/sites-enabled/000-default.conf
sed -i "s/upload_max_filesize.*/upload_max_filesize=500M/g" /usr/local/etc/php/php.ini
sed -i "s/post_max_size.*/post_max_size=500M/g" /usr/local/etc/php/php.ini
sed -i "s/memory_limit.*/memory_limit=500M/g" /usr/local/etc/php/php.ini
a2enmod remoteip
echo "RemoteIPInternalProxy 10.0.0.0/8" > /etc/apache2/mods-enabled/remote_ip.conf
echo "RemoteIPInternalProxy 172.0.0.0/8" > /etc/apache2/mods-enabled/remote_ip.conf
echo "RemoteIPHeader X-Real-IP" > /etc/apache2/mods-enabled/remote_ip.conf
echo "###########"
apache2ctl -D FOREGROUND
