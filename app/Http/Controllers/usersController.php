<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Role;





class usersController extends Controller
{
   public function destroyUser($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('voyager.users.index'));
    }

    public function destroyPost($id) {
        $Post = Post::findOrFail($id);
        session()->flash('success', 'Bạn đã xóa thành công.');
        $Post->delete();
        return redirect(route('voyager.posts.index'));
    }
    public function destroyRoles($id) {
        $Role = Role::findOrFail($id);
        session()->flash('success', 'Bạn đã xóa thành công.');
        $Role->delete();
        return redirect(route('voyager.roles.index'));
    }
   
    
    

    public function destroyPagess($id) {
        $Page = Page::findOrFail($id);
        session()->flash('success', 'Bạn đã xóa thành công.');
        $Page->delete();
        return redirect(route('voyager.pages.index'));
    }


    public function destroyCategory($id) {
        $Category = Category::findOrFail($id);
        session()->flash('success', 'Bạn đã xóa thành công.');
        $Category->delete();
        return redirect(route('voyager.categories.index'));
    }
    public function edituser($id) {
        $User = User::findOrFail($id);
       dd($User) ;
    }
    
}
