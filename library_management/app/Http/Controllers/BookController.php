<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::latest()->paginate(5);
        return view('books.index',compact('books'))->with('i',(request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'bookid'=>'required',
            'authorid'=>'required',
            'title'=>'required',
            'ISBN'=>'required',
            'pub_year'=>'required',
            'available'=>'required',
        ]);
        books::create($request->all());
        return redirect() ->route('books.index')->with('success','Create Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $request->validate([
            'bookid'=>'required',
            'authorid'=>'required',
            'title'=>'required',
            'ISBN'=>'required',
            'pub_year'=>'required',
            'available'=>'required',
        ]);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success',"Book deleted successfully.");
    }
    public function search(Request $request){

        if($request->ajax()){
            $data=book::where('id','like','%'.$request->search.'%')
                ->orwhere('title','like','%'.$request->search.'%')->get();
            $output='';
            if(count($data)>0){

                $output ='
            <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Authorid</th>
                <th scope="col">ISBN</th>
                <th scope="col">Public Year</th>
                <th scope="col">Aviable</th>
            </tr>
            </thead>
            <tbody>';

                foreach($data as $row){
                    $output .='
                    <tr>
                    <th scope="row">'.$row->id.'</th>
                    <td>'.$row->title.'</td>
                    <td>'.$row->authorid.'</td>
                    <td>'.$row->ISBN.'</td>
                    <td>'.$row->pub_year.'</td>
                    <td>'.$row->available.'</td>
                    </tr>
                    ';
                }
                $output .= '
             </tbody>
            </table>';
            }
            else{
                $output .='No results';
            }
            return $output;
        }
    }
}
