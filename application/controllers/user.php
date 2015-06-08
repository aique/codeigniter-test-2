<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('user_model');

        $this->output->enable_profiler(true); // ofrece información en pantalla sobre tiempos, consumo de memoria... etc
    }

    function all()
    {
        $this->load->library('pagination'); // librería para la paginación
        $this->load->library('table'); // librería para mostrar los resultados en tablas

        $config['base_url'] = '/user/all';
        $config['total_rows'] = $this->user_model->getNumAll();
        $config['per_page'] = 5;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';

        $this->pagination->initialize($config);

        $offset = $this->uri->segment(3); // se accede directamente al valor del tercer parámetro recibido por el controlador

        if(!$offset)
        {
            $offset = '0';
        }

        $data['users'] = $this->user_model->getAll($config['per_page'], $offset);

        $this->load->view('users/users', $data);
    }

    function detail($id)
    {
        if($id)
        {
            $data['user'] = $this->user_model->getUser($id);

            $this->load->view('users/detail', $data);
        }
        else
        {
            $this->all();
        }
    }

    function edit($id)
    {
        if($id)
        {
            $user = $this->user_model->getUser($id);

            if($user)
            {
                if($this->input->post())
                {
                    $this->load->library('form_validation');

                    $this->form_validation->set_rules('email', 'email', 'required|email');
                    $this->form_validation->set_rules('description', 'descripción', 'required');

                    $email = $this->input->post('email');
                    $description = $this->input->post('description');

                    if($this->form_validation->run())
                    {
                        $user->setEmail($email);
                        $user->setDescription($description);

                        $this->user_model->updateUser($id, $user);

                        $this->detail($id);
                    }
                    else
                    {
                        $data['user'] = $user;

                        $this->load->view('users/edit', $data);
                    }
                }
                else
                {
                    $data['user'] = $user;

                    $this->load->view('users/edit', $data);
                }
            }
            else
            {
                $this->all();
            }
        }
        else
        {
            $this->all();
        }
    }

    function create()
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'nombre', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|email');
            $this->form_validation->set_rules('description', 'descripción', 'required');

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $description = $this->input->post('description');

            $user = new User_Item();

            $user->setName($name);
            $user->setEmail($email);
            $user->setDescription($description);

            if($this->form_validation->run())
            {
                $userId = $this->user_model->addUser($user);

                $this->detail($userId);
            }
            else
            {
                $this->load->view('users/create');
            }
        }
        else
        {
            $this->load->view('users/create');
        }
    }

    function delete($id)
    {
        if($id)
        {
            $this->user_model->deleteUser($id);
        }

        $this->all();
    }
}