Samurai-Dojo
============

Samurai-Dojo is a set of vulnerable web applications created by and for the Samurai security testing distributions like SamuraiSTFU and SamuraiWTF.  These vulnerabile applications include:

  - Dojo Basic:  A simple PHP app that can be used for demos and exercises
  - Dojo Scavenger:  A student CTF-like challenge to test penesting skills
  - Dojo Control:  An application to simulate a HMI for a control system

Each app is located in its respective folder, than can be moved the the appropriate location for web root on your server.  Sample apache configuration files (needed at least for scavenger's challenge) are also provided and need to be moved to the /etc/apache2/sites-available/ folder on Debian/Ubuntu or integrated in your apache configuration file on other distributions.
