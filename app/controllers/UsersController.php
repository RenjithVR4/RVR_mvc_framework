<?php

namespace App\Controllers;

use App\Core\App;


class UsersController {


    public function index() {

        error_log("Users => Controller");
        $users = App::get('database')->selectAll('users');

        error_log("Users =>". json_encode($users));

        return view('users', ['users' => $users]);

    }


    public function store() {


        App::get('database')->insert('users', [
    
            'name' => $_POST['name'],
        
            ]);

        return redirect('users');

    }


    public function destroy($id) {  
        $deletedUser = App::get('database')->delete('users', $id);

        return redirect('users');

    }

}