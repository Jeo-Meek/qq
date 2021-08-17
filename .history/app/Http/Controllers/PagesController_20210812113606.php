<?php
/*
 * @Author: your name
 * @Date: 2021-08-05 14:32:35
 * @LastEditTime: 2021-08-12 11:35:20
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \weibo\app\Http\Controllers\PagesController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root()
    {
        return view('pages.root');
    }

    public function index()
    {
        return view('auth.login')
    }
}
