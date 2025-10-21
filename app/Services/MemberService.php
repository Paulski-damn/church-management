<?php

namespace App\Services;

use App\Models\Member;

class MemberService
{
    public function getMembers()
    {
        return Member::query()
            ->when(request('search'), function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                      ->orWhere('last_name', 'like', "%{$search}%")
                      ->orWhere('contact_number', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(5);
    }

    public function createMember(array $data)
    {
        return Member::create($data);
    }

    public function updateMember(Member $member, array $data)
    {
        $member->update($data);
        return $member;
    }

    public function deleteMember(Member $member)
    {
        $member->delete();
    }
}