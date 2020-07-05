<?php

namespace App\Http\Controllers;

use App\Http\Resources\Simple as SimpleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function search(Request $request, $searchType)
    {
        $query = strtolower($request->get('q'));
        $type = $request->get('type');
        $idField = $type . '_id';
        $searchField = 'title';

        $data = DB::table('lib_' . $type . 's as m');

        if ($type === 'disc') {
            $searchField = 'name';
        }

        if ($searchType === 'autocomplete') {
            $data = $data->select($idField . ' as id', $searchField . ' as title', 'pub_year as year')->where(DB::raw("lower({$searchField})"),
                'like', '%' . $query . '%')->take(15)->get();
        } else if ($searchType === 'simple') {
            /* Select fields list:
             *      View            - Field
             * *******************************************************************\
             *      id              - book or disc or journal id
             *      author          - book_id (join with table - lib_book_authors (book_id))
             *      call_number     - isbn
             *      title           - title or name
             *      type            - generate by table
             *      publisher       - publisher_id (join with table - lib_publishers (publisher_id))
             *      year            - pub_year
             *      availability    - ???
             * */
            $data = $data->select('m.' . $idField . ' as id', 'm.' . $searchField . ' as title', 'm.pub_year as year', 'm.isbn as call_number');
            $data = $data->leftJoin('lib_publishers as p', 'p.publisher_id', '=', 'm.publisher_id');
            $data = $data->addSelect('p.name as publisher');

            if ($type === 'book') {
                $data = $data->leftJoin('lib_book_authors as a', 'a.' . $idField, '=', 'm.' . $idField);
                $data = $data->addSelect(DB::raw("a.name||a.surname as author"));
            }

            $data = $data->where(DB::raw("lower(m.{$searchField})"),
                'like', '%' . $query . '%')->paginate(10);
        }

        return $data->toArray();
    }

    public function show(Request $request, $id)
    {
        $type = $request->get('type');

        $idField = 'books_id';

        if ($type === 'lib_discs') {
            $idField = 'disc_id';
        } else if ($type === 'lib_journals') {
            $idField = 'journal_id';
        }

        $data = DB::table($type . ' as m');
    }
}
