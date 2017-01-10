<?php

class Gpis_Admin
{

    /**
     * Store the sanitized and slash escaped value of post variables
     * @var array
     */
    var $post = array();

    /**
     * Stores the sanitized and decoded value of get variables
     * @var array
     */
    var $get = array();

    /**
     * The constructor function of admin class
     * We do just the session start
     * It is necessary to start the session before actually storing any value
     * to the super global $_SESSION variable
     */
    public function __construct()
    {
        session_start();
        //initialize the post variable
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->post = $_POST;
        }
        //initialize the get variable
        $this->get = $_GET;
    }

    /**
     * Sample function to return the nicename of currently logged in admin
     * @global ezSQL_mysql $db
     * @return string The nice name of the user
     */
    public function getUserName()
    {
        return isset($_SESSION['login_user']) ? $_SESSION['login_user'] : '';
    }

    /**
     * Checks whether the user is authenticated
     * to access the admin page or not.
     *
     * Redirects to the login.php page, if not authenticates
     * otherwise continues to the page
     *
     * @access public
     * @return void
     */
    public function _authenticate()
    {
        //first check whether session is set or not
        if (!isset($_SESSION['login_user'])) {
            header("location: login.php");
            die();
        }
        return true;
    }

    public function isAllowed()
    {

        return isset($_SESSION['login_user']);
    }

    /**
     * Check for login in the action file
     */
    public function loginAction()
    {

        //insufficient data provided
        if (!isset($this->post['username']) || $this->post['username'] == '' || !isset($this->post['password']) || $this->post['password'] == '') {
            header("location: login.php");
        }

        //get the username and password
        $username = $this->post['username'];
        $password = md5($this->post['password']);

        //check the database for username
        if ($this->_check_db($username, $password)) {
            //ready to login
            $_SESSION['login_user'] = $username;
            header("location: index.php");
        } else {
            header("location: login.php");
        }

        die();
    }


    /**
     * Check the database for login user
     * Get the password for the user
     * compare md5 hash over sha1
     * @param string $username Raw username
     * @param string $password expected to be md5 over sha1
     * @return bool TRUE on success FALSE otherwise
     */
    private function _check_db($username, $password)
    {
        $dbAdapter = new Gpis_Lib_Db_Adapter();
        $stmt = $dbAdapter->getConnection()->prepare("SELECT * FROM admin_login where password= :password AND username= :username");
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
