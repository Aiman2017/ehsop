<?php
defined('ROOTPATH') or die(http_response_code(404));

class User
{
    private array $error = [];

    public function signup($POST)
    {
        $data = [];
        $db = Database::getInstance();
        $data['name'] = trim($POST['name']);
        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);
        $retypePassword = trim($POST['retypePassword']);

        if ($data['email'] === '') {
            $this->error['validEmail'] = 'The field should not be empty';
        } else {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->error['validEmail'] = 'Please insert a valid email';
            }
        }

        if (empty($data['name'])) {
            $this->error['validUsername'] = 'The field should not be empty';
        } else {
            if (!preg_match('/^[a-zA-Z ]+$/', $data['name'])) {
                $this->error['validUsername'] = 'The username should not contains any characters';
            }
        }

        //check the password
        if ($data['password'] === '') {
            $this->error['validPassword'] = 'The field should not be empty';
        } else {
            if (strlen($data['password']) < 4) {
                $this->error['validPassword'] = 'The password should be bigger and equal 4 characters';
            }
        }

        if ($data['password'] !== $retypePassword) {
            $this->error['retypePassword'] = 'The password is not match';
        } else {
            if ($retypePassword === '') {
                $this->error['retypePassword'] = 'The field should not be empty';

            }
        }
        //check if email already exists
        $sql = "SELECT COUNT(*) as count FROM users  WHERE email = :email LIMIT 1";
        $arr['email'] = $data['email'];
        $checkEmail = $db->read($sql, $arr);

        if ($checkEmail[0]['count']) {
            $this->error['checkEmail'] = 'That email is Already in use';
        }
        $data['url_address'] = $this->generateRandomString(60);

//        check for url_address
        $sql = "SELECT COUNT(*) as count FROM users WHERE url_address = :url_address LIMIT 1";
        $checkUrlAddress = $db->read($sql, ['url_address' => $data['url_address']]);
        if ($checkEmail[0]['count']) {
            $data['url_address'] = $this->generateRandomString(60);
        }

        //save to database when no errors
        if (empty($this->error)) {
            $data['rank'] = 'customer';
            $data['password'] = hash('sha1', $data['password']);
            $data['date'] = date("Y-m-d H:i:s");
            $query = "INSERT INTO users (name, email, password, rank,url_address, date) VALUES ( :name, :email, :password, :rank,:url_address, :date)";

            $result = $db->write($query, $data);
            if ($result) {
                redirect('login');
            }
        }
        $_SESSION['error'] = $this->error;
    }

    public function login($POST)
    {
        $data = [];
        $db = Database::getInstance();
        $data['email'] = trim($POST['email']);
        $data['password'] = trim($POST['password']);
        if ($data['email'] === '') {
            $this->error['validEmail'] = 'The field should not be empty';
        } else {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->error['validEmail'] = 'Please insert a valid email';
            }
        }
        //check the password
        if ($data['password'] === '') {
            $this->error['validPassword'] = 'The field should not be empty';
        }
        //save to database when no errors
        if (empty($this->error)) {
            //confirm
            $data['password'] = hash('sha1', $data['password']);
            $query = "SELECT * FROM users WHERE email = :email && password = :password LIMIT 1";
            $result = $db->read($query, $data);
            if (is_array($result)) {
                if ($result) {
                    $_SESSION['url_address'] = $result[0]['url_address'];
                    redirect('home');
                } else {
                    $this->error['err'] = 'Wrong email or Password';
                }
            }
        }
        $_SESSION['error'] = $this->error;
    }

    public function getUser($urlAddress)
    {

    }

    /**
     * @param $length
     * @return string
     */
    private function generateRandomString($length): string
    {
        $array = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $text = '';
        $length = rand(4, $length);
        for ($i = 0; $i < $length; $i++) {
            $random = rand(0, 61);
            $text .= $array[$random];
        }
        return $text;
    }

    public function checkLogin($redirect = false, $allowed = [])
    {
        $db = Database::getInstance();
        //if something in admin controller, if he is an admin, he will redirect to admin page
        if (count($allowed) > 0) {
            $data['url'] = $_SESSION['url_address'];
            $query = "SELECT rank, name from users WHERE url_address = :url LIMIT 1";
            $result = $db->read($query, $data);
            if (is_array($result)) {
                $result = $result[0];
                //if the user is an admin, he will access to the admin page
                if (in_array($result['rank'], $allowed)) {
                    return $result;
                }
                //if user wants to access to the admin page, and he is not an admin the page will redirect to the home page
                redirect('');
            }
        }else {
            // if user is logged in, the user will get his info from database
            if (isset($_SESSION['url_address'])) {
                $data = false;
                $data = ['url' => $_SESSION['url_address']];
                $query = "SELECT * FROM users WHERE url_address = :url LIMIT 1";
                $result = $db->read($query, $data);
                if (is_array($result)) {
                    return $result[0];
                }
            }
            // if the user is not logged in(false), and wants to access the page cart or checkout, he will redirect to login page
            if ($redirect) {
                redirect('login');
            }
        }
        return false;
    }

    public function logout()
    {
        if (isset($_SESSION['url_address'])) {
            unset($_SESSION['url_address']);
        }
        redirect('login');
    }
}