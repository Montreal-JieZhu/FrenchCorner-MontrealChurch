<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RESTFullQuestionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    public function answerQuestion(Request $request) {
        $id = $request->input('ID');
        $answer = $request->input('Answer');
        $this->validate($request, [
            'Answer' => 'required|max:1000',
            'ID' => 'required',
        ]);
        \App\MyModels\Questions::where('id', $id)
                ->update(['answerEn' => $answer, 'status' => 2]);
        return response('', 200);
    }

    public function storeQuestion(Request $request) {

        $questionInfo = new \App\MyModels\Questions;
        $questionInfo->title = $request->input('questionTitle');
        $questionInfo->name = $request->input('name');
        $questionInfo->type = $request->input('questionType');
        $questionInfo->questionOrg = $request->input('questionBody');

        $questionInfo->save();

        return response('', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $id = $request->input('ID');
        $translation = $request->input('Translation');
        $this->validate($request, [
            'Translation' => 'required|max:1000',
            'ID' => 'required',
        ]);
        \App\MyModels\Questions::where('id', $id)
                ->update(['questionEn' => $translation, 'status' => 1]);
        return response('', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $deletedRows = \App\MyModels\Questions::where('id', $id)->delete();
        return response($deletedRows, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
