<?php
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 9/20/16
 * Time: 11:26 AM
 */

namespace App\Classes\websystem\settings\clients;


use App\Http\Requests\newIdsRequest;
use App\ids;
use Illuminate\Http\Request;

class idsClass
{
    public function allIds()
    {
        $ids = ids::get();
        return view('settings.clients.ids.ids', compact('ids'));
    }

    public function saveNewIds(newIdsRequest $request)
    {
        ids::create([
           'name' => $request->name,
            'isAccepted' => $request->isAccepted
        ]);
        return redirect()->route('settings.clients.ids');
    }

    public function deleteIds($id)
    {
        $id = ids::whereId($id)->first();
        $id->delete();
        return redirect()->route('settings.clients.ids');
    }

    public function editId($name)
    {
        $id = ids::whereName($name)->first();
        return view('settings.clients.ids.editId', compact('id'));
    }

    public function updateId(Request $request, $id)
    {
        $input = $request->all();
        $id = ids::whereId($id)->first();
        $id->fill($input);
        $id->save();
        return redirect()->route('settings.clients.ids');
    }
}