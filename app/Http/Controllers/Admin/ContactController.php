<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display a listing of contact submissions.
     */
    public function index(Request $request): View
    {
        $query = Contact::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('subject', 'like', '%' . $request->search . '%');
            });
        }

        $contacts = $query->paginate(15);

        $unreadCount = Contact::unread()->count();

        return view('admin.contacts.index', compact('contacts', 'unreadCount'));
    }

    /**
     * Display the specified contact submission.
     */
    public function show(Contact $contact): View
    {
        // Mark as read when viewed
        $contact->markAsRead();

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Reply to a contact submission.
     */
    public function reply(Request $request, Contact $contact): RedirectResponse
    {
        $validated = $request->validate([
            'reply' => 'required|string|max:10000',
        ]);

        // Send email reply
        try {
            Mail::raw($validated['reply'], function ($message) use ($contact) {
                $message->to($contact->email, $contact->name)
                    ->subject('Re: ' . $contact->subject)
                    ->replyTo(config('mail.from.address'), config('mail.from.name'));
            });

            $contact->update([
                'status' => 'replied',
                'admin_reply' => $validated['reply'],
                'replied_at' => now(),
                'replied_by' => Auth::id(),
            ]);

            return redirect()->route('admin.contacts.show', $contact)
                ->with('success', 'Reply sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to send reply. Please check your mail configuration.')
                ->withInput();
        }
    }

    /**
     * Remove the specified contact submission.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact submission deleted.');
    }

    /**
     * Mark contact as read.
     */
    public function markAsRead(Contact $contact): RedirectResponse
    {
        $contact->update(['status' => 'read']);

        return redirect()->back()->with('success', 'Marked as read.');
    }

    /**
     * Mark multiple contacts as read.
     */
    public function markAllAsRead(): RedirectResponse
    {
        Contact::unread()->update(['status' => 'read']);

        return redirect()->back()->with('success', 'All messages marked as read.');
    }

    /**
     * Handle bulk actions on contacts.
     */
    public function bulkAction(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'action' => 'required|in:mark_read,mark_unread,delete',
            'contact_ids' => 'required|array',
            'contact_ids.*' => 'exists:contacts,id',
        ]);

        $contactIds = $validated['contact_ids'];
        $action = $validated['action'];

        switch ($action) {
            case 'mark_read':
                Contact::whereIn('id', $contactIds)->update(['status' => 'read']);
                $message = count($contactIds) . ' message(s) marked as read.';
                break;

            case 'mark_unread':
                Contact::whereIn('id', $contactIds)->update(['status' => 'unread']);
                $message = count($contactIds) . ' message(s) marked as unread.';
                break;

            case 'delete':
                Contact::whereIn('id', $contactIds)->delete();
                $message = count($contactIds) . ' message(s) deleted.';
                break;

            default:
                return redirect()->back()->with('error', 'Invalid action.');
        }

        return redirect()->back()->with('success', $message);
    }
}
