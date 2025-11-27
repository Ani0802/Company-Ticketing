<?php
session_start();
require('ticketconfig.php');

class ticketFront extends ticketconfig
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
        $u_email = $_POST['a_email'];
        $u_pass = $_POST['a_pass'];
        $u_pass = md5($u_pass);

        $this->query = "SELECT * FROM ticketraise_admin WHERE admin_email='{$u_email}'";
        $this->setter();

        $user_count = mysqli_num_rows($this->isqueryrun);

        if ($user_count > 0) {
            $row = mysqli_fetch_assoc($this->isqueryrun);
            if ($row['admin_password'] == $u_pass) {
                // session_start();
                $token = "TICKETRAISER" . $row['admin_email'];
                $login_token = md5($token);
                $login_time = $this->getCurrentTime();

                $this->query = "INSERT INTO ticketraise_admin_login_history (admin_username,logintoken, logintime) VALUES ('$u_email', '$login_token', '$login_time');";
                $this->setter();
                if ($this->isqueryrun) {
                    $_SESSION['admin_login_token'] = $login_token;
                    $_SESSION['admin_email'] = $u_email;
                    $_SESSION['admin_name'] = $row['admin_username'];
                    // echo "<script> alert('Login Sucessfull') </script> ";
                    // $_SESSION['message'] = ['type' => 'success', 'text' => 'User LoggedIn Successfully'];
                    echo "<script> window.location.replace('../home/index.php'); </script> ";
                    exit;
                } else {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'Login Failed'];
                    echo "<script> window.location.replace('../home/login.php'); </script> ";
                    exit;
                }
            } else {
                $_SESSION['message'] = ['type' => 'error', 'text' => 'Password is Incorrect'];
                echo "<script> window.location.replace('../home/login.php'); </script> ";
                exit;
            }
        } else {
            $_SESSION['message'] = ['type' => 'error', 'text' => 'User not found'];
            echo "<script> window.location.replace('../home/login.php'); </script> ";
            exit;
        }
    }

    function isloggedinuser()
    {
        $login_token = $_SESSION['admin_login_token'];
        $u_email = $_SESSION['admin_email'];

        $this->query = "SELECT * FROM ticketraise_admin_login_history WHERE admin_username='{$u_email}'";
        $this->setter();

        if ($this->isqueryrun) {
            $info = mysqli_fetch_assoc($this->isqueryrun);
            if ($info['logintoken'] == $login_token) {
                // echo $login_token."-->".$u_email;        
                // echo "<script> window.location.replace('../home/index.php'); </script> ";
            } else {
                session_destroy();
                echo "<script> window.location.replace('../home/login.php'); </script> ";
            }
        } else {
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

    function get_all_tickets() {
        $this->query = "SELECT * FROM tickets";
        $this->setter();

        $tickets = [];
        if ($this->isqueryrun) {
            while ($row = mysqli_fetch_assoc($this->isqueryrun)) {
                $tickets[] = $row;
            }
        }
        return $tickets;

    }

    function get_all_team_members() {
        $this->query = "SELECT * FROM ticket_support_team";
        $this->setter();

        $tickets = [];
        if ($this->isqueryrun) {
            while ($row = mysqli_fetch_assoc($this->isqueryrun)) {
                $tickets[] = $row;
            }
        }
        return $tickets;

    }
    function assign_member() {
        $ticket_id = $_POST['ticket_id'];
        $team_member = $_POST['team_member'];

        $this->query = "UPDATE tickets SET assign_to='$team_member', ticketStatus='In Progress' WHERE ticketID='$ticket_id'";
        $this->setter();

        if ($this->isqueryrun) {
            $_SESSION['message'] = ['type' => 'success', 'text' => 'Team Member Assigned Successfully'];
            echo "<script> window.location.replace('../home/index.php'); </script> ";
            exit;
        } else {
            $_SESSION['message'] = ['type' => 'error', 'text' => 'Failed to Assign Team Member'];
            echo "<script> window.location.replace('../home/index.php'); </script> ";
            exit;
        }
    }

    function update_ticket_status() {
        $ticket_id = $_POST['ticket_id'];
        $ticket_status = $_POST['ticket_status'];

        $this->query = "UPDATE tickets SET ticketStatus='$ticket_status' WHERE ticketID='$ticket_id'";
        $this->setter();

        if ($this->isqueryrun) {
            $_SESSION['message'] = ['type' => 'success', 'text' => 'Ticket Status Updated Successfully'];
            echo "<script> window.location.replace('../home/index.php'); </script> ";
            exit;
        } else {
            $_SESSION['message'] = ['type' => 'error', 'text' => 'Failed to Update Ticket Status'];
            echo "<script> window.location.replace('../home/index.php'); </script> ";
            exit;
        }
    }

    function get_ticket_status_counts() {
        $this->query = "SELECT ticketStatus, COUNT(*) as count FROM tickets GROUP BY ticketStatus";
        $this->setter();

        $status_counts = [];
        if ($this->isqueryrun) {
            while ($row = mysqli_fetch_assoc($this->isqueryrun)) {
                $status_counts[$row['ticketStatus']] = $row['count'];
            }
        }
        return $status_counts;
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






$ticketobj = new ticketFront();
