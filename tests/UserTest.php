<?php

class UserTest extends PHPUnit_Framework_TestCase
{
    private $CI;

    public function setUp()
    {
        $this->CI = &get_instance();
    }

    public function testGetAllPosts()
    {
        $this->CI->load->model('user_model');

        $users = $this->CI->user_model->getAll();
        $this->assertEquals(6, count($users));
    }
}