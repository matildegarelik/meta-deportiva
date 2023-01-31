<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Category;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Organizer;

class OrganizationsController extends Controller
{
    public function index()
    {
        return view('organizations.index',['organizations'=>Organization::all()]);
    }
    public function organization($id)
    {
        /*$event_inscriptos = EventInscripto::where('event_id',$id)->get();*/
        $organizadores = DB::table('organizers')->select(['organizers.organization_id','users.name as name', 'organizers.user_id', 'users.email as email', 'organizers.id'])
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
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role'=>1
        ]);
        $organization = Organization::create(array(
            'name'=>$input["org_name"],
            'website'=>$input["website"],
            'fb_page'=>$input["fb_page"],
            'ig_page'=>$input["ig_page"],
            'user_id'=>$user->id,
            ));
        $organizer = Organizer::create([
            'user_id'=>$user->id,
            'organization_id'=>$organization->id
        ]);
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
            'user_id'=>$input["contacto_principal"],
        );
        // falta main image, featured event, user creador
        DB::table('organizations')->where('id',$id)->update($organization);
        return redirect()->route('admin.organization', ['id'=>$id]);
        
    }
    public function delete_organization($id){
        Organizer::where('organization_id',$id)->delete();
        return Organization::destroy($id);
    }
    public function create_organizer(Request $request)
    {
        // hacer validaciones
        $input = $request->all();
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role'=>1
        ]);
        $organizer = Organizer::create([
            'user_id'=>$user->id,
            'organization_id'=>$input['organization']
        ]);
        return redirect()->route('admin.organization', ['id'=>$input['organization']]);
    }
}
