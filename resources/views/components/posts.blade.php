@query($args)
@set($viewArgs, [])
@if($viewClass)
  @set($viewArgs, ['cssClass' => $viewClass])
@endif

@hasposts
  @istrue($columnClass)<div class="row {{ $wrapperClass }}">@endistrue
    @posts
      @istrue($columnClass)<div class="col {{ implode(' ', $columnClass) }}">@endistrue
        <x-card />
      @istrue($columnClass)</div>@endistrue
    @endposts
  @istrue($columnClass)</div>@endistrue
@endhasposts

@noposts
  <div class="row {{ $wrapperClass }}">
    <div class="col">
      <p>{{ $noResults }}</p>
    </div>
  </div>
@endnoposts
