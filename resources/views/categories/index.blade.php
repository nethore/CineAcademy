<h3>Ma liste de categories ({{ count($categories) }})</h3>
@if(count($categories) != 0)
  <ul>
  @foreach($categories as $category)
    <li>
      <b>{{ $category['title'] }}</b> ({{ $category['slug'] }})<br/>
      {{ $category['description'] }}<br/>
      <img src="{{ $category['image'] }}" alt="{{ $category['title'] }}">
    </li>
  @endforeach
  </ul>
@else
  <p>Il n'y as pas de catégories. Dommage ! :)</p>
@endif
