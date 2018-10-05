<?php
include "db_config.php";
// include 'Classes/Session.php';


	class User{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}

		/*** for registration process ***/
		public function reg_user($name,$username,$password,$email){

			$password = md5($password);
			$sql="SELECT * FROM users WHERE uname='$username' OR uemail='$email'";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO users SET uname='$username', upass='$password', fullname='$name', uemail='$email'";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}

		/*** for login process ***/
		public function check_login($username, $password){

      $username = mysqli_real_escape_string($this->db, $username);
      $password = mysqli_real_escape_string($this->db, $password);
        	// $password = md5($password);
			$query = "SELECT * from users Join branch ON branch.branch_id = Users.branch_id Join company ON company.company_id = branch.company_id WHERE username='$username' and password='$password'";

			//checking if the username is available in the table
        	$result = mysqli_query($this->db, $query);
        	$user_data = mysqli_fetch_array($result);

        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            // this login var will use for the session thing

              // $_SESSION['login'] = true;
              // $_SESSION['username'] = $user_data['username'];
              self::set("login", true);
              self::set("username", $user_data['username']);
              self::set("user_id", $user_data['id']);
              self::set("role_id", $user_data['role_id']);
              self::set("company_name", $user_data['company_name']);
							self::set("company_id", $user_data['company_id']);
							self::set("branch_id", $user_data['branch_id']);
              self::set("branch_name", $user_data['branch_name']);

	            return true;
	        }
	        else{
			    return false;
			}
    	}

    	/*** for showing the username or fullname ***/
    	public function get_fullname($uid){
    		$sql3="SELECT fullname FROM users WHERE uid = $uid";
	        $result = mysqli_query($this->db,$sql3);
	        $user_data = mysqli_fetch_array($result);
	        echo $user_data['fullname'];
    	}
      //--starting for checkSession------zoriulsan

      public static function init(){
        session_start();
      }

      public static function set($key, $val){
        $_SESSION[$key] = $val;


      }


      public static function get($key){

        if (isset($_SESSION[$key])) {
          // code...
          return $_SESSION[$key];

        }else{
          return false;
        }
      }

      public static function checkSession(){
          self::init();
          if (self::get("login")==false) {
            self::destroy();
            header("Location: ../login.php");
          }
      }
      public static function checkLogin(){
          self::init();
          if (self::get("login")==true) {
            header("Location: ../dashboard/index.php");
          }
      }
      public static function destroy(){
        session_destroy("login");
        header("Location: login.php");
      }

    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}
?>
