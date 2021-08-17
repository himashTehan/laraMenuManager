    <div class="tab-pane card-body" id="{{ $category->name }}">
        <div class="row">
            <div class="card-deck">

                @foreach ($category->menu as $item)
                    @if ($item->active)
                    <div class="card mb-3">
                        <a href={{ route('view.show', $item)}}>
                            @if (str_contains($item->image, 'via.placeholder.com'))
                                <img src={{$item->image}} class="card-img-top">
                            @else
                                <img src={{ asset('img/' . $item->image) }} class="card-img-top">
                            @endif
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $item->name }}</strong></h5>
                            <p class="card-text">{{ $item->description }}</p>
                            <p class="card-text"><strong class="text-muted">Rs. {{ $item->price }}</strong></p>
                        </div>
                    </div>
                    @endif

                @endforeach
            </div>

        </div>
    </div>
