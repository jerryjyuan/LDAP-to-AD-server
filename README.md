#### LDAP_to_AD_server<br/>
#####Summary
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This code implement the process of LDAP to do connection, authentication, data search from an AD server by using php.
<br/>
#####Prerequisite
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Before doing this, you need to know some information list below:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;● AD Server's IP Address<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;● Structure of directory information tree(DIT) stored in the AD server<br/>
<br/>
#####Content
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The process can be summarized by the order:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;● Step1: ldap_connect()<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Creating the connection session to an AD server.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;● Step2: ldap_bind()<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Getting the authentication to access an AD server.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In other words, If you bind successfully, then you are authenticated to login into the AD server.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;After you login, you can search, update or display your search result(relies on your need).<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In the code, It will search and then display the user's info when they have successully login in.<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(The specification I have explained in the code by commemt)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;● Step3: ldap_close()<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unbinded and closed the connection session to an AD server.<br/>
<br/>
#####Output<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;After you have executed the code, the result will like this:<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hello! andy, login successful!<br/>
<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Below is your user Info：<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:Andy Chen<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:andychen0310@gmail.com<br/>
