<?php defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Controller
{
    protected $m_home;

    public function __construct()
    {
        parent::__construct();
        $this->m_home = $this->load->model("m_home");
    }

    public function index()
    {
        $data['pegawai'] = $this->m_home->all();
        //print("<pre>" . print_r($result, true) . "</pre>");
        $this->load->view("home/home_index", $data);
    }

    public function add()
    {
        $this->load->view("home/home_form");
    }

    public function tambah()
    {
        $data = [
            ":id" => uniqid(),
            ":niy" => "1555202037",
            ":nama" => [
                "value" => "Malik",
                "type" => PDO::PARAM_STR,
            ],
            ":email" => "malik@mail.com",
        ];

        $result = $this->m_home->insert($data)->rowCount();
        print("<pre>" . print_r($result, true) . "</pre>");
    }

    public function login()
    {
        @session_start();
        $_SESSION["user_login"] = [
            "logged_in" => true,
            "session_id" => "fd67ffs67s",
            "role" => "admin",
        ];
    }

    public function logout()
    {
        @session_start();
        if (isset($_SESSION["user_login"])) {
            session_unset();
            session_destroy();
        }
    }
}
