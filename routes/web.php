<?php

use Illuminate\Http\Request;


$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('/users', function (Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|max:16'
        ]);

        $data = $request->all();
        $data['password'] = \Hash::make($data['password']);
        $model = \App\User::create($data);
        return response()->json($model, 200);
    });



});
