<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Classe que extend o library pagination do codeigniter
* Usada para deixar o controller com um sintaxe mais amigável
*/
class TEC_Pagination extends CI_Pagination
{

    function __construct($config = array())
    {
        parent::__construct ( $config );
    }

    public function generate($url = '', $total_rows = 0, $per_page = 6, $segment = 3, $suffix = NULL)
    {

        

        //configurações base da pagination (Possui variaveis unicas para cada site)
        $config['base_url'] = base_url($url);
        $config['total_rows'] = $total_rows;
        $config['uri_segment'] = $segment;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['per_page'] = $per_page;
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['next_link'] = '<i style="color:white" class="fa fa-angle-double-right"></i>';
        $config['prev_link'] = '<i style="color:white" class="fa fa-angle-double-left"></i>';
        if($suffix)
            $config['suffix'] = '?'. http_build_query($suffix);

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li style="color:white" class="prev">';
        $config['prev_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li style="color:white" class="next">';
        $config['next_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page"><a class="current-page">';
        $config['cur_tag_close'] = '</a></li>';

        $this->initialize($config);
        return $this->create_links();
    }
}