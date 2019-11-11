<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileFolder;
use Exception;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class IndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $allFolders = FileFolder::all();

        return view('index', compact('allFolders'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $folder = FileFolder::findOrFail($id);
        $treeArray = json_decode($folder->folder_json, true);

        return view('edit', compact('folder', 'treeArray'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $requestData = $request->input('path');
            $folder = FileFolder::firstOrNew(
                ['folder_path'=>$requestData],
                ['folder_path' =>$requestData, 'folder_json' => $this->tree($requestData)]);

            $folder->save();

            return redirect(route('create'))->with('success', "Data saved successfully!");
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            $requestData = $request->all();
            $folder = FileFolder::findOrFail($id);
            $folder->folder_path = $requestData['f-path'];
            $folder->folder_json = $requestData['result'];
            $folder->save();

            return redirect(route('index'))->with('success', "Data saved successfully!");
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $tree = FileFolder::findOrFail($id);
        $treeArray = json_decode($tree->folder_json, true);

        return view('show', compact('treeArray', 'tree'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $tree = FileFolder::findOrFail($id);
            $tree->delete();

            return redirect(route('index'))->with('success', "Data deleted!");
        } catch (Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param $folder_path
     * @return false|string
     */
    private function tree($folder_path)
    {
        $pathToFile = new \RecursiveDirectoryIterator($folder_path);
        $iterations = new \RecursiveIteratorIterator($pathToFile);
        $treeArray = array();
        foreach ($iterations as $iteration) {
            $name = $iteration->getFilename();
            if ($name[0] === ".") continue;
            $dir = $iteration->isDir();
            if ($dir) {
                $dir = array($name => array());
            } else $dir = array($name);
            for ($i = $iterations->getDepth() - 1; $i >= 0; $i--) {
                $currentIteration = $iterations->getSubIterator($i)->current()->getFilename();
                $dir = array($currentIteration => $dir);
            }
            $treeArray = array_merge_recursive($treeArray, $dir);
        }
        $json = json_encode($treeArray);

        return $json;
    }
}


