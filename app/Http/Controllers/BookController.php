<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\Book as BookResource;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $books = Book::paginate(10);

        return BookResource::collection($books);
    }

    public function search(Request $request)
    {
        $books = Book::where(DB::raw('lower(title)'), 'like', '%' . strtolower($request->input('q')) . '%')->paginate(10);

        return BookResource::collection($books);
    }

    public function autocomplete(Request $request)
    {
        $query = strtolower($request->input('q'));
        $books = Book::select('book_id', 'title', 'pub_year')->where(DB::raw('lower(title)'), 'like', '%' . $query . '%')->take(15)->get();

        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
