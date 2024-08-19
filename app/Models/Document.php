<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';

    protected $fillable = [
        'no_bukti', 'tanggal_bukti', 'penghasilan_bruto',
        'pph', 'kode_objek_pajak', 'pasal', 'masa_pajak',
        'tahun_pajak', 'status', 'rev_no', 'posting', 'id_sistem'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
