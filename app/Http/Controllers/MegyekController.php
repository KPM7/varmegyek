<?php

namespace App\Http\Controllers;
use App\Models\Megyek;

use Illuminate\Http\Request;

class MegyekController extends Controller
{
    public function index()
    {
        return view('megyek/list', ['entities' =>
            Megyek::where('is_active', true)->orderBy('name')->get()]);
    }

    public function create() {
        return view('megyek/create');
    }

    public function edit($id) {
        $entity = Megyek::find($id);

        return view('megyek/edit', ['entity' => $entity]);
    }

    public function update(Request $request, $id)
    {
        if ($id) {
            /** @var Megyek $entity */
            $entity = Megyek::find($id);
        }
        if (!$entity) {
            abort(404);
        }
        $entity = $this->setEntityData($entity, $request);
        $entity->update();

        return redirect(route('varmegye') . '#' . $entity->id);
    }

    public function delete(Request $request, $id)
    {
        /** @var Megyek $entity */
        $entity = Megyek::find($id);
        $entity->is_active = false;
        $entity->save();

        return redirect(route('varmegye'));
    }

    public function save(Request $request)
    {
        $entity = new Megyek();
        $entity = $this->setEntityData($entity, $request);
        $entity->save();

        return redirect(route('varmegye') . '#' . $entity->id);
    }

    private function setEntityData(Megyek $entity, Request $request): ?Megyek
    {
        $entity->name = $request->get('name');

        return $entity;
    }

    private function getQuery()
    {
        return Megyek::select('*');
    }

    public function search(Request $request) {
        $needle = $request->get('needle');
        $entities = $this->getQuery()
            ->orWhere('name', 'like', "%{$needle}%")
            ->where('is_active', true)
            ->orderBy('name')
            ->get();
        if (!$entities) {
            return view('404');
        }

        return view('megyek/list', ['entities' => $entities]);
    }
}
