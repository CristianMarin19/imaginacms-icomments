<div id="commentsComponents" class="comments comments-layout-1">
	
	@if($items && $items->count())

        @foreach($items as $comment)
            <div class="comment mb-3">
                <div class="card">
                  <div class="card-header">
                    {{trans('icomments::comments.messages.for')}}: 
                    {{$comment->user->first_name}} {{$comment->user->last_name}}
                  </div>
                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <div class="comment mb-1">
                            {!! $comment->comment !!}
                        </div>
                        <div class="comment-gallery my-1">
                            <x-media::gallery :mediaFiles="$comment->mediaFiles()" />
                        </div>    
                        <footer class="blockquote-footer">
                            {{format_date($comment->created_at)}}
                        </footer>
                    </blockquote>
                  </div>
                </div>
            </div>
        @endforeach

    @else
        <div class="alert alert-info" role="alert">
            {{trans('icomments::comments.messages.not infor')}}
        </div>
    @endif
   	
</div>