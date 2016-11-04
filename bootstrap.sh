#!/usr/bin/env bash
#
# Vagrant installation
#

apt-get update
apt-get install -y apache2 libapache2-mod-php5 php5-curl php5-gd
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password samurai'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password samurai'
sudo apt-get -y install mysql-server libapache2-mod-auth-mysql php5-mysql

a2enmod ssl
a2enmod headers

cp /usr/share/samurai-dojo/dojo-basic /etc/apache2/sites-available/
cp /usr/share/samurai-dojo/dojo-scavenger /etc/apache2/sites-available/
sed -i -e 's/127.42.84.1/*/g' /etc/apache2/sites-available/dojo-basic
sed -i -e 's/ServerAdmin/ServerName dojo-basic\n\tServerAdmin/g' /etc/apache2/sites-available/dojo-basic
sed -i -e 's/127.42.84.4/*/g' /etc/apache2/sites-available/dojo-scavenger
sed -i -e 's/ServerAdmin/ServerName dojo-scavenger\n\tServerAdmin/g' /etc/apache2/sites-available/dojo-scavenger

cd /usr/share/samurai-dojo/basic
php reset-db.php
mysqladmin -u root -psamurai create samurai_dojo_scavenger
mysql -u root -psamurai samurai_dojo_scavenger < /usr/share/samurai-dojo/scavenger/scavenger.sql

a2dissite default
a2ensite dojo-basic
a2ensite dojo-scavenger

rm /etc/apache2/sites-available/default

service apache2 restart
