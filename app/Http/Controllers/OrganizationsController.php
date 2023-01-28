<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Category;
use App\Models\Organization;

class OrganizationsController extends Controller
{
    public function index()
    {
        return view('organizations.index',['organizations'=>Organization::all()]);
    }
    public function organization($id)
    {
        /*$event_inscriptos = EventInscripto::where('event_id',$id)->get();*/
        $organizadores = DB::table('organizers')->select(['organizers.organization_id','users.name as name', 'organizers.user_id', 'users.email as email'])
            ->join('users','users.id','=','organizers.user_id')->where('organization_id',$id)->get();
        $categories = Category::where('event_id',$id)->get();
        return view('organizations.detail',['organization'=>Organization::find($id),'organizadores'=>$organizadores]);
    }
    public function new_organization()
    {
        return view('organizations.create');
    }
    public function create_organization(Request $request)
    {
        // hacer validaciones
        $input = $request->all();
        $organization = array(
            'name'=>$input["name"],
            'website'=>$input["website"],
            'fb_page'=>$input["fb_page"],
            'ig_page'=>$input["ig_page"],
            'user_id'=>1,
            );
        // falta user_id(contacto principal)
        DB::table('organizations')->insert($organization);
        return redirect()->route('admin.organizations');
        
    }
    public function edit_organization($id)
    {
        return view('organizations.edit',['organization'=>Organization::find($id)]);
    }
    public function update_organization(Request $request)
    {
        // hacer validaciones
        $input = $request->all();
        $id=$input['id'];
        $organization = array(
            'name'=>$input["name"],
            'website'=>$input["website"],
            'fb_page'=>$input["fb_page"],
            'ig_page'=>$input["ig_page"],
        );
        // falta main image, featured event, user creador
        DB::table('organizations')->where('id',$id)->update($organization);
        return redirect()->route('admin.organization', ['id'=>$id]);
        
    }
}
