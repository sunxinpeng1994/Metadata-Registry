<?php

/** Created by PhpStorm,  User: jonphipps,  Date: 2017-05-25,  Time: 5:37 PM */

namespace App\Models\Traits;

use App\Models\Vocabulary;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToVocabulary
{
    /**
     * @return BelongsTo
     */
    public function vocabulary()
    {
        return $this->belongsTo( Vocabulary::class, 'vocabulary_id', 'id' );
    }
}
