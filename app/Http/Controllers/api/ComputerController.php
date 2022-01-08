<?php

namespace App\Http\Controllers\api;

use Exception;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

use App\Http\Requests\api\ComputerRequest;
use App\Models\Computer;
use App\Models\Image;
use App\Models\Computer_Image;

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

        Computer::create($request->all());
       
        return response()
        ->json([
            'message' => 'Computer stored in database.',
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

        if(! $request->user()->tokenCan('computadores_visualiza')) {
            return response()->json(
                ['message' => 'Unauthorized'],
                403
            );
        }

        try {

            //busca pelo computador
            $computer_raw = Computer::with('locals')
            ->with(['images' => function ($query){
                $query->select(['images.id',
                    'file_name',
                    'file_extension',
                    'is_public'
                ]);
            }])
            ->with('softwares')
            ->where('id', filter_var($id, FILTER_SANITIZE_STRING))
            ->firstOrFail();
        
            $computer = $computer_raw->toArray();
            unset($computer_raw);

            //manipula dados das imagens
            $images = array_map(function ($image) {
                return array(
                    'id' => $image['id'],
                    'file_name' => $image['file_name'],
                    'file_extension' => $image['file_extension'],
                    'is_public' => $image['is_public'],
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
                    'comments' => $local['comments'],
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

            $http_status = 200;

        } catch(ModelNotFoundException $e) {
            $computer = ['message' => 'Computer not found'];
            $http_status = 404;
        }

        return $this->http_response($computer, $http_status);
    
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
    public function update(ComputerRequest $request)
    {
        if(! $request->user()->tokenCan('computadores_edita')) {
            return response()->json(
                ['message' => 'Unauthorized'],
                403
            );
        }

        try {

            $computer = computer::where('id', request('id'))->firstOrFail();

            $computer_diff = array_diff($request->toArray(), $computer->toArray());
            unset($computer_diff['_method']);

            if (! empty($computer_diff)) {

                $result_insert = Computer::where('id', request('id'))->update($computer_diff);
                if (! $result_insert) {
                    throw new Exception('Computer not updated');
                }
    
                $computer = ['message' => 'Computer updated'];
                $http_status = 200;

            } else {
                $computer = ['message' => 'Computer data has not been changed'];
                $http_status = 202;
            }

        }
        catch(ModelNotFoundException $e) {
            $computer = ['message' => 'Computer not found'];
            $http_status = 404;
        }
        catch(QueryException $e) {
            $computer = ['message' => $e->getMessage()];
            $http_status = 409;
        }
        catch(Exception $e) {
            $computer = ['message' => $e->getMessage()];
            $http_status = 503;
        }

        return $this->http_response($computer, $http_status);

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

    /**
     * Remove the specified resource from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        if(! $request->user()->tokenCan('computadores_deleta')) {
            return response()->json(
                ['message' => 'Unauthorized'],
                403
            );
        }

        $computer_images = Computer::select('id')->with(['images' => function ($query){
                $query->select(['images.id']);
            }])
            ->where('id', request('id'))
            ->firstOrFail()
            ->toArray();

        array_map(function ($image_id) {
            Image:: where('id', $image_id['id'])
            ->where('is_public', false)
            ->delete();
        }, $computer_images['images']);

        Computer::where('id', request('id'))->delete();

        Computer_Image::where('computer_id', request('id'))
            ->delete();

        $computer = ['message' => 'Computer has been deleted'];
        $http_status = 202;

        return $this->http_response($computer, $http_status);
    
    }


    public function listmanufacturer(Request $request) {

        if(! $request->user()->tokenCan('computadores_visualiza')) {
            return response()->json(
                ['message' => 'Unauthorized'],
                403
            );
        }

        $list = Computer::selectRaw('manufacturer_name, count(*) as quantity')->groupBy('manufacturer_name')->get();

        return $this->http_response($list, 200);
    }


    public function listall(Request $request) {

        if(! $request->user()->tokenCan('computadores_visualiza')) {
            return response()->json(
                ['message' => 'Unauthorized'],
                403
            );
        }

        $list = Computer::get();

        return $this->http_response($list, 200);
    }

}
