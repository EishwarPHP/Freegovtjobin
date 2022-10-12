<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    //
    public function NotificationsViewforUsers($id)
    {
        $notes=Notification::leftjoin('categories','notifications.category','categories.id')
        ->select('categories.id as cid','categories.category as categoryname','notifications.*')
        // ->where('notifications.category',$id)
        ->where('notifications.id',$id)
        ->first();

        // return $notes;
        return view('details', compact('notes'));
    }

    public function Subscriptions(Request $request)
    {
        // return $request;
        $request->validate([
            'emails' => 'required',
        ]);

        $saveFile = new Subscription;
        $saveFile->emails = $request->emails;
        $saveFile->save();

        return redirect()->back()->with('success', 'Thanks for subscribe Our Notifications');
    }

    // WelcomeCategory
    public function WelcomeCategory($title)
    {
        if($title=='Newupdate' )
        $notes=Notification::leftjoin('categories','notifications.category','categories.id')
        ->select('categories.id as cid','categories.category as categoryname','notifications.*')
        ->orderBy('notifications.created_at','DESC')
        ->paginate(10);
        else
        $notes=Notification::leftjoin('categories','notifications.category','categories.id')
        ->select('categories.id as cid','categories.category as categoryname','notifications.*')
        ->where('categories.category', $title)
        ->paginate(10);
        // return $notes;
        return view('welcome-category', compact('notes','title'));

    }

    // WelcomeCategory
    public function ContactPage()
    {
        
        return view('contact');

    }

    public function ContactPost(Request $request)
    {
        // return $request;
        $request->validate([
            'fullname' => 'required',
            'mobile' => 'required',
            'emailid' => 'required',
            'message' => 'required',
        ]);

        $saveFile = new Contact;
        $saveFile->fullname = $request->fullname;
        $saveFile->mobile = $request->mobile;
        $saveFile->emailid = $request->emailid;
        $saveFile->message = $request->message;
        $saveFile->save();

        return redirect()->back()->with('success', 'Your Message has been dlivered to us, we will getback to you shortly');

    }

}
