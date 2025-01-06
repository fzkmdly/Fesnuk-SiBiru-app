<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $status = session()->get('status') ?? 'OFF';

        return view('LampSwitch', [
            'status' => $status,
        ]);
    }

    public function toggle()
    {
        $status = session()->get('status') === 'ON' ? 'OFF' : 'ON';
        session()->set('status', $status);

        return redirect()->to('/');
    }
}
