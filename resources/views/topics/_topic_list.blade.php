@if (count($topics))
  <ul class="list-unstyled">
    @foreach ($topics as $topic)
      <li class="media">
        <div class="media-left">
          <a href="{{ route('users.show', [$topic->user_id]) }}">
            <img class="media-object img-thumbnail mr-3" style="width: 70px; height: 70px;" src="{{ $topic->user->avatar }}" title="{{ $topic->user->name }}">
          </a>
        </div>

        <div class="media-body">

          <div class="media-heading mt-0 mb-1">
            <a href="{{ route('topics.show', [$topic->id]) }}" title="{{ $topic->title }}">
              {{ $topic->title }}
            </a>
            <a class="float-right" href="{{ route('topics.show', [$topic->id]) }}">
              <span class="badge badge-secondary badge-pill"> {{ $topic->reply_count }} </span>
            </a>
          </div>

          <small class="media-body meta text-secondary">
              <div class="my-2 text-dark">{{ Str::limit($topic->body, 70, $end = '...') }}</div>
              <a class="text-secondary" href="{{ route('categories.show', $topic->category_id) }}" title="{{ $topic->category->name }}">
                <i class="far fa-folder"></i>
                {{ $topic->category->name }}
              </a>

              <span> • </span>
              <a class="text-secondary" href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                <i class="far fa-user"></i>
                {{ $topic->user->name }}
              </a>
              <span> • </span>
              <i class="far fa-clock"></i>
              <span class="timeago" title="最後活躍於：{{ $topic->updated_at }}">{{ $topic->updated_at->diffForHumans() }}</span>
          </small>

        </div>
      </li>

      @if ( ! $loop->last)
        <hr class="my-4">
      @endif

    @endforeach
  </ul>

@else
  <div class="empty-block">暫無文章 ~_~ </div>
@endif