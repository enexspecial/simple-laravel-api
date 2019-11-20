<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\VisitorReg;

class VisitorController extends Controller
{

    public function registerVisitor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname'      =>  'required|min:3',
            'time_in'       =>  'required',
            'whom_to_see'   =>  'required',
            'reason'        =>  'required',
            'mobile'        =>  'required|numeric|min:3'
        ]);
        if($validator->fails()){
            return response()->json([
                'error'=> [
                    'code'=>422,
                    'message'=>'Entity Uprocessable',
                    'error' => $validator->errors()
                ]
                ], 422);
        }
        try{
            $visitor = new VisitorReg();
            $visitor->fullname      = $request->fullname;
            $visitor->time_in       = $request->time_in;
            $visitor->whom_to_see   = $request->whom_to_see;
            $visitor->reason        = $request->reason;
            $visitor->mobile        = $request->mobile;
            
            if($visitor->save()){
                return response()->json([
                    'success'=>[
                        'code'=>201,
                        'message'=>'Success! Kindly Procced to the Waiting Room',
                        ]
                ], 201);
            }

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function listAllVisitor()
    {
      
      $visitor = VisitorReg::all();
      foreach($visitor as $key=>$value){
          $arr[$key]['fullname'] = $value['fullname'];  
          $arr[$key]['time_in']  = $value['time_in'];
          $arr[$key]['whome_to_see'] = $value['whom_to_see'];
          $arr[$key]['reason'] = $value['reason'];
          $arr[$key]['mobile'] = $value['mobile'];       
      }
      return response()->json([
          'success'=>[
              'code'=>200,
              'message'=>'Success!',
              'data'=>$arr
          ]
          ], 200);       
    }
}
