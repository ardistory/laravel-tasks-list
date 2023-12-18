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

        try {
            DB::table('tasks')->insert([
                'list' => $newTask,
                'created_at' => new \DateTime()
            ]);

            session()->flash('success', 'Adding task success!');

            return redirect()->action([TaskController::class, 'home']);
        } catch (\Exception $exception) {
            session()->flash('error', 'Insert failed!');

            return redirect('/');
        }


    }

    public function delete(Request $request)
    {
        $idTask = $request->post('id');

        $nameTaskYouWantDelete = DB::table('tasks')->where('id', '=', $idTask)->get();
        session()->flash('deleted', "task {$nameTaskYouWantDelete[0]->list} deleted!");

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
        $taskBefore = DB::table('tasks')->where('id', '=', $idStore)->get();

        $newEditedList = $request->post('task');

        DB::table('tasks')->where('id', '=', $idStore)->update([
            'list' => $newEditedList,
            'updated_at' => new \DateTime()
        ]);

        session()->flash('edited', "{$taskBefore[0]->list} > {$newEditedList}");

        return redirect('/');
    }
}
