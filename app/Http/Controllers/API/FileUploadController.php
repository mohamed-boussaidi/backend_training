<?php namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\File; use Validator;
use Illuminate\Http\Request;
class FileUploadController extends Controller {
    public function uploadImageUsers(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('/images/users'), $imageName);
        return response()->json(["image" => $imageName]
        );
    }
    public function uploadImageProducts(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('/images/products'), $imageName);
        return response()->json(["image" => $imageName]
        );
    }
    public function uploadImageSalles(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('/images/salles'), $imageName);
        return response()->json(["image" => $imageName]
        );
    }

}
