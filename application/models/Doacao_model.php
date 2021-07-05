<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doacao_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all_produtos($categorias=NULL, $tipo=NULL, $preco=NULL, $tamanho=NULL, $faixa_preco=NULL, $pagina=NULL, $itens_pagina=NULL, $busca=NULL){

		$this->db->select('produtos.*');
		$this->db->from('produtos');
		if(isset($busca) && strlen( $busca )>0){
                //$this->db->where('categorias.nome LIKE', '%'.$busca.'%');
			$this->db->like('produtos.titulo', $busca);
			$this->db->or_like('produtos.descricao', $busca);
		}

		if ($tipo) {
			$tipos_values = array('0', $tipo);
			$this->db->where_in('categoria_sexo', $tipos_values);
		}

		if($categorias){
			$this->db->join('categorias_produtos', 'categorias_produtos.produtos_id=produtos.id');
			$this->db->where_in('categorias_produtos.categorias_id', $categorias);
		}

		if($preco){
			$this->db->order_by('produtos.valor', $preco);
		}

		if($tamanho){
			$this->db->join('produto_tamanhos', 'produtos.id=produto_tamanhos.produtos_id');
			$this->db->join('tamanhos', 'produto_tamanhos.tamanhos_id=tamanhos.id');
			if($tamanho=="TODOS"){
			}	else {
				$this->db->like('tamanhos.tamanho', $tamanho);
			}
		}

		if($faixa_preco){
			$this->db->where('produtos.valor >=', $faixa_preco['min_preco']);
			$this->db->where('produtos.valor <=', $faixa_preco['max_preco']);
		}
		if ($itens_pagina) {
			
			$this->db->limit($itens_pagina, $itens_pagina * $pagina);
		}

		$this->db->where('produtos.ativo', 1);
		$this->db->group_by('produtos.id');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_destaques_produtos(){
		$this->db->select('produtos.*');
		$this->db->from('produtos');
		$this->db->where('ativo', 1);
		$this->db->where('destaque', 1);
		$query = $this->db->get();
		$produto = $query->result();
		return $produto;
	}
	public function get_galeria_produtos($id=null){
		$this->db->select('produtos_fotos.foto As imagens');
		$this->db->from('produtos_fotos');
		$this->db->where('produtos_id', $id);
		$query = $this->db->get();
		$fotos = $query->result();
		return $fotos;

	}

	public function produtos_carrinho($id){
		$this->db->select('produtos.*');
		$this->db->from('produtos');
		$this->db->where('produtos.id', $id);
		$query = $this->db->get();
		$produto = $query->row();

		return $produto;
	}


	public function get_produtos($data, $pagina, $itens_pagina){

		$this->db->select('produtos.*, produtos_fotos.*');
		$this->db->select('categorias.*');
		$this->db->from('produtos');
		$this->db->join('produtos_fotos', 'produtos_fotos.produtos_id = produtos.id', 'left');
		$this->db->join('categorias', 'categorias.id = produtos.categorias_id');
		$this->db->group_by('produtos_id');
		$this->db->order_by('categorias.id', 'ASC');
		$this->db->where('produtos.ativo', 1);

		if( isset($data['busca']) && strlen( $data['busca'] )>0){
			$this->db->where('categorias.nome LIKE', '%'.$data['busca'].'%');
			$this->db->or_like('produtos.titulo', $data['busca']);
			$this->db->or_like('produtos.descricao', $data['busca']);

		}

		$this->db->limit($itens_pagina, $itens_pagina * $pagina);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->result();

			$num_itens = count($data);

			return $data;
		}else{
			return FALSE;
		}
	}

	public function salvar_pedido_produtos($dados, $id){
		$pass = true;
		foreach ($dados as $key => $value) {
			$data = array(
				'pedidos_id' => $id,
				'produtos_id' => $value->id,
				'quantidade' => $value->qtd,
				'tamanho' => $value->tamanho
			);
			if($this->db->insert('pedido_produto', $data)){

			}else{
				$pass = FALSE;
			}
		}
		return $pass;
	}



	public function verifica_email_existente($email){

		$this->db->select('clientes.email');
		$this->db->from('clientes');
		$this->db->where('email', $email);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return true;
		}else{
			return null;
		}

	}

	public function salvar_cadastro($dados='', $id=NULL)
	{

		if ($id) {
			$this->db->where('id', $id);
			if($this->db->update('clientes', $dados)){
				return TRUE;
			}else{
				return FALSE;
			}
		}else {
			if($this->db->insert('clientes', $dados)){
				return $this->db->insert_id();
			}else{
				return FALSE;
			}
		}


	}

	public function login($email=NULL,$senha=NULL)
	{
		$this->db->select('id, email, nome');
		$this->db->from('clientes');
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);

		$query = $this->db->get();

		if($query->num_rows() >= 1){
			return $query->row();
		}else{
			return FALSE;
		}
	}


	public function get_categorias_produto($id=null){

		$this->db->select('categorias_produtos.*');
		$this->db->select('categorias.nome');
		$this->db->join('categorias', 'categorias.id=categorias_produtos.categorias_id');
		$this->db->from('categorias_produtos');
		$this->db->where('produtos_id', $id);
		$query = $this->db->get();
		$categorias = $query->result();
		return $categorias;

	}

	public function get_tamanhos_produto($id=null){

		$this->db->select('produto_tamanhos.*');
		$this->db->select('tamanhos.tamanho');
		$this->db->join('tamanhos', 'tamanhos.id=produto_tamanhos.tamanhos_id');
		$this->db->from('produto_tamanhos');
		$this->db->where('produtos_id', $id);
		$query = $this->db->get();
		$categorias = $query->result();
		return $categorias;

	}
	public function get_comentarios_produto($id=null){

		$this->db->select('comentarios.*');
		$this->db->select('clientes.*');
		$this->db->join('clientes', 'clientes.id=comentarios.clientes_id');
		$this->db->from('comentarios');
		$this->db->where('produtos_id', $id);
		$this->db->where('ativo', 1);
		$this->db->order_by('comentarios.id', 'DESC');
		$query = $this->db->get();

		$categorias = $query->result();
		return $categorias;

	}
	public function get_recomendados_produto($tipo=null, $id=NULL){

		$this->db->select('produtos.*');
		$this->db->from('produtos');
		$this->db->where('categoria_sexo=0 or categoria_sexo='.$tipo );
		$this->db->where("produtos.id !=", $id);
		$this->db->limit(4);
		$query = $this->db->get();
		$produtos = $query->result();
		return $produtos;

	}

	public function get_usuario($id){
		$this->db->select('clientes.*');
		$this->db->from('clientes');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$usuario = $query->row();
		return $usuario;
	}



            //---------------------######################--------------------







	public function get_num_produtos(){
		$this->db->select('produtos.*');
		$this->db->from('produtos');
		$this->db->where('ativo', 1);

		if($query = $this->db->get()){

			return count($query->result());
		}
	}

	public function get_num_produtos_by_busca($data, $pagina, $itens_pagina){
		$this->db->select('produtos.*, produtos_fotos.*');
		$this->db->from('produtos');
		$this->db->join('produtos_fotos', 'produtos_fotos.produtos_id = produtos.id');
		$this->db->join('categorias', 'categorias.id = produtos.categorias_id');
		$this->db->where('produtos.ativo', 1);
		$this->db->order_by('produtos.id', 'ASC');

		if( isset($data['busca']) && strlen( $data['busca'] )>0){
			$this->db->where('categorias.nome LIKE', '%'.$data['busca'].'%');
			$this->db->or_like('produtos.titulo', $data['busca']);
			$this->db->or_like('produtos.descricao', $data['busca']);
     //var_dump($this->db->get()->result());exit;
		}


		//$this->db->limit($itens_pagina, $itens_pagina * $pagina);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->result();
			$num_itens = count($data);

			return $num_itens;
		}else{
			return FALSE;
		}
	}

	public function get_produto($id){
		$this->db->select('produtos.*, produtos_fotos.foto');
		$this->db->from('produtos');
		$this->db->join('produtos_fotos', 'produtos_fotos.produtos_id = produtos.id', 'left');
		$this->db->where('produtos.id', $id);
		$this->db->where('ativo', 1);
		if($query = $this->db->get()){
			$data = $query->row();
			return $data;
		}else{
			return FALSE;
		}
	}

	public function get_fotos($id){
		$this->db->select('produtos_fotos.foto');
		$this->db->from('produtos_fotos');
		$this->db->where('produtos_id', $id);
		if($query = $this->db->get()){
			$data = $query->result();
			return $data;
		}else{
			return FALSE;
		}
	}


	public function salvar_pedido($dados){

		if($this->db->insert('pedidos', $dados)){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}
	}

	public function finalizar_pedido($pedido=NULL, $idtransacao)
	{
		if($pedido && $idtransacao){
			$this->db->where('codigo_pedido', $pedido);
			if($this->db->update('pedidos', array('status_pedido' => '1', 'id_transacao' => $idtransacao))){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}


	public function existe_transacao($transaction=NULL, $pedido=NULL)
	{
		$this->db->where('id_transacao', $transaction);
		$this->db->where('codigo_pedido', $pedido);
		if($this->db->count_all_results('pedidos') == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function update_status_pagamento($codigo=NULL, $array)
	{

		$this->db->where('codigo_pedido', $codigo);
		if($this->db->update('pedidos', $array)){
			$updated_status = $this->db->affected_rows();

			$this->db->select('pedidos.id');
			$this->db->from('pedidos');
			$this->db->where('codigo_pedido', $codigo);
			if($query = $this->db->get()){
				return $query->row();
			}else{
				return false;
			}
		}else{
			return FALSE;
		}
	}


	public function get_meus_pedidos($id, $order){
		$this->db->select('pedidos.*');
		$this->db->from('pedidos');
		$this->db->where('pedidos.clientes_id', $id);

		if ($order) {

			$this->db->order_by('pedidos.id', $order);
		}else{
			$this->db->order_by('pedidos.id', 'desc');
		}




		if($query = $this->db->get()){
			return $query->result();
		}else
		{
			return false;
		}

	}

	public function get_pedido($id){
		$this->db->select('pedidos.*');
		$this->db->from('pedidos');
		$this->db->where('pedidos.id', $id);

		if($query = $this->db->get()){
			return $query->row();
		}else
		{
			return false;
		}

	}


	public function get_meus_pedidos_produtos($id){

		$this->db->select('pedido_produto.*');
		$this->db->from('pedido_produto');
		$this->db->select('produtos.titulo, produtos.valor, produtos.imagem, produtos.id As id_produto');


		$this->db->join('produtos', 'pedido_produto.produtos_id=produtos.id', 'left');

		$this->db->where('pedido_produto.pedidos_id', $id);


		if($query = $this->db->get()){
			return $query->result();
		}else
		{
			return false;
		}

	}

	public function atualiza_estoque($cod){

		$this->db->select('pedido_produto.*');
		$this->db->from('pedido_produto');

		$this->db->where('pedidos_id', $cod);

		if ($query = $this->db->get()){

			foreach ($query->result() as $key => $value) {
				$this->db->set('estoque', 'estoque-'.$value->quantidade.'', false);
				$this->db->where('id',$value->produtos_id);
				$this->db->update('produtos');
			}
		}
		exit;


	}


	public function get_all_categorias(){
		$this->db->select('categorias.*');
		$this->db->from('categorias');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_categorias_sexo($sexo){
		$this->db->select('categorias_produtos.*');
		$this->db->select('categorias.*');
		$this->db->from('categorias_produtos');
		$this->db->join('categorias', 'categorias_produtos.categorias_id=categorias.id');
		$this->db->join('produtos', 'categorias_produtos.produtos_id=produtos.id');

		$this->db->where('produtos.categoria_sexo=0 or produtos.categoria_sexo='.$sexo );
		$this->db->group_by('categorias_produtos.categorias_id');
		$query = $this->db->get();

		return $query->result();

	}

	public function get_sobre(){
		$this->db->select('textos.*');
		$this->db->from('textos');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function criar_token_perfil($email){

		$token = sha1(uniqid(rand(0, 500)));
		$this->db->where('email', $email);
		$result = $this->db->update('clientes',array('token' => $token));
		if($result){
			return $token;
		}

	}

	function get_nome_by_email($email){

		$this->db->select('clientes.nome');
		$this->db->from('clientes');
		$this->db->where('email', $email);
		if($query = $this->db->get()){
			return $query->row();
		}else{
			return false;
		}
	}


	function atualizar_senha(){
		$token = $_GET['token'];
		if ( ! empty($token) && is_string($token) && $this->rede_model->verifica_token($_GET['email'],$token)){
			$dados['email'] = $_GET['email'];
			$dados['token'] = $token;
			$this->montaTela('site/atualizar-senha',$dados);
		}
		else
		{
			redirect('recuperar-senha?return=bad_token');
		}
	}


	function verifica_token($email, $token){

		$this->db->from('clientes');
		$this->db->where('token', $token);
		$this->db->where('email', $email);

		// Como não há validação para criar um token por requisição,
		// "> 0" está sendo usado no lugar de "=== 1"
		return ($this->db->count_all_results() > 0);

	}


	function atualizar_senha_perfil($dados){

		$nova_senha = md5($dados['senha']);

		$this->db->where('token', $dados['token']);
		$result = $this->db->update('clientes',array('senha' => $nova_senha, 'token' => ''));
		if($result){
			return true;
		}
	}

	public function atualizar_sessao($idPerfil)
	{
		$this->db->select('id, email, nome');
		$this->db->from('clientes');
		$this->db->where('id', $idPerfil);

		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row();
		}else{
			return FALSE;
		}
	}

	public function salva_comentario($dados){
		if($this->db->insert('comentarios', $dados)){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}
	}
	public function get_banners(){
		$this->db->select('banners.*');
		$this->db->from('banners');
		if($query = $this->db->get()){
			return $query->result();
		}else
		{
			return false;
		}
	}
	public function get_promo_home(){
		$this->db->select('promocoes_home.*');
		$this->db->from('promocoes_home');
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row();
		}else
		{
			return false;
		}
	}
	public function get_promo_internas(){
		$this->db->select('promocoes_produtos.*');
		$this->db->from('promocoes_produtos');
		$query = $this->db->get();
		if($query->num_rows() == 2){
			return $query->result();
		}else
		{
			return false;
		}
	}

	public function get_promocoes_slides(){
		$this->db->select('promocoes_slides.*');
		$this->db->from('promocoes_slides');
		$query = $this->db->get();
		if($query->num_rows() >0){
			return $query->result();
		}else
		{
			return false;
		}
	}
	public function get_promocoes_produtos(){
		$this->db->select('promocoes_produtos.*');
		$this->db->from('promocoes_produtos');
		$query = $this->db->get();
		if($query->num_rows() == 2){
			return $query->result();
		}else
		{
			return false;
		}
	}

	public function get_contato(){

		$this->db->select('contato.*');
		$this->db->from('contato');
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->row();
		}else
		{
			return false;
		}

	}

	public function get_marcas(){
		$this->db->select('marcas.*');
		$this->db->from('marcas');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}else
		{
			return false;
		}
	}

	public function get_horario(){
		$this->db->select('promocoes_home.*');
		$this->db->from('promocoes_home');
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row();
		}else
		{
			return false;
		}
	}



	public function get_secao1(){
		$this->db->select('secao1.*');
		$this->db->from('secao1');
		$query = $this->db->get();
		if($query->num_rows() > 1){
			return $query->result();
		}else
		{
			return false;
		}
	}




	public function salvar_newsletter($email){
		$this->db->select('newsletter.*');
		$this->db->from('newsletter');
		$this->db->where('email', $email);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return FALSE;
		}else
		{
			$dados['email'] = $email;
			if($this->db->insert('newsletter', $dados)){
				return TRUE;
			}else{
				return FALSE;
			}

		}
	}


	public function get_estrutura(){
		$this->db->select('estrutura.*');
		$this->db->from('estrutura');
		$query = $this->db->get();
		if($query->num_rows() >= 1){
			return $query->result();
		}else
		{
			return false;
		}
	}


}
