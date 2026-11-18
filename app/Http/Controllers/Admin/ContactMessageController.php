<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of contact messages.
     */
    public function index(): View
    {
        ContactMessage::query()->where('is_read', false)->update(['is_read' => true]);

        return view('admin.contact-messages.index', [
            'messages' => ContactMessage::query()->latest()->get(),
        ]);
    }

    /**
     * Remove the specified contact message.
     */
    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'İletişim mesajı başarıyla silindi.');
    }
}
