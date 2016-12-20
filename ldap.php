<!--Implementing LDAP to link to an AD server by using php.-->
<?php
if(isset($_POST['account']) && isset($_POST['password']) && !empty($_POST['account']) && !empty($_POST['password']))
{
	/**
	Get login account and password typed by user
	*/
	$account = $_POST['account'];
	$password = $_POST['password'];
	set_time_limit(30);  //Set the maximum execution time
	/**
	Config connection information.
	*/ 
	$ad_server = '';  	//Type the domain name or ip address of AD server.
	$port = '389';  	//Default port to connection an AD server.
	$authentication_tree = "";  //Type a tree path which will be regarded as a path to do authentication. ex:CN=$account,OU=OUName2,OU=OUName1,DC=AU,DC=COM,DC=TW
	$search_base_tree = "";  //Type a tree path which will be regarded as a start point to do search. ex:OU=OUName2,OU=OUName1,DC=AU,DC=COM,DC=TW
	/**
	Connect to AD server. 
	*/
	$ldap_conn = ldap_connect($ad_server, $port) or die("Failed to connect the AD server !");  //Open the session.
	ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0);
	
	if($ldap_conn) 
	{	
		/**
		Using function ldap_bind() to get the authentication of access right.
		*/
		$ldapbind = ldap_bind($ldap_conn, $authentication_tree, $password) or die ("Error trying to bind: ".ldap_error($ldap_conn));
		if ($ldapbind) 
		{
			//Login successful(LDAP bind successful)	
			echo "Hello! $account, login successful!";
			echo "<br/><br/>";
			
			//Then you can search, update or display the result. 
			//Here we fetch the user's basic info and display the result 
			$attributes = array("name", "sn", "mail");  //Speficy the needed attributes. 
			$result = ldap_search($ldap_conn, $search_base_tree, "(cn=$account)", $attributes);  //The fourth parameter is Optional. But if you have clearly known which attributes you are needed, Specify it will make the search more faster. Change the third parameter to the filter condition you are actually needed. Here gives you an example: if you want to search all persons under the $search_base_tree, the filter condition should be replaced by the string "(&(objectCategory=person)(cn=*))",
			$data = ldap_get_entries($ldap_conn, $result);			
			//Get the attribute value you want. Here is the example to fetch the username and email address
			//Note:The attribute name must be lower-case type, so if an attribute named Mail, you need to use it's lower-case name(mail) in the program.
			$data_count = ldap_count_entries($ldap_conn, $result);		//Get the data count of your search result
			if($data_count > 0)
			{
				echo "Below is your user Info：<br/>";			
				echo "Name:".$data[0]["name"][0].'<br/>';
				echo "Email:".$data[0]["mail"][0].'<br/>';
			}
		} 
		else 
		{
			//login failed.(LDAP bind failed)  
			echo "Login failed! Please try again.";  
		?>
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
			<label for="account">Account: </label><input id="account" type="text" name="account" /><br/> 
			<label for="password">Password: </label><input id="password" type="password" name="password" /><br/>
			<input type="submit" name="login_btn" value="login" />
			</form>
		<?php
		}
	}
	ldap_close($ldap_conn);
}
else
{
	/*Show login form.*/
?>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <label for="account">Account: </label><input id="account" type="text" name="account" /><br/><br/>
    <label for="password">Password: </label><input id="password" type="password" name="password" /><br/><br/>
    <input type="submit" name="login_btn" value="login" />
	</form>
<?php
}
?>
