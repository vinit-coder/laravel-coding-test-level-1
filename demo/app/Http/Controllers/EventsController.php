<?php

namespace App\Http\Controllers;

use App\Event;
use App\Mail\EventCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use DataTables;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events = Event::paginate();
        // return view('events.index',['data'=>$events]);

        if (request()->ajax()) {
            
            $data = Event::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        //dd($row->id);

                           $btn = '<div class="row lm-15" width="100%"><a href="'.route('edit.event',$row->id).'" class="edit-event btn btn-primary btn-sm col-4">Edit</a>'
                                .'<form class= "col-1" action="'.route('delete.event',$row->id).'" method="post">'
                                  
                                    .'<input type="hidden" name="_method" value="DELETE">'
                                    .'<button  type="submit"  class="delete-event btn btn-primary btn-sm" data-id = "'.$row->id.'">Delete</button>'
                                    .'</form></div>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }


        return view('events.index');
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name'=>'required|string',
            'slug'=>'unique:events',
            'startAt'=>'required|date',
            'endAt'=>'required|date'
        ]);

        if ($validator->fails()) {
          return  ['data'=>null,
                    'errors'=>$validator->messages()
                ];
        }
        
        $validatedData = $request->all();
        if(!$request->slug)
        {
            $validatedData['slug'] = Str::slug($request->name);
        }

        $count = Event::where('slug','like','%'.$validatedData['slug'].'%')->count();
        if($count>0)
        {
            $validatedData['slug'] = $validatedData['slug'].$count; 
        }

        $validatedData['id']= Str::uuid();
        $event=   Event::create($validatedData);

       
        if($event)
        {
            Session::flash('message', 'Event Created Successfully'); 
            Session::flash('alert-class', 'alert-success'); 

            Mail::to(request()->user())->send(new EventCreated($event));
        }
        else{
            Session::flash('message', 'Something Went Wrong'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
        return redirect('/events/create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('events.show',['event'=>Event::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event  = Event::find($id);

        return view('events.edit',['event'=>$event]);
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
        $validator = Validator::make(request()->all(), [
            'name'=>'required|string',
            'slug'=>'string',
            'startAt'=>'required|date',
            'endAt'=>'required|date'
        ]);

        if ($validator->fails()) {
          return  ['data'=>null,
                    'errors'=>$validator->messages()
                ];
        }
        $validatedData = $request->all(); 
        if(!$request->slug)
        {
            $validatedData['slug'] = Str::slug($request->name);
        }

        $count = Event::where('slug','like','%'.$validatedData['slug'].'%')->count();
        if($count>0)
        {
            $validatedData['slug'] = $validatedData['slug'].$count; 
        }

        $event = Event::find($request->id);

        $event=   $event->update($validatedData);

        if($event)
        {
            Session::flash('message', 'Event Updated Successfully'); 
            Session::flash('alert-class', 'alert-success'); 
        }
        else{
            Session::flash('message', 'Something Went Wrong'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
         return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        
            Session::flash('message', 'Event Deleted'); 
            Session::flash('alert-class', 'alert-success'); 
    
        return  redirect('/events');

    }
}
