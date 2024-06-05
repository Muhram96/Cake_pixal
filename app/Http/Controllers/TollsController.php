<?php

namespace App\Http\Controllers;

use App\Models\GuestCreditHistory;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\CreditHistory;
use App\Models\Tool;
use App\Models\Guest;
use App\Models\UserCreditHistory;
use Carbon\Carbon;
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
        if(!auth()->check()){
            $status= $this->checkIpForGuest($request, $request->tool_id);
            if($status==''){
                return response()->json(['error' => 'Not enough tokens. Please Register!'], Response::HTTP_FORBIDDEN);
            }

        }elseif(!$this->checkLimit($request, $request->tool_id)) {
            return response()->json(['error' => 'Not enough tokens'], Response::HTTP_FORBIDDEN);
        }
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
                return redirect()->back();
                //var_dump($result);
                //continue;
            }
            if ($result["data"]["state"] == 1) {
                //echo "here1";
                Session::flash('image', $result["data"]["image"]);
                return redirect()->back();
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
            Session::flash('enhance_image', $result["data"]["image"]);
            return redirect()->back();
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
                Session::flash('enhance_image', $result["data"]["image"]);
                return redirect()->back();
                //continue;
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                Session::flash('enhance_image', $result["data"]["image"]);
                return redirect()->back();
               // break;
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                Session::flash('enhance_image', $result["data"]["image"]);
                return redirect()->back();
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
                return redirect()->back();
                //var_dump($result);
                //continue;
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                Session::flash('Generated_background_1', $result["data"]["image_1"]);
                Session::flash('Generated_background_2', $result["data"]["image_2"]);
                return redirect()->back();
//                var_dump($result["data"]["image_1"]);
//                break;
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                Session::flash('error', 'something went wrong');
                return redirect()->back();
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
                return redirect()->back();
//                var_dump($result);
//                continue;
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                Session::flash('id_image', $result["data"]["image"]);
                return redirect()->back();
//                var_dump($result["data"]["image"]);
//                break;
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                Session::flash('error', 'something went wrong');
                return redirect()->back();
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

    public function ColorImageGenerator(Request $request){

        $image_file_path = $request->file('image_file')->store('/public/uploads');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://techhk.aoscdn.com/api/tasks/visual/colorization');
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
            curl_setopt($curl, CURLOPT_URL, "https://techhk.aoscdn.com/api/tasks/visual/colorization/".$task_id);
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
                //var_dump($result);
                //continue;
                Session::flash('color_image', $result["data"]["image"]);
                return redirect()->back();
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                //var_dump($result["data"]["image"]);
                //break;
                Session::flash('color_image', $result["data"]["image"]);
                return redirect()->back();
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                //var_dump($result);
                //break;
                Session::flash('error', 'something went wrong');
                return redirect()->back();
            } else {
                // Task processing
                if ($i == 30) {
                    //Task processing, abnormal situation, seeking assistance from customer service of picwish
                }
            }
        }
    }

    public function CompressedImageGenerator(Request $request){
        $image_file_path = $request->file('image_file')->store('/public/uploads');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://techhk.aoscdn.com/api/tasks/visual/imgcompress');
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
            curl_setopt($curl, CURLOPT_URL, "https://techhk.aoscdn.com/api/tasks/visual/imgcompress/".$task_id);
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
                //var_dump($result);
                //continue;
                Session::flash('compressed_image', $result["data"]["image"]);
                return redirect()->back();
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                //var_dump($result["data"]["image"]);
                //break;
                Session::flash('compressed_image', $result["data"]["image"]);
                return redirect()->back();
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                //var_dump($result);
                //break;
                Session::flash('error', 'something went wrong');
                return redirect()->back();
            } else {
                // Task processing
                if ($i == 30) {
                    //Task processing, abnormal situation, seeking assistance from customer service of picwish
                }
            }
        }
    }

    public function CropEnhancedImageGenerator(Request $request){
        $image_file_path = $request->file('image_file')->store('/public/uploads');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://techhk.aoscdn.com/api/tasks/visual/correction');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "X-API-KEY: wxy1eatufgkzork6s",
            "Content-Type: multipart/form-data",
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array('sync' => 0,'type'=>2, 'image_file' => new  \CURLFile(storage_path('app/' . $image_file_path))));
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
            curl_setopt($curl, CURLOPT_URL, "https://techhk.aoscdn.com/api/tasks/visual/correction/".$task_id);
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
                //var_dump($result);
                //continue;
                Session::flash('crop_image', $result["data"]["image"]);
                return redirect()->back();
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                //var_dump($result["data"]["image"]);
                //break;
                Session::flash('crop_image', $result["data"]["image"]);
                return redirect()->back();
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                //var_dump($result);
               // break;
                Session::flash('error', 'something went wrong');
                return redirect('tolls');
            } else {
                // Task processing
                if ($i == 30) {
                    //Task processing, abnormal situation, seeking assistance from customer service of picwish
                }
            }
        }
    }

    public function OCRImageGenerator(Request $request){
        $image_file_path = $request->file('image_file')->store('/public/uploads');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://techhk.aoscdn.com/api/tasks/document/ocr');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "X-API-KEY: wxy1eatufgkzork6s",
            "Content-Type: multipart/form-data",
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array('sync' => 0,'format' => "txt", 'image_file' => new  \CURLFile(storage_path('app/' . $image_file_path))));
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
        //2 "The polling time is around 120 seconds."
        for ($i = 1; $i <= 120; $i++) {
            if ($i != 1) {
                sleep(1);
            }
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, "https://techhk.aoscdn.com/api/tasks/document/ocr/".$task_id);
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
                //var_dump($result);
                //continue;
                Session::flash('ocr_image', $result["data"]["file"]);
                return redirect('tolls');
            }
            if ( $result["data"]["state"] == 1 ) {
                // task success
                //var_dump($result["data"]["file"]);
                //break;
                Session::flash('ocr_image', $result["data"]["file"]);
                return redirect('tolls');
            } else if ( $result["data"]["state"] < 0) {
                // request failed, log the details
                //var_dump($result);
                //break;
                Session::flash('ocr_image', $result["data"]["file"]);
                return redirect('tolls');
            } else {
                // Task processing
                if ($i == 120) {
                    //Task processing, abnormal situation, seeking assistance from customer service of picwish
                }
            }
        }
    }

    public function checkLimit(Request $request, int $tool_id)
    {

        $user_id = Auth::id();
        $tool = Tool::find($tool_id);


        if (!$tool) {
            return response()->json(['error' => 'Tool not found'], 404);
        }


        $tool_token = $tool->token_req;
         $totalCreditsConsumed = $this->getCreditConsumedSum($user_id);
         $totalRemainingCredits = $this->getRemainCreditdSum($user_id);

         $creditBalance = $totalRemainingCredits - $totalCreditsConsumed;
         $requestprocess =$creditBalance - $tool_token;

        if ($requestprocess >= 0) {

            $usedCreditHistory = CreditHistory::create([
                'user_id' => $user_id,
                'tool_id' => $tool_id,
                'token_consumed' => $tool_token,
            ]);

            return true;
        }

        return false;
    }

    public function checkIpForGuest(Request $request, int $tool_id)
    {

        $sessionIp = $request->ip();
        $tool = Tool::find($tool_id);
        $tool_token = $tool->token_req;
        $totalCreditsConsumed = $this->getCreditConsumedSum($sessionIp);
        $totalRemainingCredits = $this->getRemainCreditdSum($sessionIp);
        $creditBalance = $totalRemainingCredits - $totalCreditsConsumed;
        $requestprocess =$creditBalance - $tool_token;

        if ($requestprocess >= 0) {
            $guest = GuestCreditHistory::create([
                'tool_id' => $tool_token,
                'ip_address' => $sessionIp,
                'credit_consumed' =>  $tool_token,
            ]);

            return true;
        }else {
            return false;
        }
    }

    public function getCreditConsumedSum($user_id)
    {
        if(!Auth::check()){
            $creditHistoryExists = GuestCreditHistory::where('ip_address', $user_id)->exists();
            if (!$creditHistoryExists) {
                return 0;
            }
            return GuestCreditHistory::where('ip_address', $user_id)->sum('credit_consumed');
        }
        $creditHistoryExists = CreditHistory::where('user_id', $user_id)->exists();
        if (!$creditHistoryExists) {
            return 0;
        }
        return CreditHistory::where('user_id', $user_id)->sum('token_consumed');
    }

    public function getRemainCreditdSum($user_id)
    {
        if(!Auth::check()){
            return Guest::where('ip_address', $user_id)
                ->sum('credit_balance');
        }
        $now = Carbon::now();
        return UserCreditHistory::where('user_id', $user_id)
            ->where('expiry_date', '>', $now)
            ->sum('credit_buy');

    }

}
