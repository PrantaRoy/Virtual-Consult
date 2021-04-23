<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Image;

class SettingController extends Controller
{
    public function index(){

        $page_title = 'All Setting';
        return view('admin.setting.index',compact('page_title'));
    }
    public function general (){
        $page_title = 'General  Setting';
        $general_setting = GeneralSetting::first();
        return view('admin.setting.general',compact('page_title','general_setting'));
    }
    public function generalSave(Request $request){


        $validation_rule = [
            'bclr' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'],
            'sclr' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'],
        ];
        $request->validate([
            'logo' => 'image|mimes:jpg,jpeg,png',
            'favicon' => 'image|mimes:png',
            'sitename' => 'required|max:191',
            'sitetitle' => 'required|max:191',
            'cur_text' => 'required|max:40',
            'cur_sym' => 'required|max:10',
        ]);

        $custom_attribute = [
            'bclr' => 'Base color',
            'sclr' => 'Secondary Color',
        ];
        $validator = Validator::make($request->all(), $validation_rule, [], $custom_attribute);
        $validator->validate();

        $gs = GeneralSetting::first();
        if ($request->hasFile('logo')) {
            try {
                $path = config('constants.logoIcon.path');
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                Image::make($request->logo)->save($path . '/logo.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Logo could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        if ($request->hasFile('favicon')) {
            try {
                $path = config('constants.logoIcon.path');
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                $size = explode('x', config('constants.favicon.size'));
                Image::make($request->favicon)->resize($size[0], $size[1])->save($path . '/favicon.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Favicon could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }
        $gs->sitename = $request->sitename;
        $gs->sitetitle = $request->sitetitle;
        $gs->cur_text  = $request->cur_text ;
        $gs->cur_sym  = $request->cur_sym ;
        $gs->bclr  = $request->bclr ;
        $gs->sclr  = $request->sclr ;
        $gs->save();

        $notify[] = ['success', 'General Setting has been updated.'];
        return back()->withNotify($notify);


    }
    public function seo (){
        $page_title = 'Seo  Setting';
        $seo = GeneralSetting::first();
        return view('admin.setting.seo',compact('page_title','seo'));
    }

    public function seoUpdate(Request $request){

        $seo = GeneralSetting::first();
        $seo->seo_keywords = $request->seo_keywords;
        $seo->social_title = $request->social_title;
        $seo->social_desc = $request->social_desc;
        $seo->seo_meta = $request->seo_meta;
        $seo->save();
        $notify[] = ['success', 'Seo Setting has been updated.'];
        return back()->withNotify($notify);
    }

    public function email (){
        $page_title = 'Email  Setting';
        $emailTemp = GeneralSetting::first();
        return view('admin.setting.email',compact('page_title','emailTemp'));
    }

    public function emailTemplateUpdate(Request $request)
    {
        $request->validate([
            'efrom' => 'required|email',
        ]);

        $general_setting = GeneralSetting::first();
        $general_setting->update([
            'efrom' => $request->efrom,
            'etemp' => $request->etemp,
        ]);

        $notify[] = ['success', 'Global Email Template has been updated.'];
        return back()->withNotify($notify);
    }

    public function system (){

        $page_title = 'System  Setting';
        $gs = GeneralSetting::first();
        return view('admin.setting.system',compact('page_title','gs'));
    }
    public function systemUpdate(Request $request){

        $gs = GeneralSetting::first();
        $gs->ev = $request->ev ? 1 : 0;
        $gs->en = $request->en ? 1 : 0;
        $gs->reg = $request->reg ? 1 : 0;
        $gs->alert = $request->alert;
        $gs->save();
        $notify[] = ['success', 'General Setting has been updated.'];
        return back()->withNotify($notify);

    }

    public function security (){
        $page_title = 'Security  Setting';
        return view('admin.setting.security',compact('page_title'));
    }
    public function automation (){
        $page_title = 'Automation  Setting';
        return view('admin.setting.automation',compact('page_title'));
    }
}
