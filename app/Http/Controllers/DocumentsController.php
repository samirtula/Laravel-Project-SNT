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

            $allowExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'rtf', 'txt', 'odt'];
            $inPublicPath = '/uploads/documents/' . $req['docs_section'] . '/';
            $path = public_path() . $inPublicPath;
            $file = $req->file('document');
            $fileName = time() . $file->getClientOriginalName();
            $extension = $file->extension();
            if (in_array($extension, $allowExtensions)) {
                $file->move($path, $fileName);
                $document->doc_path = $inPublicPath . $fileName;
                $document->save();
                return
                    $result = redirect()
                        ->route('admin_docs')
                        ->with('success', 'Данные были добавлены');
            } else {
                return $result = 'Некорректный формат файла';
            }
        } else {
            return $result = 'Документ не прикреплен';
        }
    }
    public function showDocsAdmin()
    {
        $document = new Documents();
        return view('admin.admin_docs', ['data'=> $document
            ->orderBy('created_at', 'desc')
            ->get()]);
    }
    public function adminDocsDelete($id)
    {
        $document = Documents::find($id);
        $path = $document->doc_path;
        unlink(public_path($path));
        $document->delete();
        return redirect()
            ->route('admin_docs')
            ->with('success', 'Данные удалены');
    }
    public function getDocuments($section)
    {
        $document = new Documents();
        return view('documents', ['data'=> $document
            ->where('section', $section)
            ->orderBy('created_at', 'desc')
            ->get()]);
    }

}
