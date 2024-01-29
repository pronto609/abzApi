<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserStoreResource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    protected int $page = 1;
    protected ?int $offset = null;
    protected int $count = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(Request $request)
    {
        $this->preparePaginParams($request);
        $users = '';
        if ($this->offset) {
            $users = User::skip($this->offset)->take($this->count)->orderBy('created_at', 'desc')->get();
        }else {
            $users = QueryBuilder::for(User::class)
                ->selectRaw('*, strftime("%s", created_at) as registration_timestamp')
                ->defaultSort('-created_at')->simplePaginate($this->count, ['*'], 'page', $this->page);
        }
        return new UserCollection($users);
    }

    private function preparePaginParams(Request $request)
    {
        $this->page = $request->has('page') ? (int) $request->input('page') : $this->page;
        $this->offset = $request->has('offset') ? (int) $request->input('offset') : $this->offset;
        $this->count = $request->has('count') ? (int) $request->input('count') : $this->count;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserStoreRequest  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(\App\Http\Requests\UserStoreRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData);
        return response()->json([
            'success' => true,
            'user_id' => $user->id,
            'message' => 'New user successfully registered'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
