<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
		'nama',
        'isi'
    ];

    protected $sortable = [
		'nama',
        'isi'
    ];
}
