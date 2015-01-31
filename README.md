# LDAP_to_AD_server
Implementing LDAP to do authentication with AD server by using php.

》Summary
  This code implement the process of LDAP to do connection, authentication, data search from an AD server.

》Prerequisite
  Before doing this, you need to know some information list below:
  ● AD Server's IP Address
  ● Structure of directory information tree(DIT) stored in the AD server

》Content
  The process can be summarized by the order:
  ● step1: ldap_connect()<br/>
           Creating the connection session to an AD server.
  ● step2: ldap_bind()<br/>
           Getting the authentication to access an AD server. 
           In other words, If you bind successfully, then you are authenticated to login into the AD server.
           After you login, you can search, update or display your search result(relies on your need).
           In the code, It will search and then display the user's info when they have successully login in.
           (The specification I have explained in the code by commemt)
  ● step3: ldap_close()
           Unbinded and closed the connection session to an AD server.

》Output
  After you have executed the code, the result will like this:
  Hello! andy, login successful!

  Below is your user Info：
  Name:Andy Chen
  Email:andychen0310@gmail.com
