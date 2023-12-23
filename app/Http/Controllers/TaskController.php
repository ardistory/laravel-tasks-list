<?php

namespace App\Http\Controllers;

use App\Models\Task;
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
            Task::query()->create([
                'list' => $newTask
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

        $nameTaskYouWantDelete = Task::query()->where('id', '=', $idTask)->get();
        session()->flash('deleted', "{$nameTaskYouWantDelete[0]->list} deleted!");

        Task::query()->where('id', '=', $idTask)->delete();

        return redirect()->action([TaskController::class, 'home']);
    }

    public function getEdit(Request $request)
    {
        $idEdit = $request->get('id');

        return view('edit', [
            'bahanEdit' => Task::query()->where('id', '=', $idEdit)->get()
        ]);
    }

    public function postEdit(Request $request)
    {
        $idStore = $request->get('id');
        $taskBefore = Task::query()->where('id', '=', $idStore)->get();

        $newEditedList = $request->post('task');

        Task::query()->find($idStore)->update([
            'list' => $newEditedList
        ]);

        session()->flash('edited', "{$taskBefore[0]->list} > {$newEditedList}");

        return redirect('/');
    }

    public function postChecked(Request $request)
    {
        $idList = $request->post('id');

        Task::query()->find($idList)->update([
            'mark' => true
        ]);

        $namaListChecked = Task::query()->where('id', '=', $idList)->get('list');

        session()->flash('checked', "{$namaListChecked[0]->list} checked");

        return redirect('/');
    }

    public function postUnchecked(Request $request)
    {
        $idList = $request->post('id');

        Task::query()->find($idList)->update([
            'mark' => false
        ]);

        $namaListChecked = Task::query()->where('id', '=', $idList)->get('list');

        session()->flash('unchecked', "{$namaListChecked[0]->list} unchecked");

        return redirect('/');
    }
}
