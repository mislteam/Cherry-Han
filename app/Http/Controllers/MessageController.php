<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\ApiUser;
use App\Models\MessageReply;
use App\Services\LogWriter;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if_forbidden('message.show');
        $user_id=auth()->id();
       
        $lists = Message::where('status', 'admin' )->get();       
        return view('pages.compose_message.index', compact('lists'));
    }

    public function inboxindex()
    {
        abort_if_forbidden('message.show');
        $user_id=auth()->id();
       
        $lists = Message::where('status' , 'user' )->get();        
        return view('pages.compose_message.inboxindex', compact('lists'));
    }

    public function add()
    {
        $apiusers = ApiUser::all();
        return view('pages.compose_message.add',compact('apiusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create11(Request $request)
    {
        abort_if_forbidden('message.create');
        $this->validate($request,[
            'subject'          => ['required', 'string', 'max:255'],
            
        ]);

        $file=array();

       if($request->hasfile('file'))
        {
           
            foreach($request->file('file') as $f)
            {
                $name = time().rand(1,100).'.'.$f->extension();
                $f->move(public_path('gallery/message'), $name);
                $file[] = $name;
            }
        }

        $from_where = array(
                "type"=>"admin",
                "id"=>auth()->id(),
            );

        $to_where = array(
                "type"=>"user",
                "id"=>$request->to_where,
            );

        $message = Message::create([
            'subject'       => $request->subject,
            'time'          => time(),
            'file'          => json_encode($file,true),
            'from_where'    => json_encode($from_where,true),
            'to_where'      => json_encode($to_where,true),
            'view_status'   => 'ok',
            'status'   => 'admin',
            'created_by'    => auth()->id(),
        ]);


        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew Message: ".json_encode($message);

        LogWriter::user_activity($activity,'Addingmessage');

        if (auth()->user()->can('message.create'))
            return redirect()->route('messageIndex');
        else
            return redirect()->route('home');
    }
    
     public function create(Request $request)
    {
        abort_if_forbidden('message.create');
        $this->validate($request,[
            'subject'          => ['required', 'string', 'max:255'],
            
        ]);

        $file=array();

       if($request->hasfile('file'))
        {
           
            foreach($request->file('file') as $f)
            {
                $name = time().rand(1,100).'.'.$f->extension();
                $f->move(public_path('gallery/message'), $name);
                $file[] = $name;
            }
        }

        
//exit;

    $all=$request->sent_type;
    $allagent=$request->customize;
    $user_id="";

    if($all=='all' && $allagent==""){
         $lists = Apiuser::all(); 
         foreach ($lists as $all) {

            $user_id.=$all->id.',';            
        
         }   
        } 
       
     else if($all=='agent' && $allagent=="allagent")
     {
        $lists = Apiuser::where('isAgent','agent')->get(); 
        foreach ($lists as $all) {

            $user_id.=$all->id.',';            
        
         }   
         
     }   
     else if($all=='user' && $allagent=="allagent")
     {
        $lists = Apiuser::where('isAgent','user')->get();
        foreach ($lists as $all) {

            $user_id.=$all->id.',';            
        
         }   
       }  
        
     else if($allagent=='customize')
     {
        //$to_where = array();
        if($t=$request->to_where){

            foreach($t as $key=>$val) 
            {
                $user_id.=$val.',';

                //print_r($to_where1);
            }
            //dd($to_where1);
            //echo $user_id;
        }
        //exit;
     }
     

     $exp=explode(',', $user_id);
     //dd(count($exp)-1);exit;
         for($i=0;$i<count($exp)-1;$i++){

            $from_where = array(
                "type"=>"admin",
                "id"=>auth()->id(),
            );
            $to_where = array(
                "type"=>"user",
                "id"=>$exp[$i],
            );

            $message = Message::create([
            'subject'       => $request->subject,
            'time'          => time(),
            'file'          => json_encode($file,true),
            'from_where'    => json_encode($from_where,true),
            'to_where'      => json_encode($to_where,true),
            'view_status'   => 'ok',
            'status'   => 'admin',
            'created_by'    => auth()->id(),
        ]);

     }

        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew Message: ".json_encode($message);

        LogWriter::user_activity($activity,'Addingmessage');

        if (auth()->user()->can('message.create'))
            return redirect()->route('messageIndex');
        else
            return redirect()->route('home');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function messagereplyadd(Request $request)
    {
        $message_id=$request->message_id;
        $message=Message::find($message_id);
        return view('pages.compose_message.message_reply_form',compact('message'));
    }

    public function messagereplycreate(Request $request)
    {
        
        $time=time();
         $messagereply = MessageReply::create([
            
            'message_id'  => $request->message_id,
            'time'        => $time,           
            'from_where'  => $request->from_where,           
            'to_where'    => $request->to_where,           
            'subject'     => $request->subject,           
            'message'     => $request->message,           
            'file'        => 1,           
            'view_status' => $request->view_status,           
            'created_by'  => auth()->id(),
        ]);
        //dd($messagereply);

        $activity = "\nCreated by: ".json_encode(auth()->user())."\nNew replyMessage: ".json_encode($messagereply);

        LogWriter::user_activity($activity,'Addingreplymessage');
        echo json_encode($messagereply);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        abort_if_forbidden('message.edit');
        $apiusers=ApiUser::all();
        $message=Message::find($id);
        return view('pages.compose_message.edit',compact('message','apiusers')); 

    }

    public function view($id)
    {
        abort_if_forbidden('message.view');
        $message = Message::find($id);
        $replymessages=MessageReply::where('message_id','=',$id)->get();
        return view('pages.compose_message.sendmessage_detail', compact('message','replymessages'));
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
        abort_if_forbidden('message.edit');

        $this->validate($request,[
            'msg_to' => ['required', 'string', 'max:255'],
       
        ]);
        $message = Message::find($id);  

        $file=array();

         if(request('old_file') == null){
              $oldfile =array();
            }else{
               
               $oldfile = request('old_file');
            }
      
        
        if($files=$request->file('file')){
            foreach($files as $f)
            {
                $name = time().rand(1,100).'.'.$f->extension();
                $f->move(public_path('gallery/message'), $name);
                $file[] = $name;
                
            }
                 
             $attachfile=array_merge($oldfile, $file);
            
        }else{
                $attachfile = $oldfile;
            }
            

        /*end*/
        $before = $message;
        $activity = "\nUpdated by: ".logObj(auth()->user());
        $activity .="\nBefore updates message: ".logObj($before);

        if (is_null($request->password)) unset($request['password']);
        $message->fill($request->all());
        $message->file=$attachfile;
        $message->save();

        $afterCat = $message;
        $activity .="\nAfter updates message: ".logObj($afterCat);

        LogWriter::user_activity($activity,'Editingmessage');

        if (auth()->user()->can('message.edit'))
            return redirect()->route('messageIndex');
        else
            return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message=Message::find($id);
        $message->delete();
        return redirect()->route('messageIndex');
    }
}
