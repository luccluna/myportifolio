<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site_news_letter extends TEC_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('site/news_letter_model');
        $this->load->model('site/noticias_model');

        $this->set_menu_active(
            array(
                'menu' => 'conteudo',
                'submenu' => 'site-news-letter'
            )
        );
    }

    public function index()
    {
        $data['news_letters'] = $this->news_letter_model->get_news_letter();

        if($this->input->get('type')){
            $notification = new stdClass;
            $notification->type = $this->input->get('type');
            $notification->title = $this->input->get('title');
            $notification->message = $this->input->get('message');
            $data['notification'] = $notification;
        }

        $this->montaTela('site/news_letter/lista', $data);
    }

    public function modal(){
        $data['noticias'] =  $this->noticias_model->get_noticias();
        $data['destinos'] = $this->news_letter_model->get_news_letter();
        $data['ultimo_envio'] = $this->news_letter_model->get_envio_ultimo();

        $this->load->view('site/news_letter/email_modal', $data);

    }

    public function disparar(){

    

        $noticia = $this->input->post('noticia');

        $data['noticia'] =  $this->noticias_model->get_noticia($noticia);

        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $this->email->initialize($config);


        $this->email->from('contato@gmail.com.br', 'Contato Flávia Moreira');
        $this->email->to($_POST['email']);
        $this->email->reply_to('contato@gmail.com.br', 'Contato Flávia Moreira');

        $this->email->subject('Novidades para Você!');



        $this->email->message($this->load->view('site/news_letter/email', $data, TRUE));

    
        $this->email->send();

        


        echo json_encode(true);



    }


}