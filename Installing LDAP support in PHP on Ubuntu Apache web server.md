### Installing LDAP Package on Ubuntu Apache Web Server<br/>
<hr/>
####Summary<br/>
LDAP support in PHP is not enabled by default. To enable LDAP support on an Ubuntu Apache web server we need to install php5-ldap package.
<br/>

####Version Info.<br/>
● Ubuntu Version: 14.04.2<br/>

####Setting Step<br/>
Type the list command below at the terminal prompt.<br/>
<br/>
1.Install php5-ldap package<br/>
```
apt-get update
sudo apt-get install php5-ldap
```
2.Restart Apache service<br/>
```
sudo service apache2 restart
```
