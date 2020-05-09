<?php

namespace App\Http\Controllers;

use App\Email;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Redirect;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('newsletter/sent-newsletter');
    }
    public function fetchEmails()
    {
        $draft = Newsletter::where('status', 'draft')->count();
        $sent = Newsletter::where('status', 'sent')->count();
        $all = Newsletter::count();
        $fetch = DB::table('emails')->get();
        return view('newsletter/sent-newsletter')->with(['draft' => $draft, 'sent' => $sent, 'all' => $all, 'data' => $fetch]);
    }
    public function newsletter2($id)
    {
        $draft = Newsletter::where('status', 'draft')->count();
        $sent = Newsletter::where('status', 'sent')->count();
        $all = Newsletter::count();
        $fetch = Newsletter::where('status', 'draft')->get();
        $fetch = DB::table('emails')->get();
        $get = Newsletter::where('id', $id)->first();
        return view('newsletter/drafts')->with(['draft' => $draft, 'sent' => $sent, 'all' => $all, 'news' => $get, 'data' => $fetch]);
    }
    public function fetchAllNewsletters()
    {
        $draft = Newsletter::where('status', 'draft')->count();
        $sent = Newsletter::where('status', 'sent')->count();
        $all = Newsletter::count();
        $fetch = Newsletter::all();
        return view('newsletter/all-newsletters')->with(['draft' => $draft, 'sent' => $sent, 'all' => $all, 'data' => $fetch]);
    }
    public function draftNewsletter()
    {
        $draft = Newsletter::where('status', 'draft')->count();
        $sent = Newsletter::where('status', 'sent')->count();
        $all = Newsletter::count();
        $fetch = Newsletter::where('status', 'draft')->get();
        return view('newsletter/draft-newsletter')->with(['draft' => $draft, 'sent' => $sent, 'all' => $all, 'data' => $fetch]);
    }
    public function newsletter($id)
    {
        $draft = Newsletter::where('status', 'draft')->count();
        $sent = Newsletter::where('status', 'sent')->count();
        $all = Newsletter::count();
        $fetch = Newsletter::where('id', $id)->first();
        return view('newsletter/newsletter')->with(['draft' => $draft, 'sent' => $sent, 'all' => $all, 'news' => $fetch]);
    }
    public function countDraft()
    {
        $fetch = Newsletter::where('status', 'draft')->get();
        return view('newsletter/draft-newsletter')->with(['data' => $fetch]);
    }
    public function countSent()
    {
        $fetch = Newsletter::where('status', 'sent')->get();
        $count = Count($fetch);
        return view('newsletter/sent-newsletters')->with(['count' => $count]);
    }
    public function sentNewsletter()
    {
        $draft = Newsletter::where('status', 'draft')->count();
        $sent = Newsletter::where('status', 'sent')->count();
        $all = Newsletter::count();
        $fetch = Newsletter::where('status', 'sent')->get();
        return view('newsletter/sent-newsletters')->with(['draft' => $draft, 'sent' => $sent, 'all' => $all, 'data' => $fetch]);
    }
    public function sendNewsletter(Request $request)
    {
        $validation = $request->validate([
           'subject' => 'required|min:5|max:225',
            'bodyMessage' => 'required',
            'email' => 'required'
        ]);
        $body = array(
            'subject' => $request->subject,
            'bodyMessage' => $request->bodyMessage
         );
        if ($request->status == 'sent')
        {
            foreach ($request->email as $emails) {
                Mail::to($emails)->send(new SendMail());
            }

            $save = Newsletter::create($request->all());

            if ($save)
            {
                return Redirect::back()->with('success', 'Newsletter Successfully sent');
            }else
            {
                return Redirect::back()->with('error', 'Newsletter not sent');
            }
        }elseif ($request->status == 'draft')
        {
            $save = Newsletter::create($request->all());

            if ($save)
            {
                return Redirect::back()->with('success', 'Newsletter Saved to Draft');
            }else
            {
                return Redirect::back()->with('error', 'Newsletter not sent');
            }
        }

    }
    public function sendDraftNewsletter(Request $request, $id)
    {
        $validation = $request->validate([
           'subject' => 'required|min:5|max:225',
            'bodyMessage' => 'required',
            'email' => 'required'
        ]);
        $body = array(
            'subject' => $request->subject,
            'bodyMessage' => $request->bodyMessage,
            'status' => $request->status
    );
        foreach ($request->email as $emails) {
            Mail::to($emails)->send(new SendMail());
        }

        $update = Newsletter::where('id', $id)->update($body);
        if ($update)
        {
            return Redirect::to('index')->with('success', 'Newsletter Successfully sent');
        }else
        {
            return Redirect::to('newsletter/sent-newsletters')->with('error', 'Newsletter not sent');
        }

    }
    public function deleteNewsletter($id)
    {
        $fetch = Newsletter::where('id', $id)->delete();
        return Redirect::back()->with('success', 'Newsletter Successfully Deleted');
    }


}
