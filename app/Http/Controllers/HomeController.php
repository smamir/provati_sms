<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;

class HomeController extends Controller
{
    protected $user;
    protected $myClass;
    public function __construct(UserRepo $user, MyClassRepo $myClass)
    {
        $this->user = $user;
        $this->myClass = $myClass;
    }


    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function privacy_policy()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.privacy_policy', $data);
    }

    public function terms_of_use()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.terms_of_use', $data);
    }

    public function dashboard()
    {
        $d=[];
        if(Qs::userIsTeamSAT()){
            $d['users'] = $this->user->getAll();
            $d['classes'] = $this->myClass->getClassCount();
            $d['sections'] = $this->myClass->getSectionCount();
        }

        return view('pages.support_team.dashboard', $d);
    }
}
