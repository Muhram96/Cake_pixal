<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
class TollsController extends Controller
{
    public function RemoveBackground(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'image_file' => 'required|image|mimes:jpg, jpeg, bmp, png, webp, tiff, tif, bitmap, raw, rgb, jfif, lzw|max:2048', // Adjust validation rules as needed
                ],[
                'image_file.max' => 'The image size should not exceed 15MB.', // Custom error message for max size validation
        ]);

        // Store the uploaded file in the specified location
        $image_file_path = $request->file('image_file')->store('public/uploads');

        // Build the cURL request
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://techhk.aoscdn.com/api/tasks/visual/segmentation',
            CURLOPT_HTTPHEADER => array(
                "X-API-KEY: wxy1eatufgkzork6s",
                "Content-Type: multipart/form-data",
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => array('sync' => 0, 'image_file' => new \CURLFile(storage_path('app/' . $image_file_path))),
        ));

        // Execute the cURL request
        $response = curl_exec($curl);
        $result = curl_errno($curl) ? curl_error($curl) : $response;
        curl_close($curl);

        // Decode the JSON response
        $result = json_decode($result, true);

        // Check if the request was successful
        if (!isset($result["status"]) || $result["status"] != 200) {
            // Request failed, log the details and return an error response
            return response()->json(['error' => 'Post request failed', 'details' => $result], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // Extract the task ID from the response
        $task_id = $result["data"]["task_id"];

        for ($i = 1; $i <= 30; $i++) {
            if ($i != 1) {
                sleep(1);
            }
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://techhk.aoscdn.com/api/tasks/visual/segmentation/".$task_id);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "X-API-KEY: wxy1eatufgkzork6s",

            ));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            $result = curl_errno($curl) ? curl_error($curl) : $response;
            curl_close($curl);
            var_dump($result);
            $result = json_decode($result, true);
            if (!isset($result["status"]) || $result["status"] != 200) {
                Session::flash('image', $result["data"]["image"]);
                return view('tolls', ['data' => $result["data"]["image"]]);
                //var_dump($result);
                //continue;
            }
            if ($result["data"]["state"] == 1) {
                //echo "here1";
                Session::flash('image', $result["data"]["image"]);
                return redirect('tolls')->with($result["data"]["image"]);
                //var_dump($result);
                //break;
            } else if ($result["data"]["state"] < 0) {
                // request failed, log the details
                //Session::flash('image', $result["data"]["image"]);
                //return redirect('tolls')->with($result["data"]["image"]);
                //var_dump($result);
                //break;
            } else {
                // Task processing
                if ($i == 30) {
                    //Task processing, abnormal situation, seeking assistance from customer service of picwish
                }
            }
        }
    }

    public function enhanceimage(Request $request){
        $image_file_path = $request->file('image_file')->store('public/uploads');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://techhk.aoscdn.com/api/tasks/visual/scale');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "X-API-KEY: wxy1eatufgkzork6s",
            "Content-Type: multipart/form-data",
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array('sync' => 0, 'image_file' => new  \CURLFile(storage_path('app/' . $image_file_path))));
        $response = curl_exec($curl);
        $result = curl_errno($curl) ? curl_error($curl) : $response;
        curl_close($curl);
        $result = json_decode($result, true);
        if ( !isset($result["status"]) || $result["status"] != 200 ) {
            // request failed, log the details
            Session::flash('image', $result["data"]["image"]);
            return redirect('tolls')->with($result["data"]["image"]);
            //die("post request failed");
        }
//  var_dump($result);
        $task_id = $result["data"]["task_id"];


//get the task result
// 1、"The polling interval is set to 1 second."
//2 "The polling time is around 30 seconds."
        for ($i = 1; $i <= 30; $i++) {
            if ($i != 1) {
                sleep(1);
            }
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://techhk.aoscdn.com/api/tasks/visual/scale/".$task_id);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "X-API-KEY: wxy1eatufgkzork6s",
            ));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            $result = curl_errno($curl) ? curl_error($curl) : $response;
            curl_close($curl);
            var_dump($result);
            $result = json_decode($result, true);
            if ( !isset($result["status"]) || $result["status"] != 200 ) {
                // Task exception, logging the error.
                //You can choose to continue the loop with 'continue' or break the loop with 'break'
                Session::flash('image', $result["data"]["image"]);
                return redirect('tolls')->with($result["data"]["image"]);
                //continue;
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                Session::flash('enhance_image', $result["data"]["image"]);
                return redirect('tolls');
               // break;
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                Session::flash('enhance_image', $result["data"]["image"]);
                return redirect('tolls');
                //var_dump($result);
                //break;
            } else {
                // Task processing
                if ($i == 30) {
                    //Task processing, abnormal situation, seeking assistance from customer service of picwish
                }
            }
        }
    }
    public function unwanted(){
        return view('removeunwanted');
    }
    public function ObjectRemover(Request $request)
    {
        $image_file_path = $request->file('image_file')->store('public/uploads');
        $rectangles=$request->rectangles;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://techhk.aoscdn.com/api/tasks/visual/inpaint',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('sync' => '1','image_file' => new  \CURLFile(storage_path('app/' . $image_file_path)),'rectangles' => $rectangles),
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: wxy1eatufgkzork6s'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $responseData = json_decode($response, true);
        Session::flash('object_removed', $responseData["data"]["image"]);
        return redirect()->back();
    }
    public function GenerateBackGroundImage(Request $request)
    {


        $image_file_path = $request->file('image_file')->store('/public/uploads');
        $prompt =$request->prompt;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://techhk.aoscdn.com/api/tasks/visual/background');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "X-API-KEY: wxy1eatufgkzork6s",
            "Content-Type: multipart/form-data"
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array('sync' => 0,'scene_type' => 2, 'image_file' => new  \CURLFile(storage_path('app/' . $image_file_path)),'prompt'=>$prompt));
        $response = curl_exec($curl);
        $result = curl_errno($curl) ? curl_error($curl) : $response;
        curl_close($curl);
        $result = json_decode($result, true);
        if ( !isset($result["status"]) || $result["status"] != 200 ) {
            // request failed, log the details
            var_dump($result);
            die("post request failed");
        }
