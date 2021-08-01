<div class="container">

  <div class="row">
    <div class="col-md-3">
      <h5><strong>Modul Pelajaran</strong></h5>
      <div class="overflow-auto" style="height: 600px;">
        <ul class=" list-group">
          <?php for ($i = 0; $i < 20; $i++) { ?>
            <li class="list-group-item"> <a href=""><i class="fa fa-check text-info"></i> Cras justo odio</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>

    <div class="col-md-9 card">
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto totam provident officiis cum sed non ea veritatis nam repudiandae voluptatibus at tenetur magnam corporis esse eos, est similique sapiente! Iste!</p>
      <pre style="height: 200px; overflow: auto; background-color: #f0f0f0;">
        <code>
           public function index()
    {
        $valid = $this->form_validation;

        $valid->set_rules(
            'email',
            'Email',
            'required',
            array('required' => '%s harus diisi')
        );
        $valid->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            array(
                'required'     => 'Password harus diisi',
                'min_length'  => 'Password minimal 6 karakter'
            )
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'title'     => 'Login Admin Ananda Private',
                'content'   => 'admin/auth/content/'
            );
            $this->load->view('admin/auth/login_admin', $data);
        } else {
            $i          = $this->input;
            $email      = $i->post('email');
            $password   = $i->post('password');
            $cek_login  = $this->Crud_model->login($email, $password);
            //print_r($email); die;

            if (!empty($cek_login) == 1) {
                $s = $this->session;
                $s->set_userdata('id_user', $cek_login->id_user);
                $s->set_userdata('email', $cek_login->email);
                $s->set_userdata('nama_user', $cek_login->nama_user);
                $s->set_userdata('is_active', $cek_login->is_active);
                $s->set_userdata('role', $cek_login->role);

                redirect(base_url('admin/dashboard'), 'refresh');
            } else {
                $data = array(
                    'title'     => 'Login Admin Ananda Private',
                    'error'     => 'Email atau password salah',
                    'content'   => 'admin/auth/content/'
                );
                $this->load->view('admin/auth/login_admin', $data);
            }
        }
    }

        </code>
      </pre>


      <div class="btn-group" role="group" aria-label="Basic example">
        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i></button>
        <button class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>
      </div>


    </div>
  </div>
</div>