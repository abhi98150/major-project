<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSettings;

class SiteSettingController extends Controller
{

public function index()  // for fetching................!!
{
  $sitesettings=SiteSettings::all();
  return view('backend.index',compact('sitesettings'));
}

public function create() // for create.............!!

  {
    return view('backend.create');
  }


public function store(Request $request){  //for store..................!!
    try{

          $image = '';
          if($request->image && $request->hasfile('image')){
         $file = $request->image;
          $filename = time().'-'.rand(1000,100000).'-'. $file->getClientOriginalName();
             $path = public_path().'/site_setting_upload'; 
           $file->move($path,$filename);
            $image = $filename;
          }
        

           // dd($data);

            SiteSettings::set('name',$request->name);
            SiteSettings::set('footer',$request->footer);
            SiteSettings::set('contact',$request->contact);
            SiteSettings::set('logo',$request->name);
            SiteSettings::set('email',$request->email);
            SiteSettings::set('slogan',$request->slogan);
            SiteSettings::set('image',$image);
        
            $request->session()->flash('success','Data inserted successfully');
            return redirect()->route('backend.index');
           

    }catch(\Exception $e){
        $request->session()->flash('error','somthing went wrong');
        return redirect()->route('backend.create');

    }

}


//;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
public function edit($id)  //for edit...............!!
{
  if(!$id)
  {
    return redirect()->back();
  }
  $sitesetting=sitesettings::find($id);
    if($sitesetting)
    {
   return view('backend.edit',compact('sitesetting'));
    }
    return redirect()->back();
  }


  public function delete($id)  // for deleted.....................!!
  {
      if(!$id)
      {
          return redirect()->back();
      }

      $sitesetting= SiteSettings::find($id);
      if($sitesetting)
      {
          $sitesetting->delete();
          return redirect()->back();
      }
      return redirect()->back();
  }




  public function update(Request $request, $id) // for update...............!!
  {
      if(!$id)
      {
          return redirect()->back();
      }
  
      $sitesetting = SiteSettings::find($id);
      if($sitesetting)
      {
          $data=[
              'key' => $request->get('key'),
              'value' => $request->get('value'),
  
          ];
          SiteSettings::where('id',$id)->update($data);
          return redirect()->route('backend.index');
      }
      return redirect()->back();
  }
  
  




}
