<?php

namespace App\Http\Controllers;

use App\Prediction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PredictionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function predict(Request $request){

        return view('backend.predict');
    }

    public function process_predict(Request $request){

        $request->validate([
            'image_to_test' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $client = new \GuzzleHttp\Client();
            $endpoint = 'http://192.168.137.1:8080/classify';
            $file               = $request->image_to_test;
            $file_path          = $file->getPathname();
            $file_mime          = $file->getMimeType('image');
            $file_uploaded_name = $file->getClientOriginalName();

//        Check if the x_ray has ever been uploaded for this user
            $x_ray_name = Prediction::where('user_id',auth()->id())
                ->where('x_ray_image_name',$file_uploaded_name)->get();

            if (count($x_ray_name) > 0) throw new \Exception('Please try a new x-ray image');

            $response = $client->request('POST', $endpoint, [
                'multipart' => [
                    [
                        'name'     => 'patient_xray_image',
                        'contents' => file_get_contents($file_path),
                        'filename' => $file_uploaded_name
                    ],
                ],
            ]);
            $res = json_decode($response->getBody());
            $inserted = Prediction::create([
                'user_id'=>auth()->id(),
                'prediction'=>$res->classification,
                'x_ray_image_name'=>$file_uploaded_name
            ]);
            echo json_encode(['ok'=>true,'msg'=>'Prediction made successfully.']);
        }catch (\Throwable $th){
            echo json_encode(['ok'=>false,'msg'=>$th->getMessage()]);
        }

    }

    public function get_users_predictions_json(){
        $user_id = auth()->id();
        $predictions = Prediction::with('users')->where('user_id',$user_id)->get();
        $number = 1;
        foreach ($predictions as $key=>$value) {
            $predictions[$key]['number'] = $number++;
            $predictions[$key]['prediction_time'] = Carbon::parse($predictions[$key]['created_at'])->format('d.m.Y');
        }
        echo json_encode($predictions);
    }
}
