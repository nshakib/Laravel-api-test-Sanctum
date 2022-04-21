<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    public function list($id)
    {
        return Device::find($id);
    }

    public function add(Request $request)
    {
        $device = new Device();
        $device->name = $request->name;
        $device->member_id = $request->member_id;

        $result= $device->save();

        if($result){
            return ['Result'=> 'Data has been save'];
        }else{
            return ['Result'=> 'Data has been save failed!'];
        }
        
    }


    public function update(Request $request){
        $device = Device::find($request->id);
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();

        if($result){
            return ['Result'=> 'Data has been updated'];
        }else{
            return ['Result'=> 'Data has been updated failed!'];
        }
    }

    public function search($name)
    {
        return Device::where("name","Like", "%".$name. "%")->get();
    }

    function delete($id)
    {
        $device = Device::find($id);
        $result= $device->delete();

        if($result){
            return ['Result'=> 'Data has been deleted'];
        }else{
            return ['Result'=> 'Data has been deleted failed!'];
        }
    }

    function testData(Request $request)
    {
        $rules = array(
            "member_id" => "required|min:1|max:4"
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else{
            $device = new Device();
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();

        if($result){
            return ['Result'=> 'Data has been save'];
        }else{
            return ['Result'=> 'Data has been save failed!'];
        }
        }
        
    }
}
