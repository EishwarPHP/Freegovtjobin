<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();
        return view('home', compact('category'));
    }

    public function addCategory(Request $request)
    {
        // return $request;
        $request->validate([
            'category' => 'required|string',
        ]);

        $saveFile = new Category;
        $saveFile->category = $request->category;
        $saveFile->save();

        return redirect()->back()->with('success', 'Record Added Successfully');
    }
    // View Edit Category  page
    public function CategoryEditpage($id)
    {
        $category = Category::where('id', $id)->first();
        return view('category-edit', compact('category'));
    }

    // Edit Category
    public function editCategory(Request $request)
    {
        // return $request;
        $request->validate([
            'category' => 'required',
        ]);

        $saveFile = Category::find($request->id);
        $saveFile->category = $request->category;
        $saveFile->update();

        return redirect('categories')->with('success', 'Record updated Successfully');
    }

     // delete Notification

     public function DeleteCategory($id)
     {
        //  return $id;
         Category::where('id', $id)->delete();
         // return $notes;
         return redirect('categories')->with('success', 'Record Deleted Successfully');
 
     }
    
    // View Category  page
    public function Category(Request $request)
    {
        $category = Category::paginate(10);
        return view('categories', compact('category'));
    }

    // View Notifications  page
    public function Notifications()
    {
        $notes=Notification::leftjoin('categories','notifications.category','categories.id')
        ->select('categories.id as cid','categories.category as categoryname','notifications.*')
        ->orderBy('notifications.created_at','DESC')
        ->paginate(10);
        
        return view('notifications', compact('notes'));
    }

    // Add Notifications page
    public function addNotification(Request $request)
    {
        //  return $request;
        $request->validate([
            'category' => 'required',
            'title' => 'required',
        ]);

        $saveFile = new Notification;
        $saveFile->category = $request->category;
        $saveFile->title = $request->title;
        $saveFile->setbutton = $request->setbutton;
        $saveFile->details = $request->details;
        $saveFile->onlylink = $request->onlylink;
        $saveFile->save();

        $subscriptions=Subscription::all();
        if($saveFile){
             // emailer----------------------------------------
             foreach($subscriptions as $res) {
             $to =  $res->emails ;
             $subject = $request->title;

             $header = "From:info@freegovtjob.in \r\n";
             
             $msg = $request->title. 
             "\n New Job Notification for you.
             \n Please visit via this link.
             \n http://freegovtjob.in/details/".$saveFile->id." " ;
            
             mail($to,$subject,$header,$msg);
             }

             // emailer-------------------------------------
        }

        return redirect()->back()->with('success', 'Record Added Successfully');
    }

    public function NotificationsView($id)
    {
        $notes=Notification::leftjoin('categories','notifications.category','categories.id')
        ->select('categories.id as cid','categories.category as categoryname','notifications.*')
        ->where('notifications.id',$id)
        ->first();
        // return $notes;
        return view('notifications-view', compact('notes'));

    }
    // delete Notification

    public function NotificationsDelete($id)
    {
        // return $id;
        Notification::where('id', $id)->delete();
        // return $notes;
        return redirect()->back()->with('success', 'Record Deleted Successfully');

    }


    // edit Notification
    public function NotificationsEditPage($id)
    {
        $notes=Notification::leftjoin('categories','notifications.category','categories.id')
        ->select('categories.id as cid','categories.category as categoryname','notifications.*')
        ->where('notifications.id', $id)
        ->first();
        // return $notes;
        $category = Category::all();
        return view('notifications-edit', compact('notes','category'));

    }

    public function NotificationsEdit(Request $request)
    {
        //  return $request;
        $request->validate([
            'category' => 'required',
            'title' => 'required',
        ]);

      
        $saveFile = Notification::find($request->id);
        $saveFile->category = $request->category;
        $saveFile->title = $request->title;
        $saveFile->setbutton = $request->setbutton;
        $saveFile->details = $request->details;
        $saveFile->onlylink = $request->onlylink;
        $saveFile->update();

        return redirect()->back()->with('success', 'Record Edited Successfully');

    }
    public function ChangePasswordPage(Request $request)
    {
        return view('change-password');
    }
    public function ChangePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $saveFile = User::find(Auth::user()->id);
        $saveFile->password = Hash::make($request['password']);
        $saveFile->update();

        
        Auth::logout();
        return redirect('/login');
        

    }

    public function SubscribersPage()
    {
        $subscriptions=Subscription::paginate(10);
        // return $subscriptions;
        return view('subscribers', compact('subscriptions'));
    }

    
    // delete Subscribe

    public function DeleteSubscribe($id)
    {
        //  return $id;
        Subscription::where('id', $id)->delete();
        // return $notes;
        return redirect('subscribers')->with('success', 'Record Deleted Successfully');

    }


    // Enquiry page

    public function Enquiry()
    {
        //  return $id;
        $enquiry=Contact::paginate(10);
        return view('enquiry', compact('enquiry'));

    }

    // delete Enquiry

    public function DeleteEnquiry($id)
    {
        //  return $id;
        Contact::where('id', $id)->delete();
        // return $notes;
        return redirect('enquiry')->with('success', 'Record Deleted Successfully');

    }
    
   

    
}
