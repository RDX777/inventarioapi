<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests\api\ComputerRequest;

use App\Models\Computer;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ComputerRequest $request)
    {
        
        if(! $request->user()->tokenCan('computadores_cadastra')) {
            return response()->json(
                ['message' => 'Unauthorized'],
                403
            );
        }

        $request->validated();

        Computer::create($request->all());
       
        return response()
        ->json([
            'message' => 'Computer stored in database.'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {

        if(! $request->user()->tokenCan('computador_visualiza')) {
            return response()->json(
                ['message' => 'Unauthorized'],
                403
            );
        }

         //busca pelo computador
         $computer_raw = Computer::with('locals')
         ->with(['images' => function ($query){
             $query->select(['images.id',
                 'file_name',
                 'file_extension'
             ]);
         }])
         ->with('softwares')
         ->where('id', filter_var($id, FILTER_SANITIZE_STRING))
         ->first();
        
        if ($computer_raw) {

            $computer = $computer_raw->toArray();
            unset($computer_raw);

            //manipula dados das imagens
            $images = array_map(function ($image) {
                return array(
                    'id' => $image['id'],
                    'file_name' => $image['file_name'],
                    'file_extension' => $image['file_extension'],
                    'url_image' => 'Comiing soon',
                    'url_image' => route('get.images.show', $image['id']),
                    'start_date' => $image['pivot']['start_date'],
                    'end_date' => $image['pivot']['end_date']
                );
            },$computer['images']); 

            unset($computer['images']);
            $computer = array_merge($computer, array('images' => $images));
            unset($images);

            //manipula dados do local
            $locals = array_map(function ($local) {
                return array(
                    'floor' => $local['floor'],
                    'location_name' => $local['location_name'],
                    'observations' => $local['observations'],
                    'start_date' => $local['pivot']['start_date'],
                    'end_date' => $local['pivot']['end_date']
                );
            } , $computer['locals']);

            unset($computer['locals']);
            $computer = array_merge($computer, array('locals' => $locals));
            unset($locals);

            //manipula dados do local
            $softwares = array_map(function ($software) {
                return array(
                    'manufacturer_name' => $software['manufacturer_name'],
                    'name' => $software['name'],
                    'version' => $software['version'],
                    'description' => $software['description'],
                    'type' => $software['type'],
                    'start_date' => $software['pivot']['start_date'],
                    'end_date' => $software['pivot']['end_date']
                );
            }, $computer['softwares']);
        
            unset($computer['softwares']);
            $computer = array_merge($computer, array('softwares' => $softwares));
            unset($softwares);

        return response()
                ->json($computer, 200)
                ->setEncodingOptions(JSON_UNESCAPED_SLASHES)
                ->header('Content-Type', 'application/json');
        } else {
            return response()
            ->json([
                'message' => 'Computer not found.'
            ], 404);

        }
    
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
    public function update(Request $request)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
