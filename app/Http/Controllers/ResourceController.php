<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Resource;
use Illuminate\Http\Request;
use App\Http\Requests\ResourceRequest;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();
        return view('resource.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceRequest $request)
    {
            try{
            $r = new Resource();
            $r->name = $request->input('name');
            $r->price = $request->input('price');
            $r->description = $request->input('description');
            $r->img = $request->file('img')->store('public/img/resources');
            $r->quantity = $request->input('quantity');
            $r->resource_code = $request->input('code');
            $r->save();
            return redirect(route('resource.create'))->with('message', 'Componente Creato Con Successo!');
        }
        catch (Exception $e){

            $message = explode(' ', $e->getMessage());
            $dbCode = rtrim($message[4], ']');
            $dbCode = trim($dbCode, '[');

            switch($dbCode){
            case 1062:
                $error = 'Codice Componente Duplicato ';
                break;
            case 2002:
                $error = 'Impossibile Connettersi Al Server MySql';
                break;
            case 2003:
                $error = 'Impossibile Connettersi Al Server MySql';
                break;
            default:
                $error = $e;
                break;
            }

            return redirect(route('resource.create'))->with('error', $error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        /* dd($resource); */
        return view('resource.edit' , compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resource $resource)
    {


        if ($request->file('img') != null) {
            Storage::delete($resource->img);
            $resource->img = $request->file('img')->store('public/media');
        }

        try{
            $resource->name = $request->input('name');
            $resource->price = $request->input('price');
            $resource->description = $request->input('description');
            $resource->resource_code = $request->input('code');

            if ($request->input('addresource') != 0 ){
                $resource->quantity = $request->input('quantity') + $request->input('addresource');
            } else {
                $resource->quantity = $request->input('quantity');
            }

            $resource->save();
            return redirect(route('resource.index'))->with('message', 'Componente Aggiornato Con Successo!');
        }
        catch (Exception $e){
            $message = explode(' ', $e->getMessage());
            $dbCode = rtrim($message[4], ']');
            $dbCode = trim($dbCode, '[');

            switch($dbCode){
            case 1062:
                $error = 'Codice Componente Duplicato ';
                break;
            case 2002:
                $error = 'Impossibile Connettersi Al Server MySql';
                break;
            case 2003:
                $error = 'Impossibile Connettersi Al Server MySql';
                break;
            default:
                $error = $e;
                break;
            }


            return redirect(route('resource.index'))->with('error', $error);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
