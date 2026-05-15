<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Console\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['title'])]
#[Hidden(['created_at', 'updated_at', 'id'])]
class Mail extends Model
{
    use HasFactory;
    public function subscribers(): HasMany
    {
        return $this->hasMany(Subscriber::class);
    }
}
