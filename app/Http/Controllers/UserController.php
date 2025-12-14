<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Traits\APIResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use APIResponse;

    public function getUsers() {
        $search = request("search");
        $filter = request("active");

        $users = User::query()
            ->when($search, fn($q) => $q->search($search))
            ->when($filter, fn($q) => $q->where("role", $filter))
            ->orderBy("created_at", "desc")
            ->paginate(20);
        $users->through(function($user) {
            $user->formatted_created_at = $user->created_at->format("d, M Y");
            return $user;
        });

        return view("pages.users.index", compact("users"));
    }


    public function getUser($id) {
        $user = User::find($id);
        if($user == null) {
            return $this->error("The user with the id $id, does not exist", 404);
        }

        $htmlString = view("pages.users.details.content", compact("user"))->render();
        return $this->success($htmlString, "Successfully retrieved user");
    }

    public function updateUser(UpdateUserRequest $request, $id) {
        // dd($request);
        $validatedData = $request->validated();
        $user = User::find($id)->update($validatedData);
        return $this->success($user, "Successfully updated the user with id $id");
    }

    public function createUser(CreateUserRequest $request) {
        $validatedData = $request->validated();
        $user = User::create($validatedData);
        return $this->success($user, "Successfully created a new user");
    }

    public function updateProfilePicture(Request $request, $id) {
        $user = User::find($id);
        $request->validate([
            "profile_picture" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        if(!$request->hasFile("profile_picture")) {
            return $this->error("Unable to find 'profile_picture' image in the form data");
        }

        // Delete exisiting picture (if it exists)
        if ($user->profile_picture_path) {
            Storage::disk("public")->delete($user->profile_picture_path);
        }

        $path = $request->file("profile_picture")->store("profile-pictures", "public");
        $user->update(["profile_picture_path" => $path]);

        return $this->success("", "Successfully updated avatar");
    }

    public function deleteUser($id) {
        User::findOrFail($id)->delete();
        return back();
    }
}
