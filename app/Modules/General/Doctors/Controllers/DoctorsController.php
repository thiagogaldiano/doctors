<?php
namespace App\Modules\General\Doctors\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\Doctors\Repositories\DoctorsRepository;

class DoctorsController extends Controller
{
    private $doctorsRepository;

    function __construct(DoctorsRepository $doctorsRepository ){
        $this->doctorsRepository = $doctorsRepository;
    }

    public function index(Request $request){
        try {
            $data =  $this->doctorsRepository->index($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 401);
        }
    }

    public function show($id){
        try {
            $data = $this->doctorsRepository->show($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function store(Request $request){
        try {
            $data = $this->doctorsRepository->store($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "code" => $e->getCode(),
                "text "=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function update(Request $request, $id){
        try {
            $data = $this->doctorsRepository->update($request, $id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message" => "Error, try again!",
                 "code" => $e->getCode(),
                "text" =>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function destroy($id){
        try {
            $data = $this->doctorsRepository->destroy($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

}