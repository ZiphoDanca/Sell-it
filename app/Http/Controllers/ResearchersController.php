<?php

namespace App\Http\Controllers;
use  App\NewUser ;
use App\Reseachers_details_tabs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ResearchersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respond=array();

        $api_key   = Input::get('api_key');

        $user  = NewUser::where('api_key',$api_key)->first();

        if($user!=NULL)
        {
            $sellers_tabs=Reseachers_details_tabs::where('new_user_id',$user->id)->get();

            return  response()->json($sellers_tabs) ;
        }
        else
        {
            $respond['msg']="No Api key found";

            $respond['error']=true;

            return response()->json($respond);
        }
    }

    public function allResearchs()
    {
        $all_researchs=Reseachers_details_tabs::all();
        return response()->json($all_researchs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input  =  $request->all();

        $user  = NewUser::where('api_key',$input['api_key'])->first();

        $researcherPost = new Reseachers_details_tabs();
        $researcherPost->new_user_id = $user->id;

        $img=$request->file('file');

        $destinationFolder = 'images/'.$user['name'].'_'.$user['surname'].'_'.$user['id'];

        if(!\File::exists($destinationFolder)) {
            \File::makeDirectory($destinationFolder,0777,true);
        }

        $name =    $img->getClientOriginalName();

        $img->move($destinationFolder,$name) ;

        $researcherPost->img_url = env('APP_URL').$destinationFolder.'/'.$name;

        $researcherPost->fill($input);
        $researcherPost->save();

        return response()->json($researcherPost);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     *
     * App\Flight::where('active', 1)
    ->where('destination', 'San Diego')
    ->update(['delayed' => 1]);
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

    }
}