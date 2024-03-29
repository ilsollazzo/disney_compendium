<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Work
 *
 * @property int $id
 * @property int $work_type_id
 * @property string $slug
 * @property int $year
 * @property int|null $length
 * @property string|null $description
 * @property int $author_id
 * @property int $contains_episodes
 * @property int $is_accessible
 * @property int $is_available
 * @property int $is_published
 * @property mixed $utils
 * @method static \Illuminate\Database\Eloquent\Builder|Work newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Work newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Work query()
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereContainsEpisodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereIsAccessible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereIsDescriptionReady($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereUtils($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereWorkTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereYear($value)
 * @property-read \App\Models\WorkDescriptionAuthor $author
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExternalReference> $external_references
 * @property-read int|null $external_references_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkDescriptionAuthor> $description_authors
 * @property-read int|null $description_authors_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkTitle> $titles
 * @property-read int|null $titles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereUpdatedAt($value)
 * @property string|null $date
 * @property int|null $end_year
 * @property int|null $end_date
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkDescription> $descriptions
 * @property-read int|null $descriptions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Studio> $studios
 * @property-read int|null $studios_count
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereEndYear($value)
 * @property-read \App\Models\WorkType|null $work_type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkList> $work_lists
 * @property-read int|null $work_lists_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkCastMembership> $cast_members
 * @property-read int|null $cast_members_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkEpisode> $episodes
 * @property-read int|null $episodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkCastMembership> $cast_memberships
 * @property-read int|null $cast_memberships_count
 * @property int $is_lost
 * @method static \Illuminate\Database\Eloquent\Builder|Work whereIsLost($value)
 * @mixin \Eloquent
 */
class Work extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'date',
    ];

    public function work_type(): BelongsTo
    {
        return $this->belongsTo(WorkType::class);
    }

    public function titles(): HasMany
    {
        return $this->hasMany(WorkTitle::class);
    }

    public function descriptions(): HasMany
    {
        return $this->hasMany(WorkDescription::class);
    }

    public function external_references(): HasMany
    {
        return $this->hasMany(ExternalReference::class);
    }

    public function studios(): BelongsToMany
    {
        return $this->belongsToMany(Studio::class, 'lnk_works_studios');
    }

    public function work_lists(): BelongsToMany
    {
        return $this->belongsToMany(WorkList::class, 'lnk_works_work_lists');
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(WorkEpisode::class);
    }

    public function cast_memberships(): HasMany
    {
        return $this->hasMany(WorkCastMembership::class);
    }
}
