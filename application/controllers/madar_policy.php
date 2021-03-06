<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class madar_policy extends CI_Controller {

    private $data;

    public function __construct() {
      parent::__construct();
      $this->load->library('Tank_auth');
      if (!$this->tank_auth->is_logged_in()) {
        $redirect_path = '/'.$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
        $this->session->set_flashdata('redirect', $redirect_path);
        redirect('/auth/login');
      } else {
        $this->data['user_id'] = $this->tank_auth->get_user_id();
        $this->data['username'] = $this->tank_auth->get_username();
        $this->data['is_admin'] = $this->tank_auth->is_admin();
        $this->data['owning_company'] = $this->tank_auth->is_owning_company();
        $this->data['department_id'] = $this->tank_auth->get_department();
        $this->data['role_id'] = $this->tank_auth->get_role();     
        $this->data['is_corp'] = $this->tank_auth->is_corp();
        $this->data['is_rater'] = $this->tank_auth->is_rater();
        $this->data['is_cairo'] = $this->tank_auth->is_cairo();
        $this->data['is_sky'] = $this->tank_auth->is_sky();
        $this->data['isnt_UK'] = $this->tank_auth->isnt_UK();
        $this->data['isnt_sky'] = $this->tank_auth->isnt_sky();
        $this->data['isnt_Cairo'] = $this->tank_auth->isnt_Cairo(); 
        $this->data['is_UK'] = $this->tank_auth->is_UK();
        $this->data['is_claim'] = $this->tank_auth->is_claim();
        $this->data['is_fc'] = $this->tank_auth->is_fc();
        $this->data['is_cluster'] = $this->tank_auth->is_cluster();
        $this->data['chairman'] = $this->tank_auth->is_chairman();
      }
      $this->data['menu']['active'] = "madars";
    }

    public function submit_department() {
      if ((isset($this->data['is_cairo']) && $this->data['is_cairo']) || (isset($this->data['is_sky']) && $this->data['is_sky']) || (isset($this->data['is_UK']) && $this->data['is_UK'])) {
        redirect('/unknown');
      }else{
        if ($this->input->post('submit')) {
          $this->load->library('form_validation');
          $this->load->library('email');
          if ($this->form_validation->run() == FALSE) {
            $this->load->model('madar_policy_model');
            $data = array(
              'name' => $this->input->post('name')
            );
            $dep_id = $this->madar_policy_model->create_department($data);
            if (!$dep_id) {
              die("ERROR");
            }
            redirect('/madar_policy/');
          }
        }
        try {
          $this->load->helper('form');
          $this->load->model('madar_policy_model');
          $this->load->view('madar_policy_add_new_department',$this->data);
        }
        catch( Exception $e) {
          show_error($e->getMessage()." _ ". $e->getTraceAsString());
        }
      }
    }

    public function submit_type() {
      if ((isset($this->data['is_cairo']) && $this->data['is_cairo']) || (isset($this->data['is_sky']) && $this->data['is_sky']) || (isset($this->data['is_UK']) && $this->data['is_UK'])) {
        redirect('/unknown');
      }else{
        if ($this->input->post('submit')) {
          $this->load->library('form_validation');
          $this->load->library('email');
          if ($this->form_validation->run() == FALSE) {
            $this->load->model('madar_policy_model');
            $data = array(
              'department_id' => $this->input->post('department_id'),
              'name' => $this->input->post('name')
            );
            $type_id = $this->madar_policy_model->create_type($data);
            if (!$type_id) {
              die("ERROR");
            }
            $this->data['core'] = $this->madar_policy_model->get_last_core();
            $dataes = array(
              'user_id' => $this->data['user_id'],
              'core_id' => $this->data['core']['id'],
              'type_id' => $type_id
            );
            $item_id = $this->madar_policy_model->create_item($dataes);
            if (!$item_id) {
              die("ERROR");
            }
            redirect('/madar_policy/');
          }
        }
        try {
          $this->load->helper('form');
          $this->load->model('madar_policy_model');
          $this->data['departments'] = $this->madar_policy_model->get_department();
          $this->load->view('madar_policy_add_new_type',$this->data);
        }
        catch( Exception $e) {
          show_error($e->getMessage()." _ ". $e->getTraceAsString());
        }
      }
    }

    public function submit() {
      if ((isset($this->data['is_cairo']) && $this->data['is_cairo']) || (isset($this->data['is_sky']) && $this->data['is_sky']) || (isset($this->data['is_UK']) && $this->data['is_UK'])) {
        redirect('/unknown');
      }else{
        if ($this->input->post('submit')) {
          $this->load->library('form_validation');
          $this->load->library('email');
          if ($this->form_validation->run() == FALSE) {
            $this->load->model('madar_policy_model');
            $data = array(
              'user_id' => $this->data['user_id']
            );
            $core_id = $this->madar_policy_model->create_core($data);
            if (!$core_id) {
              die("ERROR");
            }
            foreach ($this->input->post('items') as $item) {
              $item['user_id'] = $this->data['user_id'];   
              $item['core_id'] = $core_id;   
              $item_id = $this->madar_policy_model->create_item($item);
              if (!$item_id) {
                die("ERROR");
              }
            }
            $signatures = $this->madar_policy_model->policy_sign();
            $do_sign = $this->madar_policy_model->policy_do_sign($core_id);
            if ($do_sign == 0) {
              foreach ($signatures as $policy_signature) {
                $this->madar_policy_model->add_signature($core_id, $policy_signature['role'], $policy_signature['department'], $policy_signature['rank']);
              }
            }
            redirect('/madar_policy/policy_stage/'.$core_id);
          }
        }
        try {
          $this->load->helper('form');
          $this->load->model('madar_policy_model');
          $this->data['roles'] = $this->madar_policy_model->get_roles();
          $this->data['departments'] = $this->madar_policy_model->get_department();
          foreach ($this->data['departments'] as $key => $department) {
            $this->data['departments'][$key]['types'] = $this->madar_policy_model->get_types($this->data['departments'][$key]['id']);
          }
          $this->load->view('madar_policy_add_new',$this->data);
        }
        catch( Exception $e) {
          show_error($e->getMessage()." _ ". $e->getTraceAsString());
        }
      }
    }

    public function policy_stage($core_id) {
      $this->load->model('madar_policy_model');
      $this->load->model('users_model');
      $this->data['core'] = $this->madar_policy_model->get_core($core_id);
      if ($this->data['core']['state_id'] == 0) {
        $this->madar_policy_model->update_state($core_id, 1);
        redirect('/madar_policy/policy_stage/'.$core_id);
      }elseif ($this->data['core']['state_id'] == 3){
        $user = $this->users_model->get_user_by_id($this->data['core']['user_id'], TRUE);
        $queue = $this->reject_mail($user->fullname, $user->email, $core_id);
      }elseif ($this->data['core']['state_id'] != 2){
        $queue = $this->notify_signers($core_id);
        if (!$queue) {
          $this->madar_policy_model->update_state($core_id, 2);
          $user = $this->users_model->get_user_by_id($this->data['core']['user_id'], TRUE);
          $queue = $this->approvel_mail($user->fullname, $user->email, $core_id);
          redirect('/madar_policy/policy_stage/'.$core_id);
        }
      }
      redirect('/madar_policy/view/'.$core_id);
    }

    private function reject_mail($name, $email, $core_id) {
      $this->load->library('email');
      $this->load->helper('url');
      $core_url = base_url().'madar_policy/view/'.$core_id;
      $this->email->from('e-signature@sunrise-resorts.com');
      $this->email->to($email);
      $this->email->subject("Signature Policy No. #{$core_id}");
      $this->email->message("Dear {$name},
        <br/>
        <br/>
        Signature Policy No. #{$core_id} has been rejected, Please use the link below:
        <br/>
        <a href='{$core_url}' target='_blank'>{$core_url}</a>
        <br/>
      "); 
      $mail_result = $this->email->send();
    }

    private function notify_signers($core_id) {
      $notified = FALSE;
      $first = True;
      if ($first == True) {
        $this->signs_mail($core_id);
        $first = FALSE;
      }
      $signers = $this->get_signers($core_id);
      foreach ($signers as $signer) {
        if ($signer['rank'] >= 8) {
          if (isset($signer['queue'])) {
            $notified = TRUE;
            foreach ($signer['queue'] as $uid => $user) {
              $this->signatures_mail($signer['role'], $signer['department'], $user['name'], $user['mail'], $core_id);
            }
            break;
          }
        }
      }
      return $notified;
    }

    private function get_signers($core_id) {
      $this->load->model('madar_policy_model');
      $signatures = $this->madar_policy_model->get_by_verbal($core_id);
      return $this->roll_signers($signatures, $core_id);
    }

    private function roll_signers($signatures, $core_id) {
      $signers = array();
      $this->load->model('users_model');
      $this->load->model('madar_policy_model');
      foreach ($signatures as $signature) {
        $signers[$signature['id']] = array();
        $signers[$signature['id']]['role'] = $signature['role'];
        $signers[$signature['id']]['role_id'] = $signature['role_id'];
        $signers[$signature['id']]['department'] = $signature['department'];
        $signers[$signature['id']]['department_id'] = $signature['department_id'];
        $signers[$signature['id']]['rank'] = $signature['rank'];
        if ($signature['user_id']) {
          $signers[$signature['id']]['sign'] = array();
          $signers[$signature['id']]['sign']['id'] = $signature['user_id'];
          if ($signature['reject'] == 1) {
            $signers[$signature['id']]['sign']['reject'] = "reject";
            $this->madar_policy_model->update_state($core_id, 3);
          } 
          $user = $this->users_model->get_user_by_id($signature['user_id'], TRUE);
          $signers[$signature['id']]['sign']['name'] = $user->fullname;
          $signers[$signature['id']]['sign']['mail'] = $user->email;
          $signers[$signature['id']]['sign']['sign'] = $user->signature;
          $signers[$signature['id']]['sign']['timestamp'] = $signature['timestamp'];
        } else {
          $signers[$signature['id']]['queue'] = array();
          $users = $this->madar_policy_model->getby_role($signature['role_id'], $signature['department_id']);
          foreach ($users as $use) {
            $signers[$signature['id']]['queue'][$use['id']] = array();
            $signers[$signature['id']]['queue'][$use['id']]['name'] = $use['fullname'];
            $signers[$signature['id']]['queue'][$use['id']]['mail'] = $use['email'];
          }
        }
      }
      return $signers;
    }

    public function signs_mail($core_id) {
      $this->load->model('madar_policy_model');
      $this->load->model('users_model');
      $signes = $this->madar_policy_model->get_by_verbal($core_id);
      $users = array();
      //die(print_r($signes));
      foreach ($signes as $signe){
        if ($signe['rank'] < 8) {
          if (!$signe['user_id']) {
            $users = $this->madar_policy_model->getby_role($signe['role_id'], $signe['department_id']);
            foreach($users as $user){
              $name = $user['fullname'];
              $mail = $user['email'];
              $this->load->library('email');
              $this->load->helper('url');
              $core_url = base_url().'madar_policy/view/'.$core_id;
              $this->email->from('e-signature@sunrise-resorts.com');
              $this->email->to($mail);
              $this->email->subject("Signature Policy Form NO.#{$core_id}");
              $this->email->message("Signature Policy Form NO.#{$core_id}:
                <br/>
                Signature Policy Form No. #{$core_id} has been Created, Please use the link below:
                <a href='{$core_url}' target='_blank'>{$core_url}</a>
                <br/>
              "); 
              $mail_result = $this->email->send();
            }
          }
        }
      }
      //die(print_r($user['id']));
    }

    private function signatures_mail($role, $department, $name, $mail, $core_id) {
      $this->load->library('email');
      $this->load->helper('url');
      $core_url = base_url().'madar_policy/view/'.$core_id;
      $this->email->from('e-signature@sunrise-resorts.com');
      $this->email->to($mail);
      $this->email->subject("Signature Policy No. #{$core_id}");
      $this->email->message("Dear {$name},
        <br/>
        <br/>
        Signature Policy No. #{$core_id} requires your signature, Please use the link below:
        <br/>
        <a href='{$core_url}' target='_blank'>{$core_url}</a>
        <br/>
      "); 
      $mail_result = $this->email->send();
    }

    private function approvel_mail($name, $email, $core_id) {
      $this->load->library('email');
      $this->load->helper('url');
      $core_url = base_url().'madar_policy/view/'.$core_id;
      $this->email->from('e-signature@sunrise-resorts.com');
      $this->email->to($email);
      $this->email->subject("Signature Policy No. #{$core_id}");
      $this->email->message("Dear {$name},
        <br/>
        <br/>
        Signature Policy No. #{$core_id} has been approved, Please use the link below:
        <br/>
        <a href='{$core_url}' target='_blank'>{$core_url}</a>
        <br/>
      "); 
      $mail_result = $this->email->send();
    }

    public function view($core_id) {
      if ((isset($this->data['is_cairo']) && $this->data['is_cairo']) || (isset($this->data['is_sky']) && $this->data['is_sky']) || (isset($this->data['is_UK']) && $this->data['is_UK'])) {
        redirect('/unknown');
      }else{      
        $this->load->model('madar_policy_model');
        $this->data['core'] = $this->madar_policy_model->get_core($core_id);
        $this->data['departments'] = $this->madar_policy_model->get_department();
        foreach ($this->data['departments'] as $key => $department) {
          $this->data['departments'][$key]['types'] = $this->madar_policy_model->get_types($this->data['departments'][$key]['id']);
          foreach ($this->data['departments'][$key]['types'] as $keys => $type) {
            $this->data['departments'][$key]['types'][$keys]['policy'] = $this->madar_policy_model->get_policy($this->data['departments'][$key]['types'][$keys]['id'] , $core_id);
          }
        }
        $this->data['comments'] = $this->madar_policy_model->get_comment($core_id);
        //die(print_r($this->data['departments']));
        $this->data['signature_path'] = '/assets/uploads/signatures/';
        $this->data['signers'] = $this->get_signers($core_id);
        $editor = FALSE;
        $unsign_enable = FALSE;
        $madar = FALSE;
        foreach ($this->data['signers'] as $signer) {
          if (isset($signer['sign'])) {
            if ($signer['sign']['id'] == $this->data['user_id']) {
              $unsign_enable = TRUE;
            }
          }
        }
        if ($this->data['role_id'] == 2) {
          $editor = TRUE;
        }
        if ($this->data['role_id'] == 135) {
          $madar = TRUE;
        }
        $this->data['is_editor'] = ($editor || $this->data['is_admin'])? TRUE : FALSE;
        $this->data['madar_admin'] = ($madar || $this->data['is_admin'])? TRUE : FALSE;
        $this->data['unsign_enable'] = (($unsign_enable) || $this->data['is_admin'])? TRUE : FALSE;
        $this->load->view('madar_policy_view', $this->data);
      }
    }

    public function index() {
      if ((isset($this->data['is_cairo']) && $this->data['is_cairo']) || (isset($this->data['is_sky']) && $this->data['is_sky']) || (isset($this->data['is_UK']) && $this->data['is_UK'])) {
        redirect('/unknown');
      }else{      
        $this->load->model('madar_policy_model');
        $this->data['core'] = $this->madar_policy_model->get_last_core();
        $this->data['departments'] = $this->madar_policy_model->get_department();
        foreach ($this->data['departments'] as $key => $department) {
          $this->data['departments'][$key]['types'] = $this->madar_policy_model->get_types($this->data['departments'][$key]['id']);
          foreach ($this->data['departments'][$key]['types'] as $keys => $type) {
            $this->data['departments'][$key]['types'][$keys]['policy'] = $this->madar_policy_model->get_policy($this->data['departments'][$key]['types'][$keys]['id'] , $this->data['core']['id']);
          }
        }
        $this->data['comments'] = $this->madar_policy_model->get_comment($this->data['core']['id']);
        //die(print_r($this->data['departments']));
        $this->data['signature_path'] = '/assets/uploads/signatures/';
        $this->data['signers'] = $this->get_signers($this->data['core']['id']);
        $editor = FALSE;
        $unsign_enable = FALSE;
        foreach ($this->data['signers'] as $signer) {
          if (isset($signer['sign'])) {
            if ($signer['sign']['id'] == $this->data['user_id']) {
              $unsign_enable = TRUE;
            }
          }
        }
        $request = FALSE;
        $madar = FALSE;
        if ($this->data['role_id'] == 88 || $this->data['role_id'] == 96 || $this->data['role_id'] == 93 || $this->data['role_id'] == 94 || $this->data['role_id'] == 13 || $this->data['role_id'] == 12 || $this->data['role_id'] == 114 || $this->data['role_id'] == 81 || $this->data['role_id'] == 1 || $this->data['role_id'] == 2 || $this->data['user_id'] == 238) {
          $request = TRUE;
        }
        if ($this->data['role_id'] == 135) {
          $madar = TRUE;
        }
        $this->data['is_request'] = ($request || $this->data['is_admin'])? TRUE : FALSE;
        $this->data['madar_admin'] = ($madar || $this->data['is_admin'])? TRUE : FALSE;
        $this->data['unsign_enable'] = (($unsign_enable) || $this->data['is_admin'])? TRUE : FALSE;
        $this->load->view('madar_policy_index', $this->data);
      }
    }

    public function edit($core_id) {
      if ((isset($this->data['is_cairo']) && $this->data['is_cairo']) || (isset($this->data['is_sky']) && $this->data['is_sky']) || (isset($this->data['is_UK']) && $this->data['is_UK'])) {
        redirect('/unknown');
      }else{
        if ($this->input->post('submit')) {
          $this->load->library('form_validation');
          $this->load->library('email');
          if ($this->form_validation->run() == FALSE) {
            $this->load->model('madar_policy_model');
            $data = array(
              'user_id' => $this->data['user_id']
            );
            $this->madar_policy_model->update_core($core_id, $data);
            foreach ($this->input->post('items') as $item) {
              $item['user_id'] = $this->data['user_id'];   
              $item['core_id'] = $core_id;   
              $this->madar_policy_model->update_item($item['id'], $core_id, $item);
            }
            $signatures = $this->madar_policy_model->policy_sign();
            $this->madar_policy_model->policy_sign_reset($core_id);
            $do_sign = $this->madar_policy_model->policy_do_sign($core_id);
            if ($do_sign == 0) {
              foreach ($signatures as $policy_signature) {
                $this->madar_policy_model->add_signature($core_id, $policy_signature['role'], $policy_signature['department'], $policy_signature['rank']);
              }
            }
            redirect('/madar_policy/policy_stage/'.$core_id);
          }
        }
        try {
          $this->load->helper('form');
          $this->load->model('madar_policy_model');
          $this->data['core'] = $this->madar_policy_model->get_core($core_id);
          $this->data['roles'] = $this->madar_policy_model->get_roles();
          $this->data['departments'] = $this->madar_policy_model->get_department();
          foreach ($this->data['departments'] as $key => $department) {
            $this->data['departments'][$key]['types'] = $this->madar_policy_model->get_types($this->data['departments'][$key]['id']);
            foreach ($this->data['departments'][$key]['types'] as $keys => $type) {
              $this->data['departments'][$key]['types'][$keys]['policy'] = $this->madar_policy_model->get_policy($this->data['departments'][$key]['types'][$keys]['id'] , $core_id);
            }
          }
          $this->load->view('madar_policy_edit',$this->data);
        }
        catch( Exception $e) {
          show_error($e->getMessage()." _ ". $e->getTraceAsString());
        }
      }
    }

    public function mail_me($core_id) {
      $this->load->model('users_model');
      $user = $this->users_model->get_user_by_id($this->data['user_id'], TRUE);
      $this->load->library('email');
      $this->load->helper('url');
      $core_url = base_url().'madar_policy/view/'.$core_id;
      $this->email->from('e-signature@sunrise-resorts.com');
      $this->email->to($user->email);
      $this->email->subject("Signature Policy No. #{$core_id}");
      $this->email->message("Signature Policy No. #{$core_id}:
        <br/>
        Please use the link below to view The Signature Policy:
        <a href='{$core_url}' target='_blank'>{$core_url}</a>
        <br/>
      "); 
      $mail_result = $this->email->send();
      redirect('madar_policy/view/'.$core_id);
    }

    public function mail($core_id) {
      if ($this->input->post('submit')) {
        $this->load->model('users_model');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('message','message is required','trim|required');
        $this->form_validation->set_rules('mail','mail is required','trim|required');
        if ($this->form_validation->run() == TRUE) {
          $message = $this->input->post('message');
          $email = $this->input->post('mail');
          $user = $this->users_model->get_user_by_id($this->data['user_id'], TRUE);
          $this->load->library('email');
          $this->load->helper('url');
          $core_url = base_url().'madar_policy/view/'.$core_id;
          $this->email->from('e-signature@sunrise-resorts.com');
          $this->email->to($email);
          $this->email->subject("A message from {$user->fullname}, Signature Policy No. #{$core_id}");
          $this->email->message("{$user->fullname} sent you a private message regarding Signature Policy No. #{$core_id}:
            <br/>
            {$message}
            <br />
            <br />
            Please use the link below to view The Signature Policy:
            <a href='{$out_url}' target='_blank'>{$out_url}</a>
            <br/>
          "); 
          $mail_result = $this->email->send();
        }
      }
      redirect('madar_policy/view/'.$core_id);
    }

    public function unsign($signature_id) {
      $this->load->model('madar_policy_model');
      $this->load->model('users_model');
      $signature_identity = $this->madar_policy_model->get_signature_identity($signature_id);
      $this->madar_policy_model->unsign($signature_id);
      redirect('/madar_policy/policy_stage/'.$signature_identity['core_id']);  
    }

    public function sign($signature_id, $reject = FALSE) {
      $this->load->model('madar_policy_model');
      $signature_identity = $this->madar_policy_model->get_signature_identity($signature_id);
      $signrs = $this->get_signers($signature_identity['core_id']);
        if ($reject) {
          $this->madar_policy_model->reject($signature_id, $this->data['user_id']);
          redirect('/madar_policy/policy_stage/'.$signature_identity['core_id']);  
        } else {
          $this->madar_policy_model->sign($signature_id, $this->data['user_id']);
          redirect('/madar_policy/policy_stage/'.$signature_identity['core_id']);  
        }
      redirect('/madar_policy/view/'.$signature_identity['core_id']);
    }

    public function comment($core_id){
      if ($this->input->post('submit')) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('comment','Comment','trim|required');
        if ($this->form_validation->run() == TRUE) {
          $comment = $this->input->post('comment'); 
          $this->load->model('madar_policy_model');
          $comment_data = array(
            'user_id' => $this->data['user_id'],
            'core_id' => $core_id,
            'comment' => $comment
          );
          $this->madar_policy_model->insert_comment($comment_data);
          if ($this->data['role_id'] == 217) {
            $this->chairman_mail($core_id);
          }
        }
        redirect('/madar_policy/view/'.$core_id);
      }
    }

    private function chairman_mail($core_id) {
          $this->load->library('email');
          $this->load->helper('url');
          $core_url = base_url().'madar_policy/view/'.$core_id;
          $this->email->from('e-signature@sunrise-resorts.com');
          $this->email->to('abeer@sunrise.eg');
          $this->email->subject("Madar Signature Policy No. #{$core_id}");
          $this->email->message("Dear Madam Abber,
            <br/>
            <br/>
            Mr Hossam Commented on Madar Signature Policy No. #{$core_id}, Please use the link below:
            <br/>
            <a href='{$core_url}' target='_blank'>{$core_url}</a>
            <br/>
          "); 
          $mail_result = $this->email->send();
      }

  }

?>