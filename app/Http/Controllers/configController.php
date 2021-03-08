<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateconfigRequest;
use App\Http\Requests\UpdateconfigRequest;
use App\Repositories\configRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\config;
use App\Models\domaine;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use PDO;
use Illuminate\Support\Facades\Artisan;
use PDOException;
use Illuminate\Support\Facades\DB;

class configController extends AppBaseController
{
    /** @var  configRepository */
    private $configRepository;

    public function __construct(configRepository $configRepo)
    {
        $this->configRepository = $configRepo;
    }

    /**
     * Display a listing of the config.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->configRepository->pushCriteria(new RequestCriteria($request));
        $configs = $this->configRepository->all();

        return view('configs.index')
            ->with('configs', $configs);
    }

    /**
     * Show the form for creating a new config.
     *
     * @return Response
     */
    public function create()
    {
        $itemsConf = array(
            'itemlistConf' => DB::table('configs')->get()
        );
        
        $items = array(
            'tmp' => DB::table('domaines')->get()
        );  
        $tmp = array();
        foreach($items['tmp'] as $item){
           $flag=true;
          foreach($itemsConf['itemlistConf'] as $itc)
            if($item->id === $itc->domaine_id){
                $flag = false;
            }
        }
        if($flag){
            array_push($tmp, $item);
        }

        return view('configs.create',["tmp"=>$tmp]);
    }

    /**
     * Store a newly created config in storage.
     *
     * @param CreateconfigRequest $request
     *
     * @return Response
     */
    public function store(CreateconfigRequest $request)
    {
 
        $input = $request->all();
        
        $config = $this->configRepository->create($input);
        Flash::success('Config saved successfully.');
    
        $structure = "../../$config->nom_site";
       
        // Pour créer une stucture imbriquée, le paramètre $recursive 
        // doit être spécifié.
        if(!is_dir($structure)){
        if (!mkdir($structure, 0777, true)) {
            die('Echec lors de la création des répertoires...');
        }}
        // dossier courant
        echo getcwd() . "\n";

        chdir($structure);

        // dossier courant
        echo getcwd() . "\n";

        //config db *****************************************************************************
    
        $servname = "localhost"; $user = "root"; $pass = "";
        
            try{
                $dbco = new PDO("mysql:host=$servname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $createDB = "CREATE DATABASE db_$config->nom_site";
                $dbco->exec($createDB);
                
                //On utilise la base tout juste créée pour créer une table dedanss
                $createTb = "use db_$config->nom_site";
                $dbco->exec($createTb);  
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
            
            //config wp ********************************************************

            ini_set('max_execution_time', 360);

            $output = shell_exec("wp core download --locale=$request->radio");
            $output = shell_exec("wp core config --dbname=db_$config->nom_site --dbuser=$user --dbpass=$pass");
            $output = shell_exec("wp core install --url=localhost/$config->nom_site --title=$config->nom_site --admin_user=$config->nom_admin --admin_password=$config->password --admin_email=$config->email");
            $output = shell_exec("wp theme install $request->Theme --activate");
            $output = shell_exec("wp plugin install $request->Plugin --activate");
            if($request->has('Calendar'))
            {
                $output = shell_exec("wp widget add calendar sidebar-1 2 --title=$request->Calendar");
            }
            if($request->has('meta'))
            {
                $output = shell_exec("wp widget add meta sidebar-1 1 --title=$request->meta");
            }

        return redirect(route('configs.index'));
    }

    /**
     * Display the specified config.
     * 
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            Flash::error('Config not found');

            return redirect(route('configs.index'));
        }

        return view('configs.show')->with('config', $config);
    }

    /**
     * Show the form for editing the specified config.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $config = $this->configRepository->findWithoutFail($id);

        $itemsConf = array(
            'itemlistConf' => DB::table('configs')->get()
        );
        
        $items = array(
            'tmp' => DB::table('domaines')->get()
        );  
        $tmp = array();
        foreach($items['tmp'] as $item){
           $flag=true;
          foreach($itemsConf['itemlistConf'] as $itc)
            if($item->id === $itc->domaine_id){
                $flag = false;
            }
        }
        if($flag){
            array_push($tmp, $item);
        }

        if (empty($config)) {
            Flash::error('Config not found');

            return redirect(route('configs.index'));
        }
 
        return view('configs.edit',["tmp"=>$tmp])->with('config', $config);
    }

    /**
     * Update the specified config in storage.
     *
     * @param  int              $id
     * @param UpdateconfigRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateconfigRequest $request)
    {
    
        
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            Flash::error('Config not found');

            return redirect(route('configs.index'));
        }
       
        $config = $this->configRepository->update($request->all(), $id);

        Flash::success('Config updated successfully.');
  
        $structure = "../../$config->nom_site";

        // dossier courant
        echo getcwd() . "\n";

        chdir($structure);

        // dossier courant
        echo getcwd() . "\n";

        //config wp ********************************************************
        $output = shell_exec("wp language core install $request->radio --activate");


        return redirect(route('configs.index'));
    }

    /**
     * Remove the specified config from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            Flash::error('Config not found');

            return redirect(route('configs.index'));
        }

        $this->configRepository->delete($id);

        Flash::success('Config deleted successfully.');

        return redirect(route('configs.index'));
    }
}
