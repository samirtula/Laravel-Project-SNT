<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function addDocument(Request $req)
    {
        if ($req->hasFile('document')) {
            $document = new Documents();
            $document->name = $req->input('name');
            $document->section = $req->input('docs_section');

            $allowExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'rtf', 'txt', 'odt'];;
            $path = public_path() . '/uploads/documents/' . $req['docs_section'] . '/';
            $file = $req->file('document');
            $fileName = time() . $file->getClientOriginalName();
            $extension = $file->extension();
            if (in_array($extension, $allowExtensions)) {
                $file->move($path, $fileName);
                $document->doc_path = $path . $fileName;
                $document->save();
                return
                    $result = redirect()->route('admin')->with('success', 'Данные были добавлены');
            } else {
                return $result = 'Некорректный формат файла';
            }
        } else {
            return $result = 'Документ не прикреплен';
        }
    }
    public function showDocsAdmin()
    {
        //dd(News::all());
        $document = new Documents();
        return view('admin_docs', ['data'=> $document->orderBy('created_at', 'desc')->get()]);
    }
    public function adminDocsDelete($id)
    {
        Documents::find($id)->delete();
        return redirect()->route('admin_docs')->with('success', 'Данные удалены');
    }
}
