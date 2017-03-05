#!/usr/bin/env bash
#
# Vagrant installation
#

apt-get update
apt-get install -y apache2 libapache2-mod-php php-curl php-gd
debconf-set-selections <<< 'mysql-server mysql-server/root_password password samurai'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password samurai'
apt-get install -y mysql-server
apt-get install -y libapache2-mod-auth-mysql

a2enmod ssl
a2enmod headers

cp /usr/share/samurai-dojo/dojo-basic.conf /etc/apache2/sites-available/
cp /usr/share/samurai-dojo/dojo-scavenger.conf /etc/apache2/sites-available/
sed -i -e 's/127.42.84.1/*/g' /etc/apache2/sites-available/dojo-basic.conf
sed -i -e 's/ServerAdmin/ServerName dojo-basic\n\tServerAdmin/g' /etc/apache2/sites-available/dojo-basic.conf
sed -i -e 's/127.42.84.4/*/g' /etc/apache2/sites-available/dojo-scavenger.conf
sed -i -e 's/ServerAdmin/ServerName dojo-scavenger\n\tServerAdmin/g' /etc/apache2/sites-available/dojo-scavenger.conf

cd /usr/share/samurai-dojo/basic
apt-get install -y php-mysql
php reset-db.php
mysqladmin -u root -psamurai create samurai_dojo_scavenger
mysql -u root -psamurai samurai_dojo_scavenger < /usr/share/samurai-dojo/scavenger/scavenger.sql

a2dissite 000-default.conf
a2ensite dojo-basic.conf
a2ensite dojo-scavenger.conf

rm /etc/apache2/sites-available/000-default.conf

service apache2 restart