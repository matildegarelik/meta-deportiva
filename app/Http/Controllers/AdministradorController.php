<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Category;
use App\Models\Organization;
use App\Models\Clasification;
use App\Models\ExtraPage;

use DB;
use ImageOptimizer;

class AdministradorController extends Controller
{
    protected function updateDotEnv($key, $newValue, $delim='')
    {

        $path = base_path('.env');
        // get old value from current env
        $oldValue = env($key);

        // was there any change?
        if ($oldValue === $newValue) {
            return;
        }

        // rewrite file content with changed data
        if (file_exists($path)) {
            // replace current value with new value 
            file_put_contents(
                $path, str_replace(
                    $key.'='.$delim.$oldValue.$delim, 
                    $key.'='.$delim.$newValue.$delim, 
                    file_get_contents($path)
                )
            );
        }
    }
    public function index()
    {
        $total_events = count(Event::all());
        $total_participantes = count(User::where('role',1)->get());
        $total_org = count(Organization::all());
        return view('administrador.index', compact('total_events', 'total_participantes','total_org'));
    }

    public function users()
    {
        return view('administrador.users',['users'=>User::all()]);
    }

    public function index_frontend()
    {
        $clasifications = Clasification::all();
        $extra_pages = ExtraPage::all();
        return view('administrador.frontend', compact('clasifications','extra_pages'));
    }

    public function update_frontend(Request $request)
    {
        $this->updateDotEnv('COLOR', substr($request->color,1));
        $this->updateDotEnv('OPACITY', $request->opacity);
        $this->updateDotEnv('TITULO', $request->titulo,'"');
        $this->updateDotEnv('SUBTITULO',$request->subtitulo,'"');
        $this->updateDotEnv('UBICACION', $request->ubicacion,'"');
        if(isset($request->logo)){
            $logoName = 'logo.'.$request->logo->extension();
            $request->logo->move(public_path('images/main/'), $logoName);
            $this->updateDotEnv('IMG_LOGO', $logoName);
            ImageOptimizer::optimize(public_path('images/main/').$logoName);
        }
        if(isset($request->notice)){
            $noticeName = 'notice.'.$request->notice->extension();
            $request->notice->move(public_path(), $noticeName);
        }
        if(isset($request->img1)){
            $img1Name = 'img1.'.$request->img1->extension();
            $request->img1->move(public_path('images/main/'), $img1Name);
            $this->updateDotEnv('IMG_1', $img1Name);
            ImageOptimizer::optimize(public_path('images/main/').$img1Name);
        }
        if(isset($request->img2)){
            $img2Name = 'img2.'.$request->img2->extension();
            $request->img2->move(public_path('images/main/'), $img2Name);
            $this->updateDotEnv('IMG_2', $img2Name);
            ImageOptimizer::optimize(public_path('images/main/').$img2Name);
        }
        if(isset($request->img3)){
            $img3Name = 'img3.'.$request->img3->extension();
            $request->img3->move(public_path('images/main/'), $img3Name);
            $this->updateDotEnv('IMG_3', $img3Name);
            ImageOptimizer::optimize(public_path('images/main/').$img3Name);
        }
        if(isset($request->img4)){
            $img4Name = 'img4.'.$request->img4->extension();
            $request->img4->move(public_path('images/main/'), $img4Name);
            $this->updateDotEnv('IMG_4', $img4Name);
            ImageOptimizer::optimize(public_path('images/main/').$img4Name);
        }
        $clasifications = Clasification::all();
        $input = $request->all();
        foreach($clasifications as $clasif){
            if(isset($input['clasif_'.$clasif->id])){
                $imgName = $clasif->name.'.'.$input['clasif_'.$clasif->id]->extension();
                $input['clasif_'.$clasif->id]->move(public_path('images/main/clasifications/'), $imgName);
                $clasif->image= $imgName;
                $clasif->save();
            }
        }
        return redirect()->route('admin.frontend');
    }

    public function new_page(Request $request)
    {
        $request->validate([
            'nombre'=>'required|unique:extra_pages',
            'content'=>'required'
        ]);
        $input = $request->all();
        $imageName=null;
        if(isset($input['image'])){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/extra_pages/'), $imageName);
            ImageOptimizer::optimize(public_path('images/extra_pages/'). $imageName);
        }
        $page = ExtraPage::create([
            'nombre'=>$input['nombre'],
            'content'=>$input['content'],
            'menu'=>isset($input['menu']),
            'image'=>$imageName
        ]);
        return redirect()->route('admin.frontend');

    }
    public function update_page(Request $request)
    {
        $request->validate([
            'contenido'=>'required'
        ]);
        $input = $request->all();
        $page= ExtraPage::find($request->id);
        $imageName=$page->image;
        if(isset($input['image'])){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/extra_pages/'), $imageName);
            ImageOptimizer::optimize(public_path('images/extra_pages/'). $imageName);
        }
        $page = ExtraPage::where('id',$request->id)->update([
            'nombre'=>$input['nombre'],
            'content'=>$input['contenido'],
            'menu'=>isset($input['menu']),
            'image'=>$imageName
        ]);
        $page= ExtraPage::find($request->id);
        return redirect()->route('admin.frontend');
    }
    public function delete_page($id){
        return ExtraPage::destroy($id);
    }
   
}