//  var_dump($result);
        $task_id = $result["data"]["task_id"];


//get the task result
// 1、"The polling interval is set to 1 second."
//2 "The polling time is around 300 seconds."
        for ($i = 1; $i <= 300; $i++) {
            if ($i != 1) {
                sleep(1);
            }
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://techhk.aoscdn.com/api/tasks/visual/background/".$task_id);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "X-API-KEY: wxy1eatufgkzork6s",

            ));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            $result = curl_errno($curl) ? curl_error($curl) : $response;
            curl_close($curl);
            var_dump($result);
            $result = json_decode($result, true);
            if ( !isset($result["status"]) || $result["status"] != 200 ) {
                // Task exception, logging the error.
                //You can choose to continue the loop with 'continue' or break the loop with 'break'
                Session::flash('Generated_background_1', $result["data"]["image_1"]);
                Session::flash('Generated_background_2', $result["data"]["image_2"]);
                return redirect('tolls');
                //var_dump($result);
                //continue;
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                Session::flash('Generated_background_1', $result["data"]["image_1"]);
                Session::flash('Generated_background_2', $result["data"]["image_2"]);
                return redirect('tolls');
//                var_dump($result["data"]["image_1"]);
//                break;
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                Session::flash('Generated_background_1', $result["data"]["image_1"]);
                Session::flash('Generated_background_2', $result["data"]["image_2"]);
                return redirect('tolls');
//                var_dump($result);
//                break;
            } else {
                // Task processing
                if ($i == 300) {
                    //Task processing, abnormal situation, seeking assistance from customer service of picwish
                }
            }
        }
    }

    public function idphotoGenerator(Request $request){
        $image_file_path = $request->file('image_file')->store('/public/uploads');
        $bg_color =$request->bg_color;
        $size =$request->size;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://techhk.aoscdn.com/api/tasks/visual/idphoto');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "X-API-KEY: wxy1eatufgkzork6s",
            "Content-Type: multipart/form-data",
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array('format'=>'jpg','size'=> $size,'bg_color'=>$bg_color,'sync' => 0, 'image_file' => new  \CURLFile(storage_path('app/' . $image_file_path))));
        $response = curl_exec($curl);
        $result = curl_errno($curl) ? curl_error($curl) : $response;
        curl_close($curl);
        $result = json_decode($result, true);
        if ( !isset($result["status"]) || $result["status"] != 200 ) {
            // request failed, log the details
            var_dump($result);
            die("post request failed");
        }
//  var_dump($result);
        $task_id = $result["data"]["task_id"];


//get the task result
// 1、"The polling interval is set to 1 second."
//2 "The polling time is around 30 seconds."
        for ($i = 1; $i <= 30; $i++) {
            if ($i != 1) {
                sleep(1);
            }
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://techhk.aoscdn.com/api/tasks/visual/idphoto/".$task_id);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "X-API-KEY: wxy1eatufgkzork6s",

            ));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            $result = curl_errno($curl) ? curl_error($curl) : $response;
            curl_close($curl);
            var_dump($result);
            $result = json_decode($result, true);
            if ( !isset($result["status"]) || $result["status"] != 200 ) {
                // Task exception, logging the error.
                //You can choose to continue the loop with 'continue' or break the loop with 'break'
                Session::flash('id_image', $result["data"]["image"]);
                return redirect('tolls');
//                var_dump($result);
//                continue;
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                Session::flash('id_image', $result["data"]["image"]);
                return redirect('tolls');
//                var_dump($result["data"]["image"]);
//                break;
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                Session::flash('id_image', $result["data"]["image"]);
                return redirect('tolls');
//                var_dump($result);
//                break;
            } else {
                // Task processing
                if ($i == 30) {
                    //Task processing, abnormal situation, seeking assistance from customer service of picwish
                }
            }
        }
    }
}
