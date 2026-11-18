<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of team members.
     */
    public function index(): View
    {
        return view('admin.team-members.index', [
            'teamMembers' => TeamMember::query()->orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Show the form for creating a new team member.
     */
    public function create(): View
    {
        return view('admin.team-members.form', [
            'teamMember' => new TeamMember([
                'image' => 'assets/images/team/team-thumb-01.png',
                'twitter_url' => '#',
                'facebook_url' => '#',
                'linkedin_url' => '#',
                'sort_order' => 1,
                'is_active' => true,
            ]),
        ]);
    }

    /**
     * Store a newly created team member in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'image' => ['required_without:image_file', 'nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'twitter_url' => ['nullable', 'string', 'max:255'],
            'facebook_url' => ['nullable', 'string', 'max:255'],
            'linkedin_url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/team', 'public');
            $validated['image'] = 'storage/'.$path;
        }

        unset($validated['image_file']);
        $validated['is_active'] = $request->boolean('is_active');

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Ekip üyesi başarıyla eklendi.');
    }

    /**
     * Show the form for editing the specified team member.
     */
    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team-members.form', [
            'teamMember' => $teamMember,
        ]);
    }

    /**
     * Update the specified team member in storage.
     */
    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:5120'],
            'twitter_url' => ['nullable', 'string', 'max:255'],
            'facebook_url' => ['nullable', 'string', 'max:255'],
            'linkedin_url' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'translations' => ['nullable', 'array'],
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('uploads/team', 'public');
            $validated['image'] = 'storage/'.$path;
        } elseif (empty($validated['image'])) {
            $validated['image'] = $teamMember->image;
        }

        unset($validated['image_file']);
        $validated['is_active'] = $request->boolean('is_active');

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Ekip üyesi başarıyla güncellendi.');
    }

    /**
     * Remove the specified team member from storage.
     */
    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
            ->with('success', 'Ekip üyesi silindi.');
    }
}
