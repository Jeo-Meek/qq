<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
//    laravel 会自动解析模型声明
    public function show(User $user)
    {
        return view('users.show', compact('user'));
//        通过compact方法转换为一个数组，将白能量数据传递到视图中
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user, ImageUploadHandler $uploadHandler)
    {
        $data = $request->all();
        if ($request->avatar) {
            $result = $uploadHandler->save($request->avatar, 'avatars', $user->id);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($request->all());

        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }


}
