<?php
session_start();
require('ticketraiseconfig.php');
class ticketfront extends config
{
    private $isqueryrun, $query;

    public function setter()
    {
        $this->isqueryrun = mysqli_query($this->connect, $this->query);
    }

    function getCurrentTime()
    {
        date_default_timezone_set('Asia/Kolkata');
        $day = date('Y-m-d H:i:s');
        return $day;
    }

    function login_handle()
    {
        $u_email = $_POST['uemail'];
        $u_pass = $_POST['upass'];
        $u_pass = md5($u_pass);

        $this->query = "SELECT * FROM ticketraise_user WHERE Email='{$u_email}'";
        $this->setter();

        $user_count = mysqli_num_rows($this->isqueryrun);

        if ($user_count > 0) {
            $row = mysqli_fetch_assoc($this->isqueryrun);
            if ($row['Password'] == $u_pass) {
                $token = "TICKETRAISER" . $row['Name'];
                $login_token = md5($token);
                $ctime = $this->getCurrentTime();

                $this->query = "INSERT INTO ticketraise_user_login_history (useremail,logintoken,logintime) VALUES ('$u_email', '$login_token','$ctime');";
                $this->setter();
                if($this->isqueryrun)
                {
                    $_SESSION['admin_login_token'] = $login_token;
                    $_SESSION['user_email'] = $u_email;
                    $_SESSION['user_name'] = $row['Name'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_type'] = "User";
                    // echo "<script> alert('Login Sucessfull') </script> ";
                    echo "<script> window.location.replace('../home/index.php'); </script> ";
                }
                else
                {
                    echo "DB problem";
                    echo "<script> alert('Login Failed 1') </script> ";
                    echo "<script> window.location.replace('../home/login.php'); </script> ";
                }
            } else {
                echo "u_Pass Not Matched problem";
                echo "<script> alert('Login Failed 2 ') </script> ";
                echo "<script> window.location.replace('../home/login.php'); </script> ";
            }
        }
    }

    function isloggedinuser()
    {
        $login_token = $_SESSION['admin_login_token'];
        $u_email = $_SESSION['user_email'];

        $this->query = "SELECT * FROM ticketraise_user_login_history WHERE useremail='{$u_email}' order by id desc limit 1";
        $this->setter();

        if ($this->isqueryrun)
        {
            $info = mysqli_fetch_assoc($this->isqueryrun);
            if ($info['logintoken'] == $login_token)
            {
                // echo $login_token."-->".$u_email;        
                // echo "<script> window.location.replace('../home/index.php'); </script> ";
            } 
            else
            {
                session_destroy();
                echo "<script> window.location.replace('../home/login.php'); </script> ";
            }
        } 
        else
        {
            session_destroy();
            echo "<script> window.location.replace('../home/login.php'); </script> ";
        }
    }
    // encryption for id start
    function encrypt_id($id, $key = 'TICKETRAISER', $iv = 'TICKETRAISER')
    {
        $cipher = "AES-256-CBC";
        $iv = substr(hash('sha256', $iv), 0, 16); // Generate IV
        $key = hash('sha256', $key); // Hash the key
        return base64_encode(openssl_encrypt($id, $cipher, $key, 0, $iv));
    }
    // encryption for id end

    function decrypt_id($encrypted_id, $key = 'TICKETRAISER', $iv = 'TICKETRAISER')
    {
        $cipher = "AES-256-CBC";
        $iv = substr(hash('sha256', $iv), 0, 16);
        $key = hash('sha256', $key);
        return openssl_decrypt(base64_decode($encrypted_id), $cipher, $key, 0, $iv);
    }

    function register_user() {
        // Form Values
        $name = $_POST['uname'];
        $email = $_POST['uemail'];
        $password = md5($_POST['upass']);
        $createdDate = $this->getCurrentTime();

        // Insert into Database
        $this->query = "INSERT INTO ticketraise_user 
            (Name, Email, Password, CreatedDate) 
            VALUES 
            ('$name', '$email', '$password', '$createdDate')";
        
        $this->setter();

        if ($this->isqueryrun) {
            echo "<script> window.location.replace('../home/login.php'); </script>";
        } else {
            echo "<script> window.location.replace('../pages/register_user.php'); </script>";
        }
    }

    function create_ticket() {
    // Form Values
    $userid = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $category = $_POST['category'];
    $createdDate = $this->getCurrentTime();
    $updatedDate = $this->getCurrentTime();

    // File Upload Handling
    $uploadDir = '../assets/uploads/';
    $fileName = $_FILES['attachments']['name'];
    $tmpName = $_FILES['attachments']['tmp_name'];

    // If file is uploaded
    if (!empty($fileName)) {

        // Create UNIQUE file name to prevent overwriting
        $uniqueName = time() . '_' . basename($fileName);

        // Full path to save
        $targetFile = $uploadDir . $uniqueName;

        // Upload file to directory
        if (move_uploaded_file($tmpName, $targetFile)) {

            // Insert into Database
            $this->query = "INSERT INTO tickets 
                (user_id,ticketTitle, ticketDescription, ticketPriority, ticketCategory, imgFile, CreatedDate, UpdatedDate) 
                VALUES 
                ('$userid','$title', '$description', '$priority', '$category', '$uniqueName', '$createdDate', '$updatedDate')";
            
            $this->setter();

            if ($this->isqueryrun) {
                echo "<script> window.location.replace('../home/index.php'); </script>";
            } else {
                echo "<script> window.location.replace('../pages/create-ticket.php'); </script>";
            }

        } else {
            // Upload failed
            echo "<script>alert('Failed to upload file!'); window.location.replace('../pages/create-ticket.php'); </script>";
        }

    } 
    else {
        // No file uploaded – insert NULL image
        $this->query = "INSERT INTO tickets 
            (ticketTitle, ticketDescription, ticketPriority, ticketCategory, imgFile, CreatedDate, UpdatedDate) 
            VALUES 
            ('$title', '$description', '$priority', '$category', NULL, '$createdDate', '$updatedDate')";

        $this->setter();

        if ($this->isqueryrun) {
            echo "<script> window.location.replace('../home/index.php'); </script>";
        } else {
            echo "<script> window.location.replace('../pages/create-ticket.php'); </script>";
        }
    }
}

    function get_all_tickets($id) {
        $this->query = "SELECT * FROM tickets where user_id = '$id'";
        $this->setter();

        $tickets = [];
        if ($this->isqueryrun) {
            while ($row = mysqli_fetch_assoc($this->isqueryrun)) {
                $tickets[] = $row;
            }
        }
        return $tickets;

    }

    function get_ticket_details($ticket_id){
        $this->query = "SELECT * FROM tickets JOIN ticket_detail ON tickets.ticketID = ticket_detail.ticket_id JOIN ticket_support_team ON ticket_detail.team_id = ticket_support_team.team_id WHERE tickets.ticketID = '$ticket_id'";
        $this->setter();
        if ($this->isqueryrun) {
            return mysqli_fetch_assoc($this->isqueryrun);
        } else {
            return null;
        }
        return $ticket_details;
    }
     function get_Open_ticket($ticket_id){
        $this->query = "SELECT * FROM tickets WHERE ticketID = '$ticket_id'";
        $this->setter();
        if ($this->isqueryrun) {
            return mysqli_fetch_assoc($this->isqueryrun);
        } else {
            return null;
        }
        return $ticket_details;
    }



    

}


$ticketobj = new ticketfront();