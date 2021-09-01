<ul class="list-unstyled">
  @foreach ($replies as $index => $reply)
    <li class="media mt-4" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
      <div class="media-left">
        <a href="{{ route('users.show', [$reply->user_id]) }}">
          <img class="media-object img-thumbnail mr-3" alt="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}" style="width:48px;height:48px;" />
        </a>
      </div>

      <div class="media-body">
        <div class="media-heading mt-0 mb-1 text-secondary">
          <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
            {{ $reply->user->name }}
          </a>
          <span class="text-secondary"> • </span>
          <span class="meta text-secondary" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>

          {{-- 回覆刪除按鈕 --}}
          @can('destroy', $reply)
          <span class="meta float-right">
            <form action="{{ route('replies.destroy', $reply->id) }}"
                onsubmit="return confirm('確定要刪除此評論？');"
                method="post">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-default btn-xs pull-left text-secondary">
                <i class="far fa-trash-alt"></i>
              </button>
            </form>
          </span>
          @endcan
        </div>
        <div class="reply-content text-secondary">
          {!! $reply->content !!}
        </div>
      </div>
    </li>

    @if ( ! $loop->last)
      <hr>
    @endif

  @endforeach
</ul>