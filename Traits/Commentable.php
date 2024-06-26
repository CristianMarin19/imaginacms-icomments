<?php

namespace Modules\Icomments\Traits;

trait Commentable
{
    /**
     * This static method does voodoo magic to
     * delete leftover comments once the commentable
     * model is deleted.
     */
    protected static function bootCommentable()
    {
        static::deleted(function ($commentable) {
            foreach ($commentable->comments as $comment) {
                $comment->delete();
            }
        });
    }

    /**
     * Returns all comments for this model.
     */
    public function comments()
    {
        return $this->morphMany('Modules\Icomments\Entities\Comment', 'commentable');
    }

    /**
     * Returns only approved comments for this model.
     */
    public function approvedComments()
    {
        return $this->morphMany('Modules\Icomments\Entities\Comment', 'commentable')->where('approved', true);
    }
}
