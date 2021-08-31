<div class="card rounded-0">
  <div class="card-body">
    <h4 class="card-title">{{ $category->name }}</h4>
    <p class="card-text text-justify">{{ $category->description }}</p>
    <a href="{{ route('topics.create') }}" class="btn btn-success btn-block" aria-label="Left Align">
      <i class="fas fa-pencil-alt mr-2"></i>新建文章
    </a>
  </div>
</div>