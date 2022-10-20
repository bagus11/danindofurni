<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkSession();
    }

    public function index()
    {
        admin_template('admin/v_dashboard');
    }
}