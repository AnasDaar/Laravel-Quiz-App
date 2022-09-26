<?php

namespace App\Http\Controllers;

use App\Models\question;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class questioncontroller extends Controller
{
    public function add(Request $request){
        $validate=$request->validate([
            'question'=>'required',
            'opa'=>'required',
            'opb'=>'required',
            'opc'=>'required',
            'opd'=>'required',
            'ans'=>'required',
        ]);
        $q=new question();
        $q->question=$request->question;
        $q->a=$request->opa;
        $q->b=$request->opb;
        $q->c=$request->opc;
        $q->d=$request->opd;
        $q->ans=$request->ans;

        $q->save();
        return redirect('questions')->with('msg1','Question Has been Added');

    }

    public function show(){
        $qs=question::all();
        return view('questions')->with(['questions'=>$qs]);
    }
    


    public function update(Request $request){
        $validate=$request->validate([
            'question'=>'required',
            'opa'=>'required',
            'opb'=>'required',
            'opc'=>'required',
            'opd'=>'required',
            'ans'=>'required',
            'id'=>'required',
        ]);
        $q=question::find($request->id);
        $q->question=$request->question;
        $q->a=$request->opa;
        $q->b=$request->opb;
        $q->c=$request->opc;
        $q->d=$request->opd;
        $q->ans=$request->ans;

        $q->save();
        return redirect('questions')->with('msg1','Question Has been updated');

    }
    public function delete(Request $request){
        $validate=$request->validate([
            'id'=>'required',
        ]);
        question::where('id',$request->id)->delete();
        return redirect('questions')->with('msg2','Question Has Been Deleted');

    }
    public function startquiz(){
            Session::put("nextq",'1');
            Session::put("wrongans",'0');
            Session::put("correctans",'0');
        $q=question::all()->first();
        return view('answerDesk')->with(['question'=>$q]);
    }

    public function submitans(Request $request){
        $nextq=Session::get(key:'nextq');
        $wrongans=Session::get(key:'wrongans');
        $correctans=Session::get(key:'correctans');
        
        $validate=$request->validate([
            'ans'=>'required',
            'dbans'=>'required',
        ]);
        
        $nextq+=1;
        if($request->dbans == $request->ans){
            $correctans+=1;

        }else{
            $wrongans+=1;
        }

        
        Session::put("nextq",$nextq);
        Session::put("wrongans",$wrongans);
        Session::put("correctans",$correctans);

        $i=0;

        $questions=question::all();
        foreach($questions as $question){
            $i++;
            if($questions->count()<$nextq){
                return view('end');
            }
            if($i==$nextq){
                return view('answerDesk')->with(['question'=>$question]);
            }
        }

    }
    
}

