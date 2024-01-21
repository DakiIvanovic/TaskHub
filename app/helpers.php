<?php

use App\Models\User;

/**
* Checks if register is first and if it is assings admin role to user otherwise to user.
*/

function checkRole(){
    $userCount = User::count();
    return($userCount === 0) ? 'admin' : 'user';
}