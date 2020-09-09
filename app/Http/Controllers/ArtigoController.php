<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;

use App\Artigo;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = Artigo::paginate(5);

        return view("artigos.index")->withArtigos($artigos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'marca' => [
                'required',
            ]
        ]);

        $marca = $request->marca;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://www.questmultimarcas.com.br/estoque?termo=$marca");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($curl);
        // Fecha a requisição e limpa a memória
        curl_close($curl);

        $dom = new \DOMDocument();
        @ $dom->loadHTML($html);
        $heads = $dom->getElementsByTagName('head');
        $artigos = $dom->getElementsByTagName('article');

        $head = "";
        
        foreach($heads as $item){
            $head .= $dom->saveHTML($item);
        }
        $xpath = new \DOMXpath($dom);

        $carros = $xpath->query("//div[@id='pixad-listing']//article");
        
        $id_usuario = Auth::user()->id;
        $length = $carros->length;

        if($length < 1){
            Alert::info('404', 'Não foi encontrado veículos com essa busca');
            return redirect()->back();
        }

        try{
            DB::beginTransaction();
            for($i = 0; $i < $length; $i++){
                $artigo = new Artigo();
                $valor = "";
                $node = $carros->item($i);
        
                $link = $xpath->query($node->getNodePath()."//h2/a")->item(0);
                $artigo->link = $link->getAttribute('href');
                $artigo->nome_veiculo = $link->nodeValue;
                $artigo->id_usuario = $id_usuario;
    
                foreach($xpath->query($node->getNodePath()."//ul[@class='card__list list-unstyled']") as $uls){
                    foreach($uls->childNodes as $child){
                        $valor = $child->nodeValue;
                        $valor = preg_replace( '/[\n\r]/', '', $valor );
                        /*$valor = preg_replace( '/[ç]/', '', $valor);
                        $valor = preg_replace( '/[í]/m', '', $valor);
                        $valor = preg_replace( '/[áâ]/', '', $valor);*/
                        
                        if(trim($valor) != ""){
                            $valor = explode(":",trim($valor));
                            $attr = $valor[0];
                            $data = trim($valor[1]);

                            switch($attr){
                                case "Ano": $artigo->ano = $data; break;
                                case "Combustível": $artigo->combustivel = $data; break;
                                case "Cor": $artigo->cor = $data;  break;
                                case "Quilometragem": 
                                    $artigo->quilometragem = $data; 
                                    break;
                                case "Câmbio": 
                                    $artigo->cambio = $data; 
                                    break;
                                case "Portas": $artigo->portas = $data; break;

                            }
                        }
                        
                    }
                    $artigo->save();
                }
                
            }
            DB::commit();
            Alert::success("Carros inseridos no banco de dados");
            $html = "";
        
            /*foreach($artigos as $item){
                $html .= $dom->saveHTML($item);
            }
            $rota = route("artigo.index");
            $html = "<html><head>$head</head><body><a class='btn btn-primary' style='background-color: #6cb2eb; color: black;' href='$rota'><i class='fa fa-list'></i>Voltar para Lista</a>$html</body></html>";
            
            return $html;*/
            return redirect()->route('artigo.index');
        }
        catch(\Illuminate\Database\QueryException $ex){
            DB::rollback();
            Alert::error("Nao foi possível inserir Artigos");
            return redirect()->back();
        }
            

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
		{
            DB::beginTransaction();
			Artigo::destroy($id);
            Alert::success("Apagado com sucesso");
            DB::commit();
            return redirect()->back();
		
		}
		catch(\Exception $e)
		{
            DB::rollBack();
            Alert::danger("Nao foi possível apagar");
            return redirect()->back();
        }
    }
}
