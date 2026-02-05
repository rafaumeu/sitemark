<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property User $user
 * @property int $sort
 */
class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;

    protected $fillable = ['link', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function moveUp()
    {
        $previousLink = $this->user->links()
            ->where('sort', '<', $this->sort)
            ->orderBy('sort', 'desc')
            ->first();

        if ($previousLink) {
            $this->swapSort($previousLink);
        }
    }

    public function moveDown()
    {
        $nextLink = $this->user->links()
            ->where('sort', '>', $this->sort)
            ->orderBy('sort', 'asc')
            ->first();

        if ($nextLink) {
            $this->swapSort($nextLink);
        }
    }

    private function swapSort(Link $otherLink)
    {
        $mySort    = $this->sort;
        $otherSort = $otherLink->sort;

        $this->update(['sort' => $otherSort]);
        $otherLink->update(['sort' => $mySort]);
    }
}
