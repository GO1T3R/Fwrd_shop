@extends('plantillas.navbar')

@section('title', 'Playeras')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="product-clothes">
                        <a href="{{ route('products.show', $product->id) }}" target="_blank">
                            <img src="{{ url($product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                        </a>
                        <p>{{ $product->name }}</p>
                        <p>${{ $product->price }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

<!-- Pagination -->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
@endsection

