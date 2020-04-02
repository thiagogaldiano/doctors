<?php
namespace App\Modules\General\Doctors\Repositories;
use App\Modules\General\Doctors\Models\Doctors;
use App\Modules\General\Doctors\Repositories\DoctorsSearchRepository;
use Validator;
use Illuminate\Http\Request;

class DoctorsRepository
{
    private $doctorsSearchRepository;
    function __construct(DoctorsSearchRepository $doctorsSearchRepository){
        $this->doctorsSearchRepository = $doctorsSearchRepository;
    }

    public function index(Request $request){
        return $this->doctorsSearchRepository->search(Doctors::with([]), $request);
    }

    public function show($id){
    	return Doctors::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "name"=>"required",
            "email"=>"required",
            "address"=>"required",
            "city"=>"required",
            "state"=>"required",
            "cep"=>"required",
            "specialty_id"=>"required",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "name"=>$request->name,
            "email"=>$request->email,
            "address"=>$request->address,
            "city"=>$request->city,
            "state"=>$request->state,
            "cep"=>$request->cep,
            "specialty_id"=>$request->specialty_id,
            ];
            return Doctors::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "name"=>"required",
            "email"=>"required",
            "address"=>"required",
            "city"=>"required",
            "state"=>"required",
            "cep"=>"required",
            "specialty_id"=>"required",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "name"=>$request->name,
            "email"=>$request->email,
            "address"=>$request->address,
            "city"=>$request->city,
            "state"=>$request->state,
            "cep"=>$request->cep,
            "specialty_id"=>$request->specialty_id,
            ];
            return Doctors::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return Doctors::where(["id"=>$id])->delete();
    }

}