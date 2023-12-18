<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function home(): View
    {
        return view('home', ['tasks' => DB::table('tasks')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $newTask = $request->post('task');

        DB::table('tasks')->insert([
            'list' => $newTask
        ]);

        return redirect()->action([TaskController::class, 'home']);
    }

    public function delete(Request $request)
    {
        $idTask = $request->post('id');

        DB::table('tasks')->where('id', '=', $idTask)->delete();

        return redirect()->action([TaskController::class, 'home']);
    }

    public function getEdit(Request $request)
    {
        $idEdit = $request->get('id');

        return view('edit', [
            'bahanEdit' => DB::table('tasks')->where('id', '=', $idEdit)->get()
        ]);
    }

    public function postEdit(Request $request)
    {
        $idStore = $request->get('id');
        $newEditedList = $request->post('task');

        DB::table('tasks')->where('id', '=', $idStore)->update([
            'list' => $newEditedList
        ]);

        return redirect()->action([TaskController::class, 'home']);
    }
}
