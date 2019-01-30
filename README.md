Samurai-Dojo
============

Samurai-Dojo is a set of vulnerable web applications created by and for the Samurai security training and testing distributions like SamuraiSTFU and SamuraiWTF.  These vulnerabile applications include:

  - Dojo Basic:  A simple PHP app that can be used for demos and exercises
  - Dojo Scavenger:  A student CTF-like challenge to test penesting skills

Each app is located in its respective folder, than can be moved the the appropriate location for web root on your server.  Sample apache configuration files (needed at least for scavenger's challenge) are also provided and need to be moved to the /etc/apache2/sites-available/ folder on Debian/Ubuntu or integrated in your apache configuration file on other distributions.

### Vagrant
For ease of development a Vagrant configuration are available.  The Vagrant configuration and deployment are stored in the following files:
* `Vagrantfile` : contains a standard Vagrant config (no plugins required)
* `bootstrap.sh` : contains the installation script to get Samurai-Dojo up and running on Apache

The one configuration item that is necessary is on your local host (i.e. not the Vagrant guest) add the following mappings to your hosts file.

   ```
   127.0.0.1       dojo-basic
   127.0.0.1       dojo-scavenger
   ```
