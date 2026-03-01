<?php

use App\Models\User;
use App\Models\Expense;
class Coloc
{
    private string $name;
    private int $count;
    private array $members;
    private int $totalPaid;

    public function addMember(User $User)
    {
        $this->members[] = $User;
    }

    public function ramoveMember(User $user)
    {
        foreach ($this->members as $member) {
            if ($member == $user) {
                $member->delete();
            }
        }
    }

    public function countMembers() {
        return count($this->members);
    }

}
